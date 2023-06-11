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
    </div><div class="col-10" style="margin:auto ;
    padding-left: 40px;
">
              <nav aria-label="breadcrumb" >
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
                           <a href="" type="submit" class="btn btn-icon btn-outline-secondary ">  <i class="fa-solid fa-arrows-rotate"></i></a>

                           <a href="{{ route('admin.customers.add') }}" type="submit" class=" btn btn-icon btn-primary">  <i class="fa-solid fa-plus"></i></a>




                            <button   class="btn btn-icon btn-danger"  id="btn_delete_all" data-bs-toggle="modal"
                          data-bs-target="#smallModal" >    <i   class="bx bx-trash-alt" style="color:white"></i></button>
                      </div>
                     </div>











        <div class="content-wrapper">
            <!-- Content -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header h"><i class='bx bxs-filter-alt'></i> filter</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element custom-padding" style="padding-top: 0.9rem;">
                        <form id="CustomersFilterForm">
                            @csrf
                        <div class="row mb-3">

                            <div class="col-3">
                                <!--<div class="form-floating">-->
                                <!--    <input type="text" class="form-control" id="NameId" placeholder="Customer name" -->
                                <!--        aria-describedby="floatingInputHelp">-->
                                <!--    <label class="ml-2" for="floatingInput">First name</label>-->
                                <!--</div>-->


                                 <div class="form-floating">
                           <input list="senderList" id="sender" class="form-control" placeholder="sender name" aria-describedby="floatingInputHelp"  >
                           <datalist id="senderList" >
                           </datalist>
                           <input type="hidden" name="sender_id" id="sender-hidden">
                           <label class="ml-2" for="floatingInput">sender</label>
                        </div>
                            </div>
                            <!--<div class="col-3">-->
                            <!--    <div class="form-floating">-->
                            <!--        <input type="text" class="form-control" id="lastNameId" placeholder="last name"-->
                            <!--            aria-describedby="floatingInputHelp"  name="last_name">-->
                            <!--        <label class="ml-2" for="floatingInput">last name</label>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phoneNumberId" placeholder="" name="number"
                                        aria-describedby="floatingInputHelp">
                                    <label class="ml-2" for="floatingInput">Phone number</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="addressId" placeholder="" name="address"
                                        aria-describedby="floatingInputHelp">
                                    <label class="ml-2" for="floatingInput">Address</label>
                                </div>
                            </div>


                        </div>
                        <div class="row mb-3">

                            <div class="col-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="statusId" placeholder=""
                                        aria-describedby="floatingInputHelp">
                                    <label class="ml-2" for="floatingInput">Status</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="dataAddedId" placeholder="" name="date_added"
                                        aria-describedby="floatingInputHelp">
                                    <label class="ml-2" for="floatingInput">date added</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="dataUpdateId" placeholder="" name="date_update"
                                        aria-describedby="floatingInputHelp">
                                    <label class="ml-2" for="floatingInput">date update</label>
                                </div>
                            </div>


                            <div class="col-2">
                                <button type="submit" class="btn btn-primary " style="margin: auto"><i class='bx bxs-filter-alt'></i> filter</button>
                                </div>
                            </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>















<div class="card mt-5">






                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>

                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>

                        </tr>

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


            $('#example').DataTable();






// $("#CustomersTable_filter").css("padding","15px");
// $("#CustomersTable_length").css("padding","15px");
// $("#CustomersTable_info").css("padding","23px");

// $("#CustomersTable_paginate").css("padding","15px");
// $("#CustomersTable_paginate").css("padding","15px");





    });

</script>

@stop
