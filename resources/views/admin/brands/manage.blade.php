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
            <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Brand Name</label>
                            <input type="text" class="form-control form-control-sm" id="brandName" name="brand_name">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control form-control-sm" id="brandLogo" name="logo">
                        </div>

                        <div class="col-12">
                            <img id="previewImage" src="{{ asset('placeholder-image.jpg') }}"style="max-width: 200px;">
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
                            <li class="dropdown-title">Show Table Title</li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="showName" checked>
                                    <label class="form-check-label" for="showName">
                                        Name
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="showLogo" checked>
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
                            <div id="brandTableLength"></div>
                        </div>
                    </div>
                </div>
                <table class="table table-dashed table-hover digi-dataTable all-brand-table table-striped" id="allBrandTable">
                    <thead>
                        <tr>
                            <th class="no-sort">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="markAllBrand">
                                </div>
                            </th>
                            <th>Brand Name</th>
                            <th>Logo</th>
                            <th>Is Featured</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>{{ $brand->brand_name }}</td>
                            <td><img src="{{ asset('upload/' . $brand->logo) }}" alt="{{ $brand->brand_name }}" style="max-width: 50px;"></td>
                            <td>{{ $brand->is_featured == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $brand->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td style="text-align: center;">
                                <a style="margin: 0 5px" href="{{ route('admin.brands.show', $brand->id) }}"><i class="fa-light fa-eye"></i></a>
                                <a style="margin: 0 5px" href="{{ route('admin.brands.edit', $brand->id) }}"><i class="fa-light fa-pen-to-square"></i></a>
                                <a style="margin: 0 5px" onclick="return confirm('Are you sure?')" href="{{ route('admin.brands.destroy', $brand->id) }}"><i class="fa-light fa-trash"></i></a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#brandLogo').on('change', function() {
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    });

</script>

@endsection
