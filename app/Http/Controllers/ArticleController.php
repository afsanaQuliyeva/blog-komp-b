<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $articles = Article::all('id', 'title', 'desc', 'image');
        //$articles = Article::simplePaginate(5);
        $articles = Article::latest()->paginate(Article::PAGE_COUNT);
        //latest() -> orderBy('created_at', 'desc');
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all('id', 'category_name');
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            /*Yeni sekil adi*/
            $imageName = 'img_'.time();  /*img_554545454*/
            $imageExt = strtolower($request->file('image')->getClientOriginalExtension()); //png
            $newImageName = $imageName.".".$imageExt;
            /*img_554545454.png*/
            $request->image->move('uploads/', $newImageName);
            $validated['image'] = $newImageName;
        }

        $validated = Arr::add($validated, 'desc', $request->desc);
        $validated = Arr::add($validated, 'content', $request->content);

        $article = Article::create(Arr::except($validated, 'categories'));
        $article->getCategories()->attach($validated['categories']);

    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Response
     */


    public function edit($id)
    {
        $categories = Category::all('id', 'category_name');
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $imageName = 'img_'.time();
            $imageExt = strtolower($request->file('image')->getClientOriginalExtension()); //png
            $newImageName = $imageName.".".$imageExt;
            $request->image->move('uploads/', $newImageName);
            $validated['image'] = $newImageName;
            $oldImage = $request->input('old_image');
            unlink('uploads/'.$oldImage);
        }

        $validated = Arr::add($validated, 'desc', $request->desc);
        $validated = Arr::add($validated, 'content', $request->content);

        //8
        $article = Article::findOrFail($id); //object
        $article->update(Arr::except($validated, 'categories')); //true or false
        $article->getCategories()->sync($validated['categories']); //object->getCategories
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
