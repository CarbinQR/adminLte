@extends('layouts.theme.default-theme-layout')

@section('content-header')
    Список клиентов
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card w-100">
            <div class="card-header">
                <h3 class="card-title">Клиенты</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Полное имя</th>
                        <th>Email</th>
                        <th>Номер телефона</th>
                        <th width="5%"></th>
                        <th width="5%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($customersList as $customer)
                            <tr>
                                <td>
                                    <a href="{{ route('customerShow', [ 'id' => $customer->id]) }}"
                                        class="text-decoration-none"
                                    >
                                        {{ $customer->id }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('customerShow', [ 'id' => $customer->id]) }}"
                                       class="text-decoration-none"
                                    >
                                        {{ $customer->surname }} {{ $customer->name }}
                                    </a>
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
                                        Удалить
                                    </button>
                                    @include('layouts.modals.danger-modal-layout', [
                                         'id'=>$customer->id,
                                         'title' => $customer->surname . ' ' .$customer->name,
                                         'routeName' => 'customerDestroy',
                                         'routeParamsArray' => ['id' => $customer->id],
                                         ]
                                )
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate mt-3 pl-2">
                {{$customersList->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </section>
@endsection
