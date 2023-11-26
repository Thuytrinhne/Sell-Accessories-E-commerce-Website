<?php

namespace App\Service;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Respositories\CategoryRespository;
use App\Http\Requests\CategoryRequest;
class CategoryService 
{
    /**
     * Display a listing of the resource.
     */
    public static function index(Request $request)
    {
        
        $categoryPaginate = CategoryRespository::indexPaginate();
        $category = CategoryRespository::index();
        $old = $request->old('name_category');
        $response = response ()
        ->view('admin.category', compact('categoryPaginate', 'category', 'old'), 200);
        return $response;
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
        //xử lý thêm 1 danh mục

  
    /**
     * Store a newly created resource in storage.
     */
    public static  function store(CategoryRequest $request)
    {
        CategoryRespository::store($request);
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function destroy($id)
    {
        try
        {
             CategoryRespository::destroy($id);
        }catch (\Exception  $exception) {
            return back()->withError('Category có ID = ' . $id . ' đã thuộc về 1 danh mục khác')->withInput();
        };
        
        return redirect()->back()->with('DestroySuccess', 'Xóa thành công');
    }
}
