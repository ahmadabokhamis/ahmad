@extends('Dashboard.layouts.master')

@section('content')


<!-- Content wrapper -->
<div class="container-xxl flex-grow-1 container-p-y">

@if (count($errors) > 0)
<div class="bs-toast toast fade show bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Error</div>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

    <div class="content-wrapper">
        <!-- Content -->
        <div class="card">

            {!! Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id]]) !!}
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                <div class="form-group">
                                    <p>Role Name</p>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                            <div class="row">
                                <!-- col -->
                                <div class="col-lg-4">
                                    <ul id="treeview1">
                                        <li><a href="#">Permission</a>
                                            <ul style="list-style: none ">
                                                <li>
                                                    @foreach($permission as $value)
                                                    <label>{{ Form::checkbox('permission[]', $value->id,
                                                        in_array($value->id, $rolePermissions) ? true : false,
                                                        array('class' => 'form-check-input')) }}
                                                        {{ $value->name }}</label>
                                                    <br />
                                                    @endforeach
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-outline-primary">Update</button>
                                </div>
                                <!-- /col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
</div>
<!-- main-content closed -->
{!! Form::close() !!}
@endsection
