@extends('admin.layouts.app')
@section('module', 'Sub Category')
@section('action', 'Manage')
@section('content')
<div class="row g-4">
    <div class="col-xxl-4 col-md-5">
        <div class="panel">
            <div class="panel-header">
                <h5>Add New Sub Category</h5>
            </div>
            <form action="{{ route('admin.subcategories.store') }}" method="POST">
                @csrf
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Sub Category Name</label>
                            <input type="text" class="form-control form-control-sm" id="subcategoryTitle" name="sub_category_name">
                            <p class="perma-txt" hidden>
                                Slug: <span data-link="https://example.com/" class="site-link text-primary" id="subcategoryPermalink">https://example.com/</span>
                                <input type="text" class="form-control form-control-sm" hidden="" name="slug" id="editPermalink">
                            </p>
                        </div>
                        <select name="category_id" class="form-control">
                            <option value="">Select a category</option>
                            @foreach ($category as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>


                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea rows="5" class="form-control form-control-sm" name="description"></textarea>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <div class="btn-box">
                                <button type="submit" class="btn btn-sm btn-primary">Save SubCategory</button>
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
                <h5>All Sub Categories</h5>
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
                                    <input class="form-check-input" type="checkbox" id="showDescription" checked>
                                    <label class="form-check-label" for="showDescription">
                                        Description
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="showSlug" checked>
                                    <label class="form-check-label" for="showSlug">
                                        Slug
                                    </label>
                                </div>
                            </li>
                            {{-- <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="showCount" checked>
                                        <label class="form-check-label" for="showCount">
                                            Count
                                        </label>
                                    </div>
                                </li> --}}
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
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Slug Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategory as $i)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>{{ $i->category_name }}</td>
                            <td>{{ $i->sub_category_name }}</td>
                            <td>{{ $i->slug }}</td>
                            <td style="text-align: center;">
                                <a style="margin: 0 5px" href="{{ route('admin.subcategories.show',['id' => $i->id]) }}"><i class="fa-light fa-eye"></i></a>
                                <a style="margin: 0 5px" href="{{ route('admin.subcategories.edit', ['id' => $i->id]) }}"><i class="fa-light fa-pen-to-square"></i></a>
                                <a style="margin: 0 5px" onclick="return confirm('Are you sure?')" href="{{ route('admin.subcategories.destroy', ['id' => $i->id]) }}"><i class="fa-light fa-trash"></i></a>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="table-bottom-control"></div>
            </div>

        </div>
    </div>
</div>
@endsection
