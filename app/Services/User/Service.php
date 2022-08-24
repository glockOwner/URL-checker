<?php
namespace App\Services\User;
use App\Components\HttpClient;
use App\Models\Check;
use App\Models\Url;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($urlData, $checkData)
    {
        try {
            DB::beginTransaction();
            $urlData['url'] = preg_replace('%(https:\/\/www\.)|(http:\/\/www\.)|(https:\/\/)|(http:\/\/)%', '' ,$urlData['url']);
            $urlData['url'] = trim($urlData['url'], '/\x020');
            $url = Url::firstOrCreate([
                'url' => $urlData['url']
            ],$urlData);
            $url->users()->attach(auth()->user()->id);

            $url = Url::where('url', $urlData['url'])->first();
            $response = $this->getStatusFromUrl($url);
            $status = $response->getStatusCode();
            $reason = $response->getReasonPhrase();

            $checkData['url_id'] = $url->id;
            $checkData['http_code'] = $status;
            $checkData['user_id'] = auth()->user()->id;

            $lastCheck = Check::where('url_id', $checkData['url_id'])->get()->last();
            $checkData['attempt_number'] = $lastCheck ? $lastCheck->attempt_number + 1 : 1;
            Check::create($checkData);
            $result = 'Сайт ' . $urlData['url'] . ' ответил.' . "<br>" . 'Код ответа:' . $checkData['http_code'];
            session()->flash('success', $result);
            DB::commit();
        }
        catch(ConnectException $connectException){
            DB::rollBack();
            /*dd($connectException);*/
            session()->flash('error', 'Произошла ошибка при подключении к серверу(Такого сервера нет)');
        }catch (\Exception $exception)
        {
            DB::rollBack();
            dd($exception);
            session()->flash('error', 'Произошла ошибка при проверке URL');
        }
    }

    public function getStatusFromUrl($url)
    {
        $request = new HttpClient($url->url);
        $response = $request->client->request('GET');
        return $response;
    }

    public function setRepeats($repeats)
    {
        session('repeats', $repeats);
    }

    public function recursion($urlData, $checkData)
    {
        sleep(5);
        session('repeatsCounter', 0);
        while (session('repeatsCounter') < session('repeats'))
        {
            $this->store($urlData, $checkData);
        }
    }
}
