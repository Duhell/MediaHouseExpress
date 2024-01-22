<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __invoke(?string $article_id = null){
        if($article_id == null){
            return view('SoonPages.SoonView');
        }else{
            return view('Article');
        }
    }
}
