<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
interface ArticleRepositoryInterface 
{
    public function getAllArticles();
    public function getArticleById($articleId);
    public function deleteArticleById($articleId);
    public function createArticle(array $article) ;
    public function storeFile(Request $request) ;
    public function updateArticle($articleId, array $article);
    public function getFulfilledArticles();
}