<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function manage()
    {
        $data['items'] = DB::table('categories')->get();
        return view('admin.categories.manage', $data);
    }


    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        DB::table('categories')->insert($data);
        return redirect()->route('admin.categories.manage');
    }
    public function show($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.categories.show', ['category' => $category]);
    }


    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        if (!$category) {
            return redirect()->route('admin.categories.manage')->with('error', 'Category not found!');
        }
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        DB::table('categories')->where('id', $id)->update($data);
        return redirect()->route('admin.categories.manage')->with('success', 'Tạo thành công');
    }

    public function destroy($id)
    {
        $category = DB::table('categories')->find($id);
        if (!$category) {
            return redirect()->route('admin.categories.manage')->with('error', 'Không tìm thấy danh mục');
        }
        // Kiểm tra xem danh mục có khóa ngoại tới subcategory không
        $subcategoryCount = DB::table('subcategories')->where('category_id', $id)->count();
        if ($subcategoryCount > 0) {
            return redirect()->route('admin.categories.manage')->with('error', 'Không thể xóa danh mục này vì có subcategory liên quan.');
        }
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('admin.categories.manage')->with('success', 'Xóa danh mục thành công');
    }
}
