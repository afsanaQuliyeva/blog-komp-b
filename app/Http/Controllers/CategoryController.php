<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
//        $validated = $request->validate([
//            'category_name' => 'required|unique:categories|max:255',
//            'slug' => 'required|max:255',
//        ]);
        $validated = $request->validated();
        $validated = Arr::add($validated, 'created_at', Carbon::now());
        Category::insert($validated);
        return Redirect::route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        //Select * from Category where id = $id
        //1 -> Laravel
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */

    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();
        //dd($validated);
        $validated = Arr::add($validated, 'updated_at', Carbon::now());
        $success = Category::findOrFail($id)->update($validated);
        if($success) {
            return Redirect::route('categories.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $success = Category::onlyTrashed()->findOrFail($id)->forceDelete();
        if($success) {
            return Redirect::route('categories.trash');
        }
    }

    public function delete($id) {
        $success = Category::findOrFail($id)->delete();
        if($success) {
            return Redirect::route('categories.index');
        }
    }

    public function showTrash() {
        $categories = Category::onlyTrashed()->latest()->get();
        return view('admin.categories.trash', compact('categories'));
    }

    public function restore($id) {
        $success = Category::onlyTrashed()->findOrFail($id)->restore();
        if($success) {
            return Redirect::route('categories.index');
        }
    }
}
