@extends('dashboard.layouts.master')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('datatable/datatables.min.css') }}">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
        <div class="col-9">
            <div class="row">
        <div class="col-2">
    <h3 class="fw-bold py-3 mb-4">
        Companies
              </h3>
    </div><div class="col-10" style="margin:auto ;
    padding-left: 40px;
">
              <nav aria-label="breadcrumb" >
                    <ol class="breadcrumb breadcrumb-style1">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Home</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0);">companies</a>
                      </li>
                      <li class="breadcrumb-item active">companies</li>
                    </ol>
                  </nav>
                      </div>
                      </div>
                      </div>
                      <div class="col-3" style="align-self: center ;text-align: end">
                           <a href="" type="submit" class="btn btn-icon btn-outline-secondary ">  <i class="fa-solid fa-arrows-rotate"></i></a>

                           <a href="" type="submit" class=" btn btn-icon btn-primary">  <i class="fa-solid fa-plus"></i></a>




                            <button   class="btn btn-icon btn-danger"  id="btn_delete_all" data-bs-toggle="modal"
                          data-bs-target="#smallModal" >    <i   class="bx bx-trash-alt" style="color:white"></i></button>
                      </div>
                     </div>











        <div class="content-wrapper">
            <!-- Content -->
        </div>


        <div class="card ">


            <div class="row">
                <div class="col-12">
                    <h5 class="card-header h"><i class="fa-solid fa-users"></i>  companies list</h5>
                </div>


            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="CustomersTable">
                    <thead>
                        <tr>
                            <th>
                            </th>
                            <th>id</th>
                            <th>name</th>
                            <th>phone number</th>
                            <th>address</th>
                            <th>status</th>

                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    </tbody>

                </table>

            </div>
        </div>

    </div>
    <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                          <div class="modal-content">
                            <div class="modal-header">

                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                             <form action="" method="POST">
                            @csrf
                                  <!--<label for="nameSmall" class="form-label">are sure of the deleting process ?</label>-->     <h4 class="modal-title" id="exampleModalLabel2">are you sure of the deleting process ?</h4>
                                   <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>

                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button type="submit"  class="btn btn-danger">delete</button>
                            </div>
                            </form>
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






$("#CustomersTable_filter").css("padding","15px");
$("#CustomersTable_length").css("padding","15px");
$("#CustomersTable_info").css("padding","23px");

$("#CustomersTable_paginate").css("padding","15px");
$("#CustomersTable_paginate").css("padding","15px");





    });

</script>

@stop
