@extends('dashboard.layouts.master')
@section('content')
    {{-- <link rel="stylesheet" href="{{ URL::asset('datatable/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-2">
                        <h3 class="fw-bold py-3 mb-4">
                            Customers
                        </h3>
                    </div>
                    <div class="col-10" style="margin:auto ;
    padding-left: 40px;
">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-style1">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Customer</a>
                                </li>
                                <li class="breadcrumb-item active">Customers</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-3" style="align-self: center ;text-align: end">
                <a href="" type="submit" class="btn btn-icon btn-outline-secondary "> <i
                        class="fa-solid fa-arrows-rotate"></i></a>

                <a href="{{ route('admin.customers.add') }}" type="submit" class=" btn btn-icon btn-primary"> <i
                        class="fa-solid fa-plus"></i></a>




                <button class="btn btn-icon btn-danger" id="btn_delete_all" data-bs-toggle="modal"
                    data-bs-target="#smallModal"> <i class="bx bx-trash-alt" style="color:white"></i></button>
            </div>
        </div>











        <div class="content-wrapper">
            <!-- Content -->
        </div>








        <div class="row">
            <div class="col-9">
                <div class="card ">


                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-header h"><i class="fa-solid fa-users"></i> Customers list</h5>
                        </div>


                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="CustomersTable">
                            <thead>
                                <tr>
                                    <th>
                                    </th>

                                    <th>name</th>
                                    <th>phone</th>
                                    <th>email</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @isset($customers)
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td><input type="checkbox" value="{{ $customer->id }}" class="box1"></td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>
                                                <a type="button" class="btn btn-icon btn-outline-success"
                                                    href="{{ route('admin.customers.edit', $customer->id) }}">
                                                    <i class="bx bx-edit-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card  filter">
                    <h5 class="card-header h"><i class='bx bxs-filter-alt'></i> filter</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element" style="padding-top:10px">


                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name"
                                    aria-describedby="floatingInputHelp">
                                <label class="ml-2" for="floatingInput">name</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="email"
                                    aria-describedby="floatingInputHelp">
                                <label class="ml-2" for="floatingInput">email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="phone"
                                    aria-describedby="floatingInputHelp">
                                <label class="ml-2" for="floatingInput">phone</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="status"
                                    aria-describedby="floatingInputHelp">
                                <label class="ml-2" for="floatingInput">status</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <a href="" class="btn btn-primary col-12" style="margin: auto"><i
                                    class='bx bxs-filter-alt'></i> filter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    </div>


@stop

@section('scripts')
    <script type="text/javascript">
        $(function() {


            var csrfToken = $('meta[name="csrf-token"]').attr('content');



            $('#CustomersTable').DataTable();

            $("#CustomersTable_filter").css("padding", "15px");
            $("#CustomersTable_length").css("padding", "15px");
            $("#CustomersTable_info").css("padding", "23px");

            $("#CustomersTable_paginate").css("padding", "15px");
            $("#CustomersTable_paginate").css("padding", "15px");




        });
    </script>

@stop
