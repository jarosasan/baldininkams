<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CategoryRepository;
use App\Models\Category;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Http\Request;
use Debugbar;

class CategoryController extends BaseController
{
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Repositories\CategoryRepository
     *
     * @return \App\Http\Resources\CategoryCollection
     */
    public function index()
    {
        return new CategoryCollection($this->categoryRepository->getAllForList());
//        return response()->json( $categories = Category::all());
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
        return view('admin.categories.categories', $data = ['categories' => $categories]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $data = $request->input();
        $category= (new Category())->create($data);
//        return new CategoryResource($category);

//            return (new CategoryCollection($this->categoryRepository->getAllForList()))
//                ->response()
//                ->setStatusCode(201);

        return (new CategoryCollection());


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\City $city
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateCategory $request)
    {
        $category = Category::findOrFail($id);
        $validated = $request->validated();
        $parent = Category::find($validated['parent_id']);
        $level = $parent ? $parent->level + 1 : 0;
        $category->update(['category_name' => $validated['category_name'], 'parent_id' => $validated['parent_id'], 'level' => $level]);
        $category = Category::findOrFail($id);
        return new CategoryResource($category);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $id
     *
     */
    public function getCategory(Request $request)
    {
        return new CategoryResource(Category::find($request->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);
        if ($category->children()->count() > 0) {
            session()->flash('failure', 'Cannot delete, there are adverts in this category');
            return response('Category is failed', 404);
        } else {
            $category->delete();
            session()->flash('success', 'Category deleted successfully');
            return response('Delete category', 200);
        }
    }

}
