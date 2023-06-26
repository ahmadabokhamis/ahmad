

@extends('Dashboard.layouts.master')
@section('content')
 <link rel="stylesheet" href="{{  URL::asset('datatable/datatables.min.css') }}" >










<div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-9">
            <div class="row">
        <div class="col-2">
    <h3 class="fw-bold py-3 mb-4">
                Users
              </h3>
    </div><div class="col-10" style="margin:auto ;

">
              <nav aria-label="breadcrumb" >
                    <ol class="breadcrumb breadcrumb-style1">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Home</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0);">System</a>
                      </li>
                      <li class="breadcrumb-item active">Users</li>
                    </ol>
                  </nav>
                      </div>
                      </div>
                      </div>
                      <div class="col-3" style="align-self: center ;text-align: end">




                           <a href=""  class=" btn btn-icon btn-primary">  <i class="fa-solid fa-plus"></i></a>




                            <button   class="btn btn-icon btn-danger"  id="btn_delete_all" data-bs-toggle="modal"
                          data-bs-target="#smallModal" >    <i   class="bx bx-trash-alt" style="color:white"></i></button>
                      </div>



















                     </div>
    <div class="content-wrapper">
        <!-- Content -->
        <div class="card">


            <div class="row">
                <div class="col-12">
                    <h5 class="card-header h">Users list</h5>
                </div>


            </div>
            <div class="table-responsive text-nowrap">
                <table id="table" class="table table-hover" >
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" id=""  onclick="CheckAll('box1',this)"></th>
                            <th>user name</th>
                            <th>group</th>
                            <th>status</th>
                            <th>User type</th>
                            <!--<th>Date Upated</th>-->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">



                        @isset($users)
                            @foreach ($users as $user)

                            <tr>
                                <td><input type="checkbox" value="{{$user->id}}" class="box1" id="" ></td>
                                <td>{{$user->user_name}}</td>
                                <td></td>
                                <td>@isset($user->status)

                                @if ($user->status == 'Active')
                                <span class="badge st-active  bg-label-success me-1">
                                    {{ $user->status }}
                                </span>
                                @else
                                <span class="badge st-block bg-label-warning me-1r">
                                    {{ $user->status }}
                                </span>
                                @endif






                                    @endisset
                                </td>
                                <!--<td></td>-->
                                <td>
                                     @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)

                                                <span class="badge  bg-label-primary me-1">
                                    {{ $v }}
                                </span>
                                            @endforeach
                                        @endif
                                    </td>







                                <td>  <a href="" class="btn btn-icon btn-outline-success"
                                    >
                                    <i class="bx bx-edit-alt"></i>
                                </a>

                                <!-- Modal -->

</td>
                            </tr>

                            @endforeach
                            @endisset
                    </tbody>

                </table>

            </div>
        </div>

    </div>
</div>

    @stop

