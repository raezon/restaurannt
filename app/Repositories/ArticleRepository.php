<?php

namespace App\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleRepository implements ArticleRepositoryInterface 
{
    public function getAllArticles() 
    {
      
    }

    public function getArticleById($articleId) 
    {
        return Article::findOrFail($articleId);
    }

    public function deleteArticleById($articleId) 
    {
      
        Article::destroy($articleId);
    }

    public function storeFile(Request $request) 
    {
    
        if($request->hasFile('photo')) {
               
            $name = time()."_".$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images'), $name);
            return $name;
        }
        
        return '';

    }

    public function createArticle(array $article) 
    {
    
        return Article::create($article);

    }

    public function updateArticle($articleId, array $article) 
    {
        return Article::whereId($articleId)->update($article);
    }

    public function getFulfilledArticles() 
    {
        return Article::where('is_fulfilled', true);
    }
}