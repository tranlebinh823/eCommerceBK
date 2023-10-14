@extends('admin.layouts.app')
@section('module', 'Tiểu Danh Mục')
@section('action', 'Chi Tiết')
@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thông tin tiểu danh mục</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Chi tiết danh mục</h5>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="row">ID</th>

                                <th scope="row">Tên danh mục</th>
                                <th scope="row">Tên tiểu danh mục</th>
                                <th scope="row">Slug</th>
                                <th scope="row">Mô tả</th>
                                <th class="text-center" scope="row">Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $subcategory->id }}</td>
                                <td>{{ $subcategory->parent_category_name }}</td>
                                <td>{{ $subcategory->sub_category_name }}</td>
                                <td>{{ $subcategory->slug }}</td>
                                <td>{{ $subcategory->description }}</td>
                                <td class="text-center">{{ $subcategory->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.subcategories.manage') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
