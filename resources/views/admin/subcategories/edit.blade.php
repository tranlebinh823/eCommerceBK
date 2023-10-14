@extends('admin.layouts.app')
@section('module', 'Sub Category')
@section('action', 'Manage')
@section('content')
<div class="row g-4">
    <div class="col-xxl-6 col-md-5">
        <div class="panel">
            <div class="panel-header">
                <h5>Chỉnh sửa tiểu danh mục</h5>
            </div>
            <form action="{{ route('admin.subcategories.update',['id'=>$subcategory->id]) }}" method="POST">
                @csrf
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Tên tiểu danh mục</label>
                            <input type="text" class="form-control form-control-sm" id="categoryTitle" value="{{$subcategory->sub_category_name}}" name="sub_category_name">
                            <p class="perma-txt" hiden>
                                Slug: <span data-link="https://example.com/" class="site-link text-primary" id="subcategoryPermalink">https://example.com/</span>
                                <input type="text" class="form-control form-control-sm" hidden="" readonly value="{{old('slug',$subcategory->slug)}}" name="slug" id="editPermalink">
                            </p>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Tên danh mục</label>
                            <select name="category_id" class="form-control">
                                <option value="">Chọn danh mục</option>
                                @foreach ($category as $category)
                                <option {{ $category->id == $subcategory->category_id ? 'selected' : '' }} value="{{ $category->id }}">
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Mô tả</label>
                            <textarea rows="5" class="form-control form-control-sm" name="description">{{ old ('description',$subcategory->description) }}</textarea> </div>
                        <div class="col-12 d-flex justify-content-end">
                            <div class="btn-box">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>
@endsection
