<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __invoke(?string $article_id = null){
        if($article_id == null){
            return view('ArticleView');
        }else{
            return view('Article');
        }
    }
}
