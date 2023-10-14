<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreRequest;
use App\Http\Requests\Admin\Brand\UpdateRequest;

use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function manage()
    {
        $brands = DB::table('brands')->get();
        return view('admin.brands.manage', ['brands' => $brands]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $logo = $request->logo;
        $image = time() . "-" . $logo->getClientOriginalName();
        $path = public_path() . "/upload";
        $logo->move($path, $image);
        $data['logo'] = $image;
        $data['created_at'] = now();
        DB::table('brands')->insert($data);
        return redirect()->route('admin.brands.manage')->with('success', 'Thương hiệu đã được tạo thành công');
    }

    public function show($id)
    {
        $brand = DB::table('brands')->find($id);
        return view('admin.brands.show', ['brand' => $brand]);
    }

    public function edit($id)
    {
        $brand = DB::table('brands')->find($id);
        if (!$brand) {
            return redirect()->route('admin.brands.manage')->with('error', 'Không tìm thấy thương hiệu!');
        }
        return view('admin.brands.edit', ['brand' => $brand]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');

        if (empty($data['logo'])) {
            $da['logo'] = DB::table('brands')->where('id', $id)->first();
            $data['logo'] = $da['logo']->logo;
        } else {
            $logo = $request->logo;
            $image = time() . "-" . $logo->getClientOriginalName();
            $path = public_path() . "/upload";
            $logo->move($path, $image);
            $data['logo'] = $image;
        }


        $data['updated_at'] = now();
        DB::table('brands')->where('id', $id)->update($data);
        return redirect()->route('admin.brands.manage')->with('success', 'Thương hiệu đã được cập nhật thành công');
    }

    public function destroy($id)
    {
        $brand = DB::table('brands')->find($id);
        if (!$brand) {
            return redirect()->route('admin.brands.manage')->with('error', 'Không tìm thấy thương hiệu!');
        }

        // Kiểm tra xem có sản phẩm nào thuộc thương hiệu này không
        $productCount = DB::table('products')->where('brand_id', $id)->count();
        if ($productCount > 0) {
            return redirect()->route('admin.brands.manage')->with('error', 'Không thể xóa thương hiệu này vì có sản phẩm liên quan.');
        }

        DB::table('brands')->where('id', $id)->delete();
        return redirect()->route('admin.brands.manage')->with('success', 'Thương hiệu đã được xóa thành công');
    }
}
