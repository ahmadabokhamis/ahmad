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
                    <div class="card mb-4">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="card-header">Edit Product</h5>
                            </div>
                            <div class="col-4" style="align-self: center; text-align: center;">
                                <button id="save_trip" class="btn btn-icon btn-primary"><i class="fa-solid fa-floppy-disk"></i></button>
                                <a href="{{ route('admin.products') }}" class="btn btn-icon btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>


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
                                                    <label class="col-form-label" for="location">Brand</label>
                                                </div>
                                                <div class="col-9">
                                                    <select id="select-state" class="form-select" placeholder="Select a sender..." name="brand_id" >
                                                        <option value=""> </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">Company</label>
                                                <div class="col-9">
                                                    <select type="text" class="form-select" name="company_id"> </select>
                                                    <span class="text-danger error-text pickup_error"></span>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">quantity</label>
                                                <div class="col-9">
                                                    <input type="number" class="form-control" id="quantity" name="quantity" id="location" placeholder="" value="1" min="1" />
                                                    <span class="text-danger error-text quantity_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">weight</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="weight" id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text weight_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">height</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="height" id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text height_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">width</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="width" id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text width_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">length</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="length" id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text length_error"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6">






                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop @section('scripts')
    <script>
        $(document).ready(function () {
            //////////////////////////////////////////////
            $("#save_trip").on("click", function (e) {
                e.preventDefault();
                var form = $("#form")[0];
                var formData = new FormData(form);

                $.ajax({
                    type: "post",
                    enctype: "multipart/form-data",
                    url: "{{ url('/admin/products/update') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,

                    beforeSend: function () {
                        $(document).find("span.error-text").text("");
                    },
                    success: function (data) {
                        if (data.success == 0) {
                            $.each(data.errors, function (prefix, val) {
                                $("span." + prefix + "_error").text(val[0]);
                            });
                        } else {
                            $(".alert").show();
                            $("#msg").show().text(data.msg);
                        }
                    },
                });
            });
        });
    </script>
    @stop
</div>
