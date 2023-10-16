<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function index()
    {
        $products = DB::table('products')
            ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'subcategories.sub_category_name', 'categories.category_name', 'brands.brand_name')
            ->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {

        $categories = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')->get();
        $brands = DB::table('brands')->get();
        return view('admin.products.create', compact('subcategories', 'categories', 'brands'));
    }
    public function getSubcategories(Request $request)
    {
        $category_id = $request->input('category_id');

        // Truy vấn danh sách subcategory dựa trên category_id
        $subcategories = DB::table('subcategories')
            ->where('category_id', $category_id)
            ->pluck('sub_category_name', 'id');

        return response()->json(['subcategories' => $subcategories]);
    }

    public function store(StoreRequest $request)
    {

        $data = $request->except('_token');

        // Xử lý cho 1 hình ảnh images
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $image = time() . "-" . $file->getClientOriginalName();
            $path = public_path() . "/upload";
            $file->move($path, $image);
            $data['images'] = $image;
        }

        // Xử lý tải lên nhiều hình ảnh cho 'images_gallery'
        $images = [];
        if ($request->hasFile('images_gallery')) {
            foreach ($request->file('images_gallery') as $image) {
                $fileName = time() . "-" . $image->getClientOriginalName();
                $path = public_path() . "/upload"; // Đường dẫn đến thư mục public/upload
                $image->move($path, $fileName);
                $images[] = $fileName;
            }
            $data['images_gallery'] = implode(',', $images);
        }

        $data['created_at'] = now();

        // Lưu sản phẩm vào cơ sở dữ liệu
        DB::table('products')->insert($data);

        return redirect()->route('admin.products.index')->with('success', 'Tạo sản phẩm thành công');
    }

    public function show($id)
    {
        $product = DB::table('products')
            ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'subcategories.sub_category_name', 'categories.category_name', 'brands.brand_name')
            ->where('products.id', '=', $id)
            ->first();

        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Không tìm thấy sản phẩm');
        }

        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = DB::table('products')
            ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'subcategories.subcategory_name', 'categories.category_name', 'brands.brand_name')
            ->where('products.id', '=', $id)
            ->first();

        $subcategories = DB::table('subcategories')->get();

        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Không tìm thấy sản phẩm');
        }

        return view('admin.products.edit', compact('product', 'subcategories'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method');


        //upload
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $imageName = time() . "-" . $file->getClientOriginalName();
            $path = public_path() . "/upload";
            $file->move($path, $imageName);

            // Lưu đường dẫn tương đối vào cơ sở dữ liệu
            $data['images'] = "/upload/" . $imageName;
        }


        // Xử lý tải lên nhiều hình ảnh cho 'images_gallery'
        $images = [];
        if ($request->hasFile('images_gallery')) {
            foreach ($request->file('images_gallery') as $image) {
                $fileName = time() . "-" . $image->getClientOriginalName();
                $image->move(public_path('assets'), $fileName);
                $images[] = $fileName;
            }
            $data['images_gallery'] = implode(',', $images);
        }
        $data['images'] = json_encode($images);

        // Cập nhật sản phẩm
        DB::table('products')->where('id', $id)->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy($id)
    {
        $product = DB::table('products')->find($id);

        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Không tìm thấy sản phẩm');
        }

        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
