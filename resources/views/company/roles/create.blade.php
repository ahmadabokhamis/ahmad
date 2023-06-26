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
                {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!}
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mg-b-20">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    <div class="col-xs-7 col-sm-7 col-md-7">
                                        <div class="form-group">
                                            <p>Name of Role</p>
                                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>


                                <div class="col-8">
                                    <h5 class="card-header">The Permission:</h5>
                                </div>
                                <div class="row">
                                    <!-- col -->
                                            <div class="demo-inline-spacing mt-3">
                                                <div class="list-group">

                                                    @foreach ($permission as $value)

                                                            <div class="col-md-4 col-lg-4" >
                                                                <label class="list-group-item" style="font-size: 16px;">
                                                                    {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                                                    {{ $value->name }}</label>
                                                                </div>
                                                    @endforeach

                                            </div>
                                    </div>
                                </div>
                                </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            <!-- /col -->
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-outline-primary">Create</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

    {!! Form::close() !!}
@endsection
