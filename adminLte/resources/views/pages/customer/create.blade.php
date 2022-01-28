@extends('layouts.theme.default-theme-layout')

@section('content-header')
    Добавление записи
@endsection

@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('customerStore') }}">
        @csrf
        @method('POST')
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Добавление клиента</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Имя <span class="text-danger">*</span>
                            <input class="form-control" type="text" name="name" required>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Фамилия <span class="text-danger">*</span>
                            <input class="form-control" type="text" name="surname" required>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Email <span class="text-danger">*</span>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Номер телефона <span class="text-danger">*</span>
                            <input class="form-control" type="tel" name="phone_number" required maxlength="20">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Компании</label>
                            <select class="select2" multiple="multiple" name="companiesIdArray[]" data-placeholder="Select a State" style="width: 100%;">
                                @foreach($companiesList as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-4">
                    <a href="{{ route('customersList') }}"
                       class="btn btn-default float-right text-decoration-none"
                    >
                        Вернуться к списку всех клиентов
                    </a>
                    <button type="submit" class="btn btn-info">
                        Сохранить
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
