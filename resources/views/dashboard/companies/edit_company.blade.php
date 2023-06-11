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
                    <div class="card mb-4">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="card-header">Edit Company</h5>
                            </div>
                            <div class="col-4" style="align-self: center; text-align: center;">
                                <button id="save_trip" class="btn btn-icon btn-primary"><i class="fa-solid fa-floppy-disk"></i></button>
                                <a href="{{ route('admin.companies') }}" class="btn btn-icon btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>


                            </div>
                        </div>

                        <hr class="my-0" />

                        <div class="card-body">
                            <h5 class="">Trip details</h5>
                            <form id="form" method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">from</label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="from_des_id" id="location">

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">to</label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="to_des_id" id="location">

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">Driver</label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="driver_id" id="location">

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">Start time</label>
                                    <div class="col-sm-10">
                                        <input type="time" class="form-control" name="starting_time" id="location" placeholder="" value="" />
                                        <span class="text-danger error-text starting_time_error"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">arrival time</label>
                                    <div class="col-sm-10">
                                        <input type="time" class="form-control" name="arrival_time" id="location" placeholder="" value="" />
                                        <span class="text-danger error-text arrival_time_error"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="location">trip date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" name="trip_date" />
                                        <span class="text-danger error-text trip_date_error"></span>
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
