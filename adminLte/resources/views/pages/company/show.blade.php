@extends('layouts.theme.default-theme-layout')

@section('content-header')
    Просмотр комппании
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> {{ $company->name }}
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address>
                                <strong>Контактные данные</strong><br>
                                {{ $company->email }}<br>
                                {{ $company->address }}<br>
                            </address>
                        </div>
                    </div>
                    @if(count($company->customers) > 0)
                        <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Номер телефона</th>
                                        <th width="5%"></th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($company->customers as $customer)
                                        <tr>
                                            <td>
                                                <a href="{{ route('customerShow', [ 'id' => $customer->id]) }}"
                                                   class="text-center text-decoration-none text-center"
                                                >
                                                {{ $customer->name }} {{ $customer->surname }}
                                            </td>
                                            <td>
                                                {{ $customer->email }}
                                            </td>
                                            <td>
                                                {{ $customer->phone_number }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-block bg-gradient-info btn-sm">
                                                    <a href="{{ route('customerEdit', [ 'id' => $customer->id]) }}"
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
                        <span>Нет клиентов</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
