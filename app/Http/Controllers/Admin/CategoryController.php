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
        $data['items'] = DB::table('categories')
        ->leftJoin('subcategories', 'categories.id', '=', 'subcategories.category_id')
        ->select('categories.id', 'categories.category_name', 'subcategories.sub_category_name', 'subcategories.slug')
        ->get();


        return view('admin.categories.manage', $data);
    }


    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        DB::table('categories')->insert($data);
        return redirect()->route('admin.categories.manage');
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
        DB::table('categories')->where('id', $id)->update($request->validated());

        return redirect()->route('admin.categories.manage')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();

        return redirect()->route('admin.categories.manage')->with('success', 'Category deleted successfully!');
    }
}
