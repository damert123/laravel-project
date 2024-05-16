<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateNewsRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\News;

class CreateNewsController extends Controller
{
    public function save(CreateNewsRequest $req){


        if ($req->hasFile('picture')) {
            // Получаем файл из запроса
            $picture = $req->file('picture');
            
            // Сохраняем файл
            $path = $picture->store('picture', 'public');
            
          
        }

        $news = News::create([


            'header' => $req->input('header'),
            'members' => $req->input('members'),
            'picture' => $path,
            'descrip' => $req->input('descrip'),
       
            


        ]);

        

    

        // Проверяем, была ли успешно создана новость
        if ($news) {
            return redirect(route('admin.news.news-create'))->with('success', 'Новость успешно создана');
        } else {
            return redirect(route('admin.news.news-create'))->withErrors([
                'formError' => 'Произошла ошибка при создании новости'
            ]);
        }
    
   }

   
}
