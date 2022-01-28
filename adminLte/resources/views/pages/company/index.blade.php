@extends('layouts.theme.default-theme-layout')

@section('content-header')
    Список компаний
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card w-100">
            <div class="card-header">
                <h3 class="card-title">Компании</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Наименование</th>
                        <th>Email</th>
                        <th>Адрес</th>
                        <th width="5%"></th>
                        <th width="5%"></th>
                        <th width="5%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($companiesList as $company)
                            <tr>
                                <td>
                                    <a href="{{ route('companyShow', [ 'id' => $company->id]) }}"
                                        class="text-decoration-none"
                                    >
                                        {{ $company->id }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('companyShow', [ 'id' => $company->id]) }}"
                                       class="text-decoration-none"
                                    >
                                        {{ $company->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $company->email }}
                                </td>
                                <td>
                                     {{ $company->address }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default-{{ $company->id }}">
                                        Прикрепить клиентов
                                    </button>
                                    @include('layouts.modals.default-modal-layout', [
                                         'id'=>$company->id,
                                         'title' => $company->name,
                                         'routeName' => 'companyAttachCustomers',
                                         'customersList' => $customersList,
                                         'routeParamsArray' => ['id' => $company->id],
                                         ])
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
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger-{{ $company->id }}">
                                        Удалить
                                    </button>
                                    @include('layouts.modals.danger-modal-layout', [
                                         'id'=>$company->id,
                                         'title' => $company->name,
                                         'routeName' => 'companyDestroy',
                                         'routeParamsArray' => ['id' => $company->id],
                                         ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate mt-3 pl-2">
                {{$companiesList->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </section>
@endsection
