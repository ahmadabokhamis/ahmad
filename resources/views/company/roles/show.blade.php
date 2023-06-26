@extends('Dashboard.layouts.master')
@section('content')

<!-- Content wrapper -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="content-wrapper">
        <!-- Content -->
        <div class="card">
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="row">
                    <!-- col -->
                    <div class="list-group list-group-flush">

                            <a href="#">{{ $role->name }}</a>

                                    @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                    <a href="#" class="list-group-item list-group-item-action">{{ $v->name }}</a>
                                    @endforeach
                                    @endif




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
@endsection
