<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('auth');

    }

    public function index()
    {
        $arts = Article::orderBy('id','DESC')->get();
        return view('article.index',compact('arts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id');


        return view("article.create",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->categories);
        $user = Auth::user();
        $request->validate([
            'title'=>'max:50|required',
            'content'=>'min:20|required',
            'categories'=>'required'

        ]);
        $categories = array_values($request->categories);
        $article =$user->posts()->create($request->except('categories'));

            $article->categories()->attach($categories);

        return redirect()->to("/home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        if(Auth::id() != $article->user_id){

            return abort(401);

        }

        $categories = Category::pluck('title','id');
        $artCat= $article->categories()->pluck('id')->toArray();

        return view('article.edit',compact('categories','article','artCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if(Auth::id() != $article->user_id){

            $request->validate([
                'title'=>'max:50|required',
                'content'=>'min:20|required',
                'categories'=>'required'

            ]);
            return abort(401);

        }

        $article->update($request->all());
        $article->categories()->sync($request->categories);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(Auth::id() != $article->user_id){

            return abort(401);

        }

        $article->delete();
        return redirect()->back();
    }
}
