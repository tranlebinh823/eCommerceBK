<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SubCategory\StoreRequest;
use App\Http\Requests\Admin\SubCategory\UpdateRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function manage()
    {

        $subcategory = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('categories.category_name', 'subcategories.*')
            ->get();
        $category = DB::table('categories')->get();

        return view('admin.subcategories.manage', compact('subcategory', 'category'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        DB::table('subcategories')->insert($data);
        return redirect()->route('admin.subcategories.manage')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subcategory = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('categories.category_name as parent_category_name', 'subcategories.*')
            ->where('subcategories.id', '=', $id)
            ->first();
        if (!$subcategory) {
            return redirect()->route('admin.subcategories.index')->with('error', 'Không tìm thấy danh mục con');
        }

        return view('admin.subcategories.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subcategory = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('categories.category_name as parent_category_name', 'subcategories.*')
            ->where('subcategories.id', '=', $id)
            ->first();
        $category = DB::table('categories')->get();

        if (!$subcategory) {
            return redirect()->route('admin.subcategories.index')->with('error', 'Không tìm thấy danh mục con');
        }

        return view('admin.subcategories.edit', compact('subcategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->except('_token');

        $data['updated_at'] = new \DateTime();
        DB::table('subcategories')->where('id', $id)->update($data);
        return redirect()->route('admin.subcategories.manage')->with('success', 'Edit thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        DB::table('subcategories')->where('id', $id)->delete();
        return redirect()->route('admin.subcategories.manage')->with('success', 'Xóa thành công');
    }
}
