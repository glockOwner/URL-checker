@extends('layouts.main')
@section('content')
    <main class="d-flex justify-content-center align-items-center">
        <form method="POST" action="{{route('user.check')}}" class="container d-flex flex-column align-items-center justify-content-center">
            @csrf
            <div class="container d-flex flex-column align-items-center justify-content-center">
                <div class="mb-3 col-4">
                    <label for="formGroupExampleInput" class="form-label">Проверить URL</label>
                    <input name="url" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите URL" value="{{old('url')}}">
                </div>
                @error('url')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="mb-3 col-4">
                    <label for="formGroupExampleInput2" class="form-label">Частота проверки</label>
                    <select name="frequency" class="form-select" aria-label="Default select example">
                        <option value="1">1 минута</option>
                        <option value="5">5 минут</option>
                        <option value="10">10 минут</option>
                    </select>
                </div>
                <div class="mb-3 col-4">
                    <label for="formGroupExampleInput2" class="form-label">Количество повторов при ошибке</label>
                    <select name="repeats" class="form-select" aria-label="Default select example">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary" value="Отправить на проверку">
                </div>
                @if(session('success'))
                    <div class="col-auto mt-5">
                        <p class="text-success"><?php echo session('success');?></p>
                    </div>
                @elseif(session('error'))
                    <div class="col-auto mt-5">
                        <p class="text-danger"><?php echo session('error');?></p>
                    </div>
                @endif
            </div>
        </form>
    </main>
@endsection
