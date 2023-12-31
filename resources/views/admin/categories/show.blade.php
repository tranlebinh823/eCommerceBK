@extends('admin.layouts.app')
@section('module', 'Danh Mục')
@section('action', 'Chi Tiết')

@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thông tin danh mục</h4>
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
                                <th scope="row">Slug</th>
                                <th class="text-center" scope="row">Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td class="text-center">{{ $category->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.categories.manage') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
