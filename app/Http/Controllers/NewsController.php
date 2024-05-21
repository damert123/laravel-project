<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class NewsController extends Controller
{
    public function show()
   {
       // Получаем все новости из базы данных

       $newsQuery = News::query()->latest();

       $news = $newsQuery->paginate(6);

       $user = auth()->user();

       // Передаем данные пользователей в представление
       return view('news', compact('news', 'user'));
   }

   public function open($id)
{
    $new = News::findOrFail($id);

    $freshNews = News::latest()->where('id', '!=', $id)->take(3)->get();

    return view('new', compact('new', 'freshNews'));
}


    public function showSettings()
    {

        $news = News::latest()->get();

        return view('news.settings-news', compact('news'));
}

    public function editNews(Request $request, $id)
    {

        $new = News::findOrFail($id);

        return view('news.edit-news', compact('new'));

}

    public function deleteNews(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news.settings-news')->with('success', 'Новость успешно удалена');
}

    public function updateNews(UpdateNewsRequest $request, $id)
    {

        $validatedData = $request->validated();

        $news = News::findOrFail($id);

        $news->update($validatedData);


        if($request->hasfile('picture')){
            $picture = $request->file('picture');

            $path = $picture->store('picture', 'public');

            $news->update(['picture' => $path]);
        }

        return redirect()->route('admin.news.edit-news', $id)->with('success', 'Новость успешно обновлена');


    }


}
