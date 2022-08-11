@extends('layouts.main')
@section('content')
    <main class="d-flex justify-content-center align-items-center">
        <div class="container d-flex flex-column align-items-center justify-content-center">
            <div class="mb-3 col-4">
                <label for="formGroupExampleInput" class="form-label">Проверить URL</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите URL">
            </div>
            <div class="mb-3 col-4">
                <label for="formGroupExampleInput2" class="form-label">Частота проверки</label>
                <select class="form-select" aria-label="Default select example">
                    <option value="1">1 минута</option>
                    <option value="5">5 минут</option>
                    <option value="10">10 минут</option>
                </select>
            </div>
            <div class="mb-3 col-4">
                <label for="formGroupExampleInput2" class="form-label">Количество повторов при ошибке</label>
                <select class="form-select" aria-label="Default select example">
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
        </div>
    </main>
@endsection
