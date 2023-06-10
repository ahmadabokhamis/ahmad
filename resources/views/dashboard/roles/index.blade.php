@extends('Dashboard.layouts.master')

@section('content')

<!-- Content wrapper -->
<div class="container-xxl flex-grow-1 container-p-y">

@if (session()->has('success'))
<div class="bs-toast toast fade show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Success</div>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        <strong>{{ session()->get('success') }}</strong>
    </div>
</div>
@endif

    <div class="content-wrapper">

   <div class="row">
      <div class="col-10">
         <div class="row">
            <div class="col-4">
               <h3 class="fw-bold py-3 mb-4">
                  User Permission
               </h3>
            </div>
            <div class="col-8" style="margin:auto;

               ">
               <nav aria-label="breadcrumb" >
                  <ol class="breadcrumb breadcrumb-style1">
                     <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Home</a>
                     </li>
                     <li class="breadcrumb-item">
                        <a href="javascript:void(0);">System</a>
                     </li>
                     <li class="breadcrumb-item active">User Permission</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
      <div class="col-2" style="align-self: center ;text-align: end">

         <a href="" type="submit" class="btn btn-primary btn-icon"><i class="fa-solid fa-plus"></i></a>

      </div>
   </div>






        <!-- Content -->
        <div class="card">
            <div class="row">
            <div class="col-12">
         <h5 class="card-header h"><i class="fa-solid fa-list-check"></i> User Permission list</h5>
            </div></div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @isset($roles)
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>

                                <a class="btn btn-sm btn-outline-success"
                                    href="{{ route('admin.roles.show', $role->id) }}">Show</a>



                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>


                                @if ($role->name !== 'Admin')

                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.roles.destroy',
                                $role->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                                {!! Form::close() !!}

                                @endif


                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
        <!-- / Content -->
    </div>
</div>


{{--
<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            @can('role-create')
                            <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">اضافة</a>
                            @endcan
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('role-list')
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('roles.show', $role->id) }}">عرض</a>
                                    @endcan

                                    @can('role-edit')
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('roles.edit', $role->id) }}">تعديل</a>
                                    @endcan

                                    @if ($role->name !== 'Admin')
                                    @can('role-destroy')
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy',
                                    $role->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                    @endif


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>
<!-- row closed --> --}}

@endsection
