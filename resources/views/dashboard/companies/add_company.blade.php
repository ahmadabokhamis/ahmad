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
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                        </button>
                    </div>
                    <div class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
                        <div id="error-message"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="card mb-4">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="card-header">Add Company</h5>
                            </div>
                            <div class="col-4" style="align-self: center; text-align: center;">
                                <button id="save_company" class="btn btn-icon btn-primary"><i class="fa-solid fa-floppy-disk"></i></button>
                                <a href="{{ route('admin.companies') }}" class="btn btn-icon btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>


                            </div>
                        </div>

                        <hr class="my-0" />

                        <div class="card-body">
                            <form id="form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-6" style="border-right: 1px #d9dee3 solid;">
                                        <div class="row mb-3">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="col-form-label" for="location">name</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" name="name" />
                                                    <span class="text-danger error-text name_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">desciption</label>
                                                <div class="col-9">
                                                    <textarea class="form-control"              name="desciption"  ></textarea>
                                                    <span class="text-danger error-text desciption_error"></span>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">address</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" id="address" name="address" id="location" placeholder="" value=""  />
                                                    <span class="text-danger error-text address_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">email</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="email" id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">phone</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="phone" id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text phone_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">country</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="country" id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text country_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">region</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="region" id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text region_error"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6">


                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">product description</label>
                                                <div class="col-9">
                                                <textarea class="form-control" name="product_description" ></textarea>
                                                    <span class="text-danger error-text product_description_error"></span>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">establishment date</label>
                                                <div class="col-9">
                                                <input class="form-control" type="date" name="establishment_date" />
                                                    <span class="text-danger error-text establishment_date_error"></span>
                                                </div>

                                            </div>
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
            $("#save_company").on("click", function(e) {
                e.preventDefault();
                var form = $("#form")[0];
                var formData = new FormData(form);

                $.ajax({
                    type: "post",
                    enctype: "multipart/form-data",
                    url: "{{ url('/admin/companies/store') }}",
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
                            $(".alert").show();
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

