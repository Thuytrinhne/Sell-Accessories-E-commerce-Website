<?php

namespace App\Models\Respositories;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;


class CategoryRespository 
{
    /**
     * Display a listing of the resource.
     */
    public static function indexPaginate()
    {
        
        $category = category::leftjoin('category as ct', 'category.parent_id', '=', 'ct.id')
        ->select('category.id','category.name_category', 'ct.name_category as parent_id')
        ->paginate(5);
        return $category;
    }
    public static function index()
    {
        $category = category::leftjoin('category as ct', 'category.parent_id', '=', 'ct.id')
        ->select('category.id','category.name_category', 'ct.name_category as parent_id')
        ->get();
        return $category;
    }

    /**
     * Store a newly created resource in storage.
     */
    public static function store(CategoryRequest $request)
    {
       $category = new Category;
       $category->name_category=$request->input('name_category');
       
       if (!($request->input('parent_id')==='NULL'))
        {
            $category->parent_id=$request->input('parent_id');
        }
        $category->save();
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
        $category = category::find($id);
        $category->delete();
    }

    public static function search(Request $request)
    {
        $search = $request->input('search');

        $category = category::leftjoin('category as ct', 'category.parent_id', '=', 'ct.id')
        ->select('category.id','category.name_category', 'ct.name_category as parent_id')
        ->where('category.name_category','like','%' . $search . '%')
        ->paginate(5);

        return $category;
    }

}
