<?php

namespace App\Http\Controllers;
use App\Models\Article;

class ArticleController extends Controller
{
    public function __invoke(?string $article_id = null){
        if($article_id == null){
            $articles = Article::orderBy('created_at','desc')->get();
            return view('ArticleView')->with('data',$articles);
        }else{
            $article = Article::where('article_uuid',$article_id)->first();
            return view('Article')->with('data',$article);
        }
    }
}
