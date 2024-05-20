@extends('layouts.app')

@include('inc.header')

@section('title-block')Добавление новости@endsection

@section('news-create')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="news-added-block  container ">
        <form action="{{route('admin.news.update-news', $new->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class='anim_items' style="margin-bottom: 10px;">Редактирование</h1>

            <div class="news-backgr">


                <div class="news-flex">
                    <div class="news-added-img">
                        <p>Загрузить картинку</p>
                        <img id="preview-image" src="{{asset('storage/' . $new->picture)}}" alt="Preview Image" >
                        <label class="custom-file-upload" for="image_news">
                            <input type="file" name="picture" id="image_news" onchange="previewAvatar(event)">Добавить
                        </label>
                        <p id="file-name" style="margin-top: 10px;"></p>
                    </div>

                </div>


                <div class="news-block-about">

                    <div class="news-added-logo" style="margin-top: 20px">
                        <p>Заголовок новости</p>
                        <input name="header" type="text" value="{{$new->header}}" class="@error('header') error-event @enderror">
                        @error('header')
                        <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="news-added-description">
                        <p>Описание новости</p>
                        <textarea name="descrip" class="@error('descrip') error-event @enderror" >{{$new->descrip}}"</textarea>
                        @error('descrip')
                        <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="news-added-info">
                        <p style="margin: 0">Участвовало волонтеров</p>
                        <input name="members" type="number" value="{{$new->members}}" class="@error('members') error-event @enderror" >
                        @error('members')
                        <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="btn-send-news" style="margin-bottom: 20px">
                        <button type="submit">Сохранить изменения</button>
                    </div>
                </div>



            </div>
        </form>
    </div>

    <script>
        // Перепишем функцию previewAvatar, чтобы она использовала идентификатор avatar
        function previewAvatar(event) {
            const input = document.getElementById('image_news');
            const preview = document.getElementById('preview-image');
            const file = input.files[0];

            const reader = new FileReader();
            reader.onload = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
            }
        }


    </script>
    <script>
        // Находим все textarea на странице
        const textareas = document.querySelectorAll('textarea');

        // Для каждого textarea
        textareas.forEach((textarea) => {
            // Устанавливаем начальную высоту на основе контента и высоту min-height
            textarea.style.height = textarea.scrollHeight + 'px';

            // Добавляем обработчик события input
            textarea.addEventListener('input', function () {
                // Устанавливаем высоту textarea равной его прокрутке (scrollHeight),
                // чтобы она автоматически увеличивалась по мере добавления текста
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        });
    </script>


@endsection
@include('inc.footer')


