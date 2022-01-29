@extends('layouts.theme.default-theme-layout')

@section('content-header')
    Просмотр клиента
@endsection

@section('content')
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-users"></i> {{ $customer->name }} {{ $customer->surname }}
                                <a href="{{ route('customerEdit', ['id' => $customer->id]) }}"
                                   class="text-center text-decoration-none text-dark ml-3"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address>
                                <strong>Контактные данные</strong>
                                <br>
                                {{ $customer->email }}<br>
                                {{ $customer->phone_number }}<br>
                            </address>
                        </div>
                    </div>
                    @if(count($customer->companies) > 0)
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Email</th>
                                            <th>Адрес</th>
                                            <th width="5%"></th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @foreach($customer->companies as $company)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('companyShow', [ 'id' => $company->id]) }}"
                                                       class="text-center text-decoration-none text-center"
                                                    >
                                                    {{ $company->name }}
                                                </td>
                                                <td>
                                                    {{ $company->email }}
                                                </td>
                                                <td>
                                                    {{ $company->address }}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-block bg-gradient-info btn-sm">
                                                        <a href="{{ route('companyEdit', [ 'id' => $company->id]) }}"
                                                           class="text-center text-decoration-none text-center text-white"
                                                        >
                                                            Редактировать
                                                        </a>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger-{{ $customer->id }}">
                                                        Открепить
                                                    </button>
                                                    @include('layouts.modals.danger-modal-layout', [
                                                         'id'=>$customer->id,
                                                         'title' => $customer->surname . ' ' .$customer->name,
                                                         'message' => 'Клиент будет убран из списка клиентов данной компании. Подтвердите действие',
                                                         'routeName' => 'customerDetach',
                                                         'routeParamsArray' => [
                                                             'customerId' => $customer->id,
                                                             'companyId' => $company->id,
                                                             ],
                                                         ])
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <span>Нет компаний</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
