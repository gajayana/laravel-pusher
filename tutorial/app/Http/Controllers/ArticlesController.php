<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
// use Request;

class ArticlesController extends Controller
{
    public function index () {
        // $articles = Article::all();
        // $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        // $articles = Article::order_by('published_at', 'desc')->get();
        $articles = Article::latest('published_at')->published()->get(); // \app\Article.php -> scopePublished()
        return view('articles.index', compact('articles'));
    }
    
    public function show ($id) {
        $article = Article::findOrFail($id);
        
        // if (is_null($article)) {
        //     abort(404);   
        // }
        
        return view('articles.show', compact('article'));
        
    }
    
    public function create() {
        return view('articles.create');
    }
    
    public function store(ArticleRequest $request) { // Requests\CreateArticleRequest -> $ php artisan make:request CreateArticleRequest
        // $input = Request::all();
        // $input['published_at'] = Carbon::now();
        
        
        // $input = Request::get('title');
        // return $input;
        
        // Article::create($input);
        
        // Article::create(Request::all()); // check \app\Article.php -> setPublishedAtAttribute($date) for date
        Article::create($request->all());
        return redirect('articles');
    }
    
    public function edit($id) {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }
    
    public function update($id, ArticleRequest $request) {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }
}
