@extends('layouts.theme.default-theme-layout')

@section('content-header')
    Добавление записи
@endsection

@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('companyStore') }}">
        @csrf
        @method('POST')
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Добавление компании</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Название компании <span class="text-danger">*</span>
                            <input class="form-control" type="text" name="name" required value="{{ old('name') }}">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Email <span class="text-danger">*</span>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" required value="{{ old('email') }}">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Адрес <span class="text-danger">*</span>
                            <input class="form-control" type="text" name="address" required value="{{ old('address') }}">
                        </label>
                    </div>
                </div>
                <div class="card-footer mt-4">
                    <a href="{{ route('companiesList') }}"
                       class="btn btn-default float-right text-decoration-none"
                    >
                        Вернуться к списку компаний
                    </a>
                    <button type="submit" class="btn btn-info">
                        Сохранить
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
