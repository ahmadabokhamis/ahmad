@extends('Dashboard.layouts.master') @section("content")

<!-- Content wrapper -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="content-wrapper">
        <!-- Content -->

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="alert alert-success alert-dismissible" role="alert" style="display: none;">
                        <div id="msg"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
                        <div id="error-message"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="card mb-4">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="card-header">Add Customer</h5>
                            </div>
                            <div class="col-4" style="align-self: center; text-align: center;">
                                <button id="save_customer" class="btn btn-icon btn-primary"><i class="fa-solid fa-floppy-disk"></i></button>
                                <a href="{{ route('admin.customers') }}" class="btn btn-icon btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>


                            </div>
                        </div>

                        <hr class="my-0" />

                        <div class="card-body">
                            {{-- <h5 class="">Trip details</h5> --}}
                            <form id="form" method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="location" placeholder="" value="" />
                                        <span class="text-danger error-text name_error"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="location" placeholder="" value="" />
                                        <span class="text-danger error-text email_error"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" placeholder="" value="" />
                                        <span class="text-danger error-text phone_error"></span>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">password </label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="location" placeholder="" value="" />
                                        <span class="text-danger error-text password_error"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">confirm password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirmation" id="location" placeholder="" value="" />
                                        <span class="text-danger error-text password_error"></span>
                                    </div>
                                </div>




                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop
    @section('scripts')
    <script>
        $(document).ready(function() {
            //////////////////////////////////////////////
            $("#save_customer").on("click", function(e) {
                e.preventDefault();
                var form = $("#form")[0];
                var formData = new FormData(form);

                $.ajax({
                    type: "post",
                    enctype: "multipart/form-data",
                    url: "{{ url('/admin/customers/store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,

                    beforeSend: function() {
                        $(document).find("span.error-text").text("");
                    },
                    success: function(data) {
                        if (data.success == 0) {
                            $.each(data.errors, function(prefix, val) {
                                $("span." + prefix + "_error").text(val[0]);
                            });
                        } else {
                            $(".alert-danger").hide();
                            $(".alert-success").show();
                            $("#msg").show().text(data.msg);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $(".alert-success").hide();
                        var errorMessage = "An error occurred: ";

                        if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                            errorMessage += jqXHR.responseJSON.message;
                        } else {
                            errorMessage += errorThrown;
                        }

                        $(".alert-danger").show();
                        $("#error-message").show().text(errorMessage);
                    },
                });
            });
        });
    </script>
@stop
</div>
