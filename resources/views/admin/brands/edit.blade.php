@extends('admin.layouts.app')
@section('module', 'Thương Hiệu')
@section('action', 'Chỉnh Sửa')
@section('content')
<div class="row g-4">
    <div class="col-xxl-6 col-md-5">
        <div class="panel">
            <div class="panel-header">
                <h5>Chỉnh Sửa Thương Hiệu</h5>
            </div>
            <form action="{{ route('admin.brands.update',['id'=>$brand->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Tên Thương Hiệu</label>
                            <input type="text" class="form-control form-control-sm" id="brandName" value="{{$brand->brand_name}}" name="brand_name">
                            <p class="perma-txt" hidden>
                                Slug: <span data-link="https://example.com/" class="site-link text-primary" id="brandPermalink">https://example.com/</span>
                                <input type="text" class="form-control form-control-sm" hidden="" name="slug" id="editPermalink">
                            </p>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control form-control-sm" name="logo">
                            @if ($brand->logo)
                            <img src="{{ asset('upload/' . $brand->logo) }}" alt="{{$brand->brand_name}} Logo" style="max-width: 100px;">
                            @endif
                        </div>
                        <div class="col-12">
                            <label class="form-label">Trạng Thái</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Tạm dừng</option>
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <div class="btn-box">
                                <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
