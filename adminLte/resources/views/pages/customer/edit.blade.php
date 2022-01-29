@extends('layouts.theme.default-theme-layout')

@section('content-header')
    Редактирование записи
@endsection

@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('customerUpdate', $customer->id) }}">
        @csrf
        @method('PUT')
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
        <input type="text" hidden name="id" value="{{ $customer->id }}">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Редaктирвоание клиента: {{ $customer->name }} {{ $customer->surname }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Имя <span class="text-danger">*</span>
                            <input class="form-control" type="text" name="name" required value="{{ $customer->name }}">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Фамилия <span class="text-danger">*</span>
                            <input class="form-control" type="text" name="surname" required value="{{ $customer->surname }}">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Email <span class="text-danger">*</span>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" required value="{{ $customer->email }}">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="w-100">
                            Номер телефона <span class="text-danger">*</span>
                            <input class="form-control" type="tel" name="phone_number" required maxlength="20" value="{{ $customer->phone_number }}">
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
