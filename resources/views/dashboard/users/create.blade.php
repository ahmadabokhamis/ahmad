@extends('Dashboard.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- row -->
        @if (count($errors) > 0)
            <div class="bs-toast toast fade show bg-danger" style="width:fit-content" role="alert" aria-live="assertive" aria-atomic="true">
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
        <div class="row">

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
<div class="alert alert-success alert-dismissible" role="alert"  style="display: none">
                            <div  id="msg" >
                                saved successful
                        </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4 mt-4">
                    <h5 class="card-header">User Details</h5>
                        <hr class="my-0" />
                    <div class="card-body">



                        <form id="form" method="post" action="" autocomplete="off">
                            @csrf
                            <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">first name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="first_name" id="location" placeholder=""  value=""    />
                                        <span class="text-danger error-text first_name_error"></span>
                                    </div>
                                </div>

                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">last name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="last_name" id="location" placeholder=""  value=""    />
                                        <span class="text-danger error-text last_name_error"></span>
                                    </div>
                                </div>
                                
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">user Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="user_name" id="basic-default-name" />
                                    <span class="text-danger error-text user_name_error"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="text"  name="email" class="form-control" value="" />
                                    </div>
                                </div>
                            </div>
                           <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="location" placeholder=""  value=""    />
                                        <span class="text-danger error-text password_error"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">confirm</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirmation" id="location" placeholder=""  value=""    />
                                        <span class="text-danger error-text password_error"></span>
                                    </div>
                                </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-confirm-password">Permission</label>
                                <div class="col-sm-10">
                                  {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                </div>
                            </div>


                            <div class="row text-end">
                                <div class="col-sm-12">
                                    <button type="submit" id="add_user" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        @endsection

@section('scripts')
<script>
  $(document).ready(function() {
      //////////////////////////////////////////////
      $('#add_user').on('click', function(e) {
          e.preventDefault();
          var form = $('#form')[0];
          var formData = new FormData(form);


          $.ajax({
              type: 'post',
              enctype: 'multipart/form-data',
              url: "{{route('admin.users.store')}}",
              data: formData,
              processData: false,
              contentType: false,
              cache: false,

              beforeSend: function() {
                  $(document).find('span.error-text').text('');
              },
              success: function(data) {

                  if (data.success == 0) {
                      $.each(data.errors, function(prefix, val) {
                          $('span.' + prefix + '_error').text(val[0]);
                      });
                  } else {


                      $('.alert').show();
                      $('#msg').show().text(data.msg);



                  }
              }
          });
      });









  });
</script>
@stop