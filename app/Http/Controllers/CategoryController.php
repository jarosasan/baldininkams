<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return response()->json([
//            'name' => 'Abigail',
//            'state' => 'CA'
//        ]);
        return response()->json( $categories = Category::all());
//        return $categories = Category::with('childs')->get();
//        return view('admin.app',$data=[ 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::with('childs')->get();
        return view('admin.categories.categories',$data=[ 'categories' => $categories]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $parent = Category::find($request->parent_id);
        $level = isset($parent) ? $parent->level + 1 : 0;
        $name = ucfirst(strtolower($request->category_name));
        $category = Category::create([
            'parent_id' => $request->parent_id,
            'category_name' => $name,
            'level' => $level,
            ]);
        session() -> flash( 'success', 'Category created successfully' );
        return response()->json( $category);
//        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category ::findOrFail( $request->id);
        if ($category->childs()->count() > 0)
        {
            session() -> flash( 'failure', 'Cannot delete, there are adverts in this category' );
            return response('Category is failed', 404);
        } else {
            $category -> delete();
            session() -> flash( 'success', 'Category deleted successfully' );
            return response('Delete category', 200);
        }

//        return redirect()->back();

    }

}
