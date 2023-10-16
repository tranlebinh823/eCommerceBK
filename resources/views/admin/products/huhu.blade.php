@extends('admin.layouts.app')
@section('module', 'Product')
@section('action', 'Create')
@section('content')

<form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="row g-4">
        <div class="col-xxl-9 col-lg-8">
            <div class="panel mb-30">
                <div class="panel-body product-title-input">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="product_name" placeholder="Name for product">
                    <label class="form-label">Product Title</label>
                    <input type="text" class="form-control" id="productTitle" name="product_title" placeholder="Title for product">
                    <p class="perma-txt" hidden>
                        Permalink: <span data-link="https://example.com/" class="site-link text-primary" id="productPermalink">https://example.com/</span>
                        <input type="text" class="form-control form-control-sm" name="slug" hidden id="editPermalink">
                        <button class="btn-flush bg-primary" id="editPermaBtn">Edit</button>
                        <button class="btn-flush bg-success" id="createPerma" hidden>OK</button>
                        <button class="btn-flush bg-danger" id="cancelPerma" hidden>Cancel</button>
                    </p>
                </div>
            </div>
            <div class="panel mb-30">
                <div class="panel-header">
                    <h5> Description</h5>
                    <div class="btn-box d-flex gap-2">
                        <button class="btn btn-sm btn-icon btn-outline-primary"><i class="fa-light fa-arrows-rotate"></i></button>
                        <button class="btn btn-sm btn-icon btn-outline-primary panel-close"><i class="fa-light fa-angle-up"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <label class="form-label">Pro Description</label>
                    <textarea rows="5" class="form-control " name="pro_description"></textarea>
                    <label class="form-label">Short Description</label>
                    <textarea rows="2" class="form-control " name="short_description"></textarea>
                </div>
            </div>
            <div class="panel mb-30">
                <div class="panel-header">
                    <h5>Product Data</h5>
                    <div class="panel-header-right">
                        <div class="form-check d-flex gap-4">
                        </div>
                    </div>
                    <div class="btn-box d-flex gap-2">
                        <button class="btn btn-sm btn-icon btn-outline-primary"><i class="fa-light fa-arrows-rotate"></i></button>
                        <button class="btn btn-sm btn-icon btn-outline-primary panel-close"><i class="fa-light fa-angle-up"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <nav>
                        <div class="btn-box d-flex flex-wrap gap-1 mb-30" id="nav-tab" role="tablist">
                            <button class="btn btn-sm btn-outline-primary active" id="nav-media-tab" data-bs-toggle="tab" data-bs-target="#nav-media" type="button" role="tab" aria-controls="nav-media" aria-selected="true">Ảnh</button>
                            <button class="btn btn-sm btn-outline-primary" id="nav-inventory-tab" data-bs-toggle="tab" data-bs-target="#nav-inventory" type="button" role="tab" aria-controls="nav-inventory" aria-selected="false">Kho</button>
                            <button class="btn btn-sm btn-outline-primary" id="nav-price-tab" data-bs-toggle="tab" data-bs-target="#nav-price" type="button" role="tab" aria-controls="nav-price" aria-selected="false">Giá</button>
                        </div>
                    </nav>
                    <div class="tab-content product-data-tab" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-media" role="tabpanel" aria-labelledby="nav-media-tab" tabindex="0">
                            <div class="row">
                                <div class="col-xxl-3 col-md-4 col-5 col-xs-12">
                                    <div class="add-thumbnail product-image-upload">
                                        <div class="part-txt">
                                            <h5>Add thumbnail <span>(jpeg/png)</span></h5>
                                        </div>
                                        <input type="text" name="images" class="image-input" id="thumbUpload">
                                    </div>
                                </div>
                                <div class="col-xxl-9 col-md-8 col-7 col-xs-12">
                                    <div class="add-gallery-img product-image-upload">
                                        <div class="part-txt">
                                            <h5>Add gallery <span>(jpeg/png)</span></h5>
                                        </div>
                                        <input type="text" name="images_gallery[]" class="image-input" id="galleryUpload">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="nav-inventory" role="tabpanel" aria-labelledby="nav-inventory-tab" tabindex="0">
                            <div class="row col-md-10">
                                <label for="manageStock" class="col-md-2 col-form-label col-form-label-sm">
                                    Quantity Stock
                                </label>
                                <div class="col-md-10">
                                    <input type="number" name="stock" class="form-control form-control-sm" id="manageStock">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-price" role="tabpanel" aria-labelledby="nav-price-tab" tabindex="0">
                            <form>
                                <div class="row g-3 mb-3">
                                    <label for="regularPrice" class="col-md-2 col-form-label col-form-label-sm">Giá bán</label>
                                    <div class="col-md-10">
                                        <input type="number" name="price" class="form-control form-control-sm" id="regularPrice">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <label for="salePrice" class="col-md-2 col-form-label col-form-label-sm">Giá chào bán</label>
                                    <div class="col-md-8">
                                        <input type="number" name="offer_price" class="form-control form-control-sm" id="salePrice">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-4 add-product-sidebar">
            <div class="panel mb-30">
                <div class="panel-header">
                    <h5>Published</h5>
                    <div class="btn-box d-flex gap-2">
                        <button class="btn btn-sm btn-icon btn-outline-primary"><i class="fa-light fa-arrows-rotate"></i></button>
                        <button class="btn btn-sm btn-icon btn-outline-primary panel-close"><i class="fa-light fa-angle-up"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label">Status</label>
                            <select class="form-control form-control-sm" name="status">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Visibility</label>
                            <select class="form-control form-control-sm" name="visibility">
                                <option value="0">Public</option>
                                <option value="1">Private</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="publish-date">
                            <label>Published on: </label>
                            <input class="input-flush" type="text" id="publishDate" name="publish">
                            <label for="publishDate" class="cursor-pointer text-primary"><i class="fa-light fa-pen-to-square"></i></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel mb-30">
                <div class="panel-header">
                    <h5>Brands</h5>
                    <div class="btn-box d-flex gap-2">
                        <button class="btn btn-sm btn-icon btn-outline-primary"><i class="fa-light fa-arrows-rotate"></i></button>
                        <button class="btn btn-sm btn-icon btn-outline-primary panel-close"><i class="fa-light fa-angle-up"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="input-group-with-icon mb-20">
                        <span class="input-icon"><i class="fa-light fa-magnifying-glass"></i></span>
                        <input type="search" placeholder="Search brands">
                    </form>
                    <div class="product-brands">
                        <div class="brand-group">
                            <select name="brand_id" class="form-control">
                                <option value="">Select a brand</option>
                                @foreach ($brands as $brands)
                                <option value="{{ $brands->id }}">
                                    {{ $brands->brand_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="border-top"></div>
            </div>
            <div class="panel mb-30">
                <div class="panel-header">
                    <h5>Category</h5>
                    <div class="btn-box d-flex gap-2">
                        <button class="btn btn-sm btn-icon btn-outline-primary"><i class="fa-light fa-arrows-rotate"></i></button>
                        <button class="btn btn-sm btn-icon btn-outline-primary panel-close"><i class="fa-light fa-angle-up"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="input-group-with-icon mb-20">
                        <span class="input-icon"><i class="fa-light fa-magnifying-glass"></i></span>
                        <input type="search" placeholder="Search category">
                    </form>
                    <div class="product-categories">
                        <div class="category">
                            <select name="category_id" class="form-control">
                                <option value="">Select a Category</option>
                                @foreach ($categories as $categories)
                                <option value="{{ $categories->id }}">
                                    {{ $categories->category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="subcategory">
                            <select name="subcategory_id" class="form-control">
                                <option value="">Select a Subcategory</option>
                                @foreach ($subcategories as $subcategories)
                                <option value="{{ $subcategories->id }}">
                                    {{ $subcategories->sub_category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="border-top"></div>
            </div>
            <div class="panel mb-30">
                <div class="panel-header">
                    <h5>Products Tags</h5>
                    <div class="btn-box d-flex gap-2">
                        <button class="btn btn-sm btn-icon btn-outline-primary"><i class="fa-light fa-arrows-rotate"></i></button>
                        <button class="btn btn-sm btn-icon btn-outline-primary panel-close"><i class="fa-light fa-angle-up"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="product-tag-area">
                        <div class="row g-3">
                            <div class="col-9">
                                <input type="text" class="input-flush" name="product_tag" id="productTags">
                            </div>

                        </div>
                        <span class="input-txt">Tag mới tạo:</span>
                        <div class="all-tags" id="allTags"></div>

                        <div class="tag-history">
                            <span class="choose-used-tag input-txt">Chọn tag có sẵn</span>
                            <div class="all-tags used-tags active">
                                <div class="item d-inline-block" data-value="mobile">mobile<span class="close-tag"><i class="fa-regular fa-xmark"></i></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <button class="btn btn-primary" type="submit">Create Products</button>
</form>

@endsection
