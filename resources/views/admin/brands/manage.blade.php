@extends('admin.layouts.app')
@section('module', 'Brand')
@section('action', 'Manage')
@section('content')
<div class="row g-4">
    <div class="col-xxl-4 col-md-5">
        <div class="panel">
            <div class="panel-header">
                <h5>Add New Brand</h5>
            </div>
            <form action="{{ route('admin.brands.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="panel-body">
                    <div class="row g-3">

                        <div class="col-12">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control form-control-sm" id="brandLogo" name="logo" onchange="previewImage(this)">
                        </div>
                        <div class="col-12">
                            <img id="image-preview" src="" alt="" style="max-width: 100px; max-height: 100px;">

                        </div>
                        <div class="col-12">
                            <label class="form-label">Brand Name</label>
                            <input type="text" class="form-control form-control-sm" id="BrandTitle" name="brand_name">

                        </div>
                        <div class="col-12">
                            <label class="form-label">Is Featured</label>
                            <select class="form-control form-control-sm" name="is_featured">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Status</label>
                            <select class="form-control form-control-sm" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>


                        <div class="col-12 d-flex justify-content-end">
                            <div class="btn-box">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <div class="col-xxl-8 col-md-7">
        <div class="panel">
            <div class="panel-header" style="padding: 2% 2%">
                <h5>All Brands</h5>
                <div class="btn-box d-flex gap-3">
                    <div id="tableSearch"></div>
                    <button class="btn btn-sm btn-icon btn-outline-primary"><i class="fa-light fa-arrows-rotate"></i></button>
                    <div class="digi-dropdown dropdown">
                        <button class="btn btn-sm btn-icon btn-outline-primary" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="fa-regular fa-ellipsis-vertical"></i></button>
                        <ul class="digi-dropdown-menu dropdown-menu">
                            <li cla ss="dropdown-title">Show Table Title</li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="showName" checked>
                                    <label class="form-check-label" for="showName">
                                        Brand Name
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="file" id="showLogo" checked>
                                    <label class="form-check-label" for="showLogo">
                                        Logo
                                    </label>
                                </div>
                            </li>

                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="showIsFeatured" checked>
                                    <label class="form-check-label" for="showIsFeatured">
                                        Is Featured
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="showStatus" checked>
                                    <label class="form-check-label" for="showStatus">
                                        Status
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="showAction" checked>
                                    <label class="form-check-label" for="showAction">
                                        Action
                                    </label>
                                </div>
                            </li>
                            <li class="dropdown-title pb-1">Showing</li>
                            <li>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-sm w-50" value="10">
                                    <button class="btn btn-sm btn-primary w-50">Apply</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-filter-option">
                    <div class="row justify-content-between g-3">
                        <div class="col-xxl-4 col-6 col-xs-12">
                            <form class="row g-2">
                                <div class="col-8">
                                    <select class="form-control form-control-sm" data-placeholder="Bulk action">
                                        <option value="">Bulk action</option>
                                        <option value="0">Edit</option>
                                        <option value="1">Move To Trash</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-sm btn-primary w-100">Apply</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-2 col-3 col-xs-12 d-flex justify-content-end">
                            <div id="productTableLength"></div>
                        </div>
                    </div>
                </div>
                <table class="table table-dashed table-hover digi-dataTable all-product-table table-striped" id="allProductTable">
                    <thead>
                        <tr>
                            <th class="no-sort">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="markAllProduct">
                                </div>
                            </th>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Brand Name</th>
                            <th>Is_featured</th>
                            <th>Status</th>
                            <th>Create</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $i)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('upload/' . $i->logo) }}" alt="{{ $i->brand_name }}" height="120" width="120"></td>
                            <td>{{ $i->brand_name }}</td>
                            <td>{{ $i->is_featured }}</td>
                            <td>{{ $i->status }}</td>
                            <td>{{ $i->created_at }}</td>
                            <td style="text-align: center;">
                                <a style="margin: 0 5px" href="{{ route('admin.brands.show',  $i->id) }}"><i class="fa-light fa-eye"></i></a>
                                <a style="margin: 0 5px" href="{{ route('admin.brands.edit',  $i->id) }}"><i class="fa-light fa-pen-to-square"></i></a>
                                <a style="margin: 0 5px" onclick="return confirm('Are you sure?')" href="{{ route('admin.brands.destroy',  $i->id) }}"><i class="fa-light fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="table-bottom-control"></div>
            </div>

        </div>
    </div>
</div>
<script>
    function previewImage(input) {
        var preview = document.getElementById('image-preview');
        var imagePreviewContainer = document.querySelector('.image-preview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                imagePreviewContainer.style.display = 'block'; // Hiển thị hình ảnh xem trước
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            imagePreviewContainer.style.display = 'none'; // Ẩn hình ảnh xem trước nếu không có tệp được chọn
        }
    }

</script>
@endsection
