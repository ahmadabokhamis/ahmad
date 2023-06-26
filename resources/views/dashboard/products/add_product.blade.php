@extends('Dashboard.layouts.master') @section('content')
    <Style>
        #image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .image-wrapper {
            position: relative;
            width: 33.33%;
            padding: 5px;
        }

        .image-thumb {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .close {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            z-index: 1;
            opacity: 0.7;
            transition: opacity 0.3s ease-in-out;
        }

        .close:hover {
            opacity: 1;
        }
    </Style>
    <!-- Content wrapper -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-4">
                        <h3 class="fw-bold py-3 mb-4">
                            Add Product
                        </h3>
                    </div>
                    <div class="col-8" style="margin:auto ;

    ">

                    </div>
                </div>
            </div>
            <div class="col-3" style="align-self: center ;text-align: end">
                <button id="save_trip" class="btn btn-icon btn-primary"><i class="fa-solid fa-floppy-disk"></i></button>
                <a href="{{ route('admin.products') }}" class="btn btn-icon btn-outline-secondary"><i
                        class="fa-solid fa-arrow-left"></i></a>

            </div>
        </div>


        <div class="content-wrapper">
            <!-- Content -->
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-home" aria-controls="navs-justified-home"
                                aria-selected="false">
                                <i class="tf-icons bx bx-home"></i> General
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link " role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile"
                                aria-selected="true">
                                <i class="tf-icons bx bx-images"></i> pictures
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages"
                                aria-selected="false">
                                <i class="tf-icons bx bx-message-square"></i> options
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="navs-justified-home" role="tabpanel">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-6" style="border-right: 1px #d9dee3 solid;">
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">name</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="name" id="location"
                                                        placeholder="" value="" />
                                                    <span class="text-danger error-text height_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">description </label>
                                                <div class="col-9">
                                                    <textarea type="text" class="form-control" name="description" id="location" placeholder="" value=""></textarea>
                                                    <span class="text-danger error-text height_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">Category</label>
                                                <div class="col-9">
                                                    <select type="text" class="form-select" name="category_id">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text pickup_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="col-form-label" for="location">Brand</label>
                                                </div>
                                                <div class="col-9">
                                                    <select id="select-state" class="form-select" name="brand_id">
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">
                                                                {{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">price</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="price"
                                                        id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text length_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">quantity</label>
                                                <div class="col-9">
                                                    <input type="number" class="form-control" id="quantity"
                                                        name="quantity" id="location" placeholder="" value="1"
                                                        min="1" />
                                                    <span class="text-danger error-text quantity_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">weight</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="weight"
                                                        id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text weight_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">height</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="height"
                                                        id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text height_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">width</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="width"
                                                        id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text width_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">length</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="length"
                                                        id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text length_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="navs-justified-profile" role="tabpanel">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">product images</label>
                                <input class="form-control" type="file" id="images" multiple="">
                                <div class="container-fluid mt-3" id="image-container">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-6" style="border-right: 1px #d9dee3 solid;">
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">sizes</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="name"
                                                        id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text height_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">colors
                                                </label>

                                                    <input type="checkbox" class="form-control" name="colors[]"
                                                    id="location"  />  <input type="checkbox" class="form-control" name="colors[]"
                                                    id="location"  />  <input type="checkbox" class="form-control" name="colors[]"
                                                    id="location" placeholder="" value="" />  <input type="checkbox" class="form-control" name="colors[]"
                                                    id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text height_error"></span>

                                            </div>
                                        </div>







                                    </div>
                                    <div class="col-6">
                                        <div class="row mb-3">
                                            <div class="row">
                                                <label class="col-3 col-form-label" for="location">price</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="price"
                                                        id="location" placeholder="" value="" />
                                                    <span class="text-danger error-text length_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @stop
    @section('scripts')
        <script>
            function buildTable(colors, sizes) {
                var table = document.createElement("table");
                var thead = document.createElement("thead");
                var tbody = document.createElement("tbody");

                // إضافة الصف الرأسي
                var headerRow = document.createElement("tr");
                var colorHeader = document.createElement("th");
                colorHeader.textContent = "Color";
                headerRow.appendChild(colorHeader);
                var sizeHeader = document.createElement("th");
                sizeHeader.textContent = "Size";
                headerRow.appendChild(sizeHeader);
                var quantityHeader = document.createElement("th");
                quantityHeader.textContent = "Quantity";
                headerRow.appendChild(quantityHeader);
                thead.appendChild(headerRow);

                // إضافة الصفوف
                for (var i = 0; i < colors.length; i++) {
                    for (var j = 0; j < sizes.length; j++) {
                        var row = document.createElement("tr");
                        var colorCell = document.createElement("td");
                        colorCell.textContent = colors[i];
                        row.appendChild(colorCell);
                        var sizeCell = document.createElement("td");
                        sizeCell.textContent = sizes[j];
                        row.appendChild(sizeCell);
                        var quantityCell = document.createElement("td");
                        var quantityInput = document.createElement("input");
                        quantityInput.type = "number";
                        quantityInput.name = colors[i] + "-" + sizes[j] + "-quantity";
                        quantityCell.appendChild(quantityInput);
                        row.appendChild(quantityCell);
                        tbody.appendChild(row);
                    }
                }

                table.appendChild(thead);
                table.appendChild(tbody);
                return table;
            }




            var button = document.getElementById("createTableButton");
            button.addEventListener("click", function() {
                var selectedColors = [];
                var colorCheckboxes = document.querySelectorAll('input[name="color"]');
                for (var i = 0; i < colorCheckboxes.length; i++) {
                    if (colorCheckboxes[i].checked) {
                        selectedColors.push(colorCheckboxes[i].value);
                    }
                }

                var selectedSizes = [];
                var sizeCheckboxes = document.querySelectorAll('input[name="size"]');
                for (var i = 0; i < sizeCheckboxes.length; i++) {
                    if (sizeCheckboxes[i].checked) {
                        selectedSizes.push(sizeCheckboxes[i].value);
                    }
                }

                var table = buildTable(selectedColors, selectedSizes);
                document.body.appendChild(table);
            });



































            var imageContainer = document.getElementById("image-container");
            var imagesInput = document.getElementById("images");
            var imageCount = 0;

            imagesInput.addEventListener("change", function() {
                imageContainer.innerHTML = ""; // Clear previous images
                imageCount = 0;

                for (var i = 0; i < imagesInput.files.length; i++) {
                    var image = document.createElement("img");
                    image.src = URL.createObjectURL(imagesInput.files[i]);
                    image.className = "image-thumb";
                    image.setAttribute("data-index", imageCount); // Set unique index for each image

                    var closeButton = document.createElement("button");
                    closeButton.type = "button";
                    closeButton.className = "close";
                    closeButton.innerHTML = "&times;";
                    closeButton.addEventListener("click", function() {
                        var imageIndex = this.parentNode.querySelector("img").getAttribute(
                            "data-index"); // Get index of the image
                        this.parentNode.parentNode.removeChild(this.parentNode);
                        // Code to remove the image from selection based on its index
                        var files = Array.from(imagesInput.files);
                        files.splice(imageIndex, 1);
                        imagesInput.files = new FileList(files);
                        if (files.length > 0) {
                            imagesInput.value = "";
                            imagesInput.value = files.map((file) => file.name).join(", ");
                        } else {
                            imagesInput.value = "";
                        }
                    });

                    var imageWrapper = document.createElement("div");
                    imageWrapper.className = "image-wrapper";
                    imageWrapper.appendChild(image);
                    imageWrapper.appendChild(closeButton);

                    imageContainer.appendChild(imageWrapper);
                    imageCount++;
                }
            });


            $(document).ready(function() {
                $("#save_trip").on("click", function(e) {
                    e.preventDefault();
                    var form = $("#form")[0];
                    var formData = new FormData(form);

                    $.ajax({
                        type: "post",
                        enctype: "multipart/form-data",
                        url: "{{ url('/admin/products/store') }}",
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
