@extends('Dashboard.layouts.master')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('datatable/datatables.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-10">
         <div class="row">
            <div class="col-1">
               <h3 class="fw-bold py-3 mb-4">
                  Orders
               </h3>
            </div>
            <div class="col-11" style="margin:auto ;
               padding-left: 40px;
               ">
               <nav aria-label="breadcrumb" >
                  <ol class="breadcrumb breadcrumb-style1">
                     <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Home</a>
                     </li>
                     <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Sales</a>
                     </li>
                     <li class="breadcrumb-item active">Orders</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
      <div class="col-2" style="align-self: center ;text-align: end">
         <a href="" type="submit" class="btn btn-icon btn-outline-secondary ">  <i class="fa-solid fa-arrows-rotate"></i></a>
         <a href="{{ route('admin.orders.add') }}" type="submit" class="btn btn-primary btn-icon"><i class="fa-solid fa-plus"></i></a>
         <button   class="btn btn-danger btn-icon "  id="btn_delete_all" data-bs-toggle="modal"
            data-bs-target="#smallModal" >    <i   class="bx bx-trash-alt" style="color:white"></i></button>
      </div>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="card">
            <h5 class="card-header h"><i class='bx bxs-filter-alt'></i> filter</h5>
            <div class="card-body demo-vertical-spacing demo-only-element custom-padding" style="padding-top: 0.9rem;">
               <form  id="OrderFilterForm" >
                  @csrf
                  <div class="row mb-3">



                     <div class="col-3">
                        <div class="form-floating">
                           <input type="date" class="form-control" id="floatingInput" placeholder="" name="date_added"
                              aria-describedby="floatingInputHelp">
                           <label class="ml-2" for="floatingInput">date added</label>
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="form-floating">
                           <input type="date" class="form-control" id="floatingInput" placeholder="" name="date_update"
                              aria-describedby="floatingInputHelp">
                           <label class="ml-2" for="floatingInput">date update</label>
                        </div>
                     </div>


                     <div class="col-2">
                        <div class="form-floating">
                           <select type="text" class="form-control" id="orderStatusId" placeholder="" name="status"
                              aria-describedby="floatingInputHelp">
                              <option value="">open this select menu</option>
                              @isset($status)
                              @foreach($status as $state)
                                <option value="{{ $state }}">{{ $state }}</option>
                                @endforeach
                                @endisset
                           </select>
                           <label class="ml-2" for="floatingInput">Status</label>
                        </div>
                     </div>


                     <div class="col-2">
                        <div class="form-floating">
                           <input type="text" class="form-control" id="totalPriceId" placeholder="John Doe"
                              aria-describedby="floatingInputHelp" name="total_price">
                           <label class="ml-2" for="floatingInput">total</label>
                        </div>
                     </div>
                     <div class="col-2">
                        <button type="submit" class="btn btn-primary " style="margin: auto"><i class='bx bxs-filter-alt'></i> filter</button >
                     </div>
                    </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="card mt-5">
      <div class="row">
         <div class="col-12">
            <h5 class="card-header h">Orders list</h5>
         </div>
      </div>
      <div class="table-responsive text-nowrap">
         <table class="table table-hover table-bordered" id="OrdersTable">
            <thead>
               <tr>
                  <th>
                  </th>
                  <th>ID</th>
                  <th>customer name</th>
                  <th>Status</th>
                  <th>Quantity</th>
                  <th>products number</th>
                  <th>Total</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0 ">

            </tbody>
         </table>
      </div>
   </div>
   <!--/ Hoverable Table rows -->
   <!-- / Content -->
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

                     <h4 class="modal-title" id="exampleModalLabel2">are you sure of the deleting process ?</h4>
                     <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value='' />
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
   <div class="modal fade" id="RejectOrderModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="modalToggleLabel">Reject Order</h5>
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
                     <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Choose a reason for rejection</label>
                        <select  class="form-select" id="exampleFormControlSelect1" name="reason_id" >
                           <option value="" selected="">Open this select menu</option>
                           <option value="1">One</option>
                           <option value="2">Two</option>
                           <option value="3">Three</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label for="exampleFormControlSelect2" class="form-label">Add a new rejection reason</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                     </div>
                     <input type="hidden" id="orderIdInput" name="order_id" value="">
               </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
            </button>
            <button type="submit"  class="btn btn-danger">Ok</button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
@stop
{{-- @section('scripts')
<script type="text/javascript">
   $(function() {



      $('#OrderFilterForm').on('submit', function(e) {
    e.preventDefault();
    $('#OrdersTable').DataTable().ajax.reload();
        });










       var csrfToken = $('meta[name="csrf-token"]').attr('content');

       $('#OrdersTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "{{ route('admin.orders.fetch') }}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },data: function(data) {

            data.from = $('#fromId').val();
            data.to = $('#toId').val();
            data.driver_id = $('#driver-hidden').val();
            data.receiver_id = $('#reciver-hidden').val();
            data.sender_id = $('#sender-hidden').val();
            data.order_status = $('#orderStatusId').val();
            data.order_type_id = $('#orderTypeId').val();
            data.total_price = $('#totalPriceId').val();


        },
    },
    columns: [
        { data: 'x', name: 'x' },
        { data: 'id', name: 'id' },
        { data: 'sender', name: 'sender' },
        { data: 'receiver', name: 'receiver' },
        { data: 'from', name: 'from' },
        { data: 'to', name: 'to' },
        { data: 'service', name: 'service' },
        { data: 'driver', name: 'driver' },
        { data: 'status', name: 'status' },
        { data: 'quantity', name: 'quantity' },
        { data: 'total', name: 'total' },



        {
            data: 'action',
            name: 'action',
          }




















    ],

   });




   $("#OrdersTable_filter").css("padding","15px");
   $("#OrdersTable_length").css("padding","15px");
   $("#OrdersTable_info").css("padding","23px");

   $("#OrdersTable_paginate").css("padding","15px");
   $("#OrdersTable_paginate").css("padding","15px");










        $('#OrdersTable tbody').on('click', 'button', function() {
        // Get the order ID from the data-id attribute
        var orderId = $(this).data('id');

        // Set the order ID value in the hidden input field
        $('#orderIdInput').val(orderId);

        // Open the modal
        $('#RejectOrderModal').modal('show');
    });



















       $("#btn_delete_all").click(function() {
           var selected = new Array();
           $("#table input[type=checkbox]:checked").each(function() {
               selected.push(this.value);
           });

           if (selected.length > 0) {
               $('#delete_all').modal('show')
               $('input[id="delete_all_id"]').val(selected);
               console.log(selected);
           }
       });



        $("input[id=sender]").on('keyup', function() {

                $value = $(this).val();
                if ($value) {

                var t = "";
                $.ajax({
                    type: "get",
                    url: "{{ url('admin/sender/serach') }}",
                    data: {
                        'search': $value
                    },

                    success: function(data) {
                        $.each(data, function(key, value) {

                            t += `
                    <option data-value="${value.id}">${value.first_name} ${value.last_name}</option>
                  `;

                        });
                        $('#senderList').html(t);
                    }
                });
            }
        });
        $("input[id=reciver]").on('keyup', function() {

                $value = $(this).val();
                if ($value) {

                var t = "";
                $.ajax({
                    type: "get",
                    url: "{{ url('admin/reciver/serach') }}",
                    data: {
                        'search': $value
                    },

                    success: function(data) {
                        $.each(data, function(key, value) {

                            t += `
                    <option data-value="${value.id}" >${value.first_name} ${value.last_name}</option>
                  `;

                        });
                        $('#reciverList').html(t);
                    }
                });
            }
        });
        $("input[id=driver]").on('keyup', function() {

                $value = $(this).val();
                if ($value) {

                var t = "";
                $.ajax({
                    type: "get",
                    url: "{{ url('admin/drivers/serach') }}",
                    data: {
                        'search': $value
                    },

                    success: function(data) {
                        $.each(data, function(key, value) {

                            t += `
                    <option data-value="${value.id}">${value.first_name} ${value.last_name}</option>
                  `;

                        });
                        $('#driverList').html(t);
                    }
                });
            }
        });



















   });

   document.querySelector('input[list=driverList]').addEventListener('input', function(e) {
   var input = e.target,
       list = input.getAttribute('list'),

       options = document.querySelectorAll('#' + list + ' option'),
       hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
       inputValue = input.value;
   console.log(list);
   hiddenInput.value = inputValue;

   for(var i = 0; i < options.length; i++) {
       var option = options[i];
    console.log(option);
       if(option.innerText === inputValue) {



           hiddenInput.value = option.getAttribute('data-value');
           break;
       }
   }
   });
   document.querySelector('input[list=senderList]').addEventListener('input', function(e) {
   var input = e.target,
       list = input.getAttribute('list'),

       options = document.querySelectorAll('#' + list + ' option'),
       hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
       inputValue = input.value;
   console.log(list);
   hiddenInput.value = inputValue;

   for(var i = 0; i < options.length; i++) {
       var option = options[i];
    console.log(option);
       if(option.innerText === inputValue) {



           hiddenInput.value = option.getAttribute('data-value');
           break;
       }
   }
   });
   document.querySelector('input[list=reciverList]').addEventListener('input', function(e) {
   var input = e.target,
       list = input.getAttribute('list'),

       options = document.querySelectorAll('#' + list + ' option'),
       hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
       inputValue = input.value;
   console.log(list);
   hiddenInput.value = inputValue;

   for(var i = 0; i < options.length; i++) {
       var option = options[i];
    console.log(option);
       if(option.innerText === inputValue) {



           hiddenInput.value = option.getAttribute('data-value');
           break;
       }
   }
   });
</script>
@stop --}}
