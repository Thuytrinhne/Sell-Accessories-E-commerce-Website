<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Service\CategoryService;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index(Request $request)
    {
        return CategoryService::index($request);
      
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public static function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public static function store(CategoryRequest $request)
    {
       return CategoryService::store($request); 
    }
   
  

    /**
     * Display the specified resource.
     */
    public static function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public static function edit(category $category)
    {
        
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public static function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function destroy($id)
    {
        return CategoryService::destroy($id);
    }
}
