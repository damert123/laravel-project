<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    public function show()
   {
       // Получаем все новости из базы данных
       
       $news = News::latest()->get();
       
       // Передаем данные новостей в представление
       return view('news', compact('news'));
   }

   public function open($id)
{
    $new = News::findOrFail($id);

    $freshNews = News::latest()->where('id', '!=', $id)->take(3)->get();

    return view('new', compact('new', 'freshNews'));
}
}
