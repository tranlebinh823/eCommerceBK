@extends('admin.layouts.app')

@section('module', 'Thương Hiệu')
@section('action', 'Chi Tiết')

@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thông tin thương hiệu</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Chi tiết thương hiệu</h5>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="row">ID</th>
                                <th scope="row">Tên Thương Hiệu</th>
                                <th scope="row">Logo</th>
                                <th scope="row">Slug</th>
                                <th class="text-center" scope="row">Ngày Tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td>
                                    <img src="{{ asset('upload/' . $brand->logo) }}" alt="{{ $brand->brand_name }} Logo" style="max-width: 100px;">
                                </td>
                                <td>{{$brand->slug}}</td>
                                <td class="text-center">{{ $brand->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.brands.manage') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
