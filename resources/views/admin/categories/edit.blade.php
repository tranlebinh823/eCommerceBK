@extends('admin.layouts.app')
@section('module', 'Category')
@section('action', 'Edit')
@section('content')
<div class="row g-4">
    <div class="col-xxl-6 col-md-5">
        <div class="panel">
            <div class="panel-header">
                <h5>Edit Category</h5>
            </div>
            <form action="{{ route('admin.categories.update',['id'=>$category->id]) }}" method="POST">
                @csrf
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control form-control-sm" id="categoryTitle" value="{{$category->category_name}}" name="category_name">
                            <p class="perma-txt" hidden>
                                Slug: <span data-link="https://example.com/" class="site-link text-primary" id="categoryPermalink">https://example.com/</span>
                                <input type="text" class="form-control form-control-sm" hidden="" name="slug" id="editPermalink">
                                <!-- Add the logic for the edit permalink buttons as needed -->
                            </p>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea rows="5" class="form-control form-control-sm" name="description"></textarea>
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

</div>
@endsection
