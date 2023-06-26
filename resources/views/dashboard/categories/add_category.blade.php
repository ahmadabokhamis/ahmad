@extends('Dashboard.layouts.master') @section('content')

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
                                    <h5 class="card-header">Add Category</h5>
                                </div>
                                <div class="col-4" style="align-self: center; text-align: center;">
                                    <button id="save_trip" class="btn btn-icon btn-primary"><i
                                            class="fa-solid fa-floppy-disk"></i></button>
                                    <a href="{{ route('admin.categories') }}" class="btn btn-icon btn-outline-secondary"><i
                                            class="fa-solid fa-arrow-left"></i></a>


                                </div>
                            </div>

                            <hr class="my-0" />

                            <div class="card-body">

                                <form id="form" method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="location">Category name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="location"
                                                placeholder="category name" value="" />

                                            <span class="text-danger error-text name_error"></span>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="location">Description</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" placeholder="description" name="description" id="location">

                                        </textarea>
                                        <span class="text-danger error-text description_error"></span>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="location">Category Parent</label>
                                        <div class="col-sm-10">
                                            <select type="text" class="form-select" name="parent_id" id="location">

                                            </select>
                                            <span class="text-danger error-text parent_id_error"></span>
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
            $("#save_trip").on("click", function(e) {
                e.preventDefault();
                var form = $("#form")[0];
                var formData = new FormData(form);

                $.ajax({
                    type: "post",
                    enctype: "multipart/form-data",
                    url: "{{ url('/admin/categories/store') }}",
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
</div>
