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
        $data['items'] = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('subcategories.*', 'categories.*')
            ->get();
        return view('admin.subcategories.manage', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['items'] = DB::table('categories')->get();
        return view('admin.subcategories.create',$data);
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
    public function show(string $id)
    {
        $data['items'] = DB::table('subcategories')
            ->where('id', $id)
            ->first();
        return view('admin.subcategories.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpdateRequest $id)
    {
        $data['items_cat'] = DB::table('categories')->get();

        $data['items'] = DB::table('subcategories')
            ->where('id', $id)
            ->first();

        return view('admin.subcategories.edit', $data);
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
