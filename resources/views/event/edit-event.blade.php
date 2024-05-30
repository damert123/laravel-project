@extends('layouts.app')

@include('inc.header')

@section('title-block')Редактирование меропрития@endsection

@section('edit-event')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="news-added-block  container ">
    <form action="{{ route('admin.event.update-event', $event->id) }}" method="post" enctype="multipart/form-data">
    @csrf
        <h1 class='anim_items' style="margin-bottom: 10px;">Редактирование </h1>

        <div class="news-backgr" style="border: 3px solid #ffd437;">


            <div class="news-flex">
                <div class="news-added-img">
                    <p>Загрузить картинку</p>
                    <img id="preview-image" src="{{ $event->picture ? asset('storage/' . $event->picture) : '#' }}" alt="Preview Image" >
                    <label class="custom-file-upload" for="image_news">
                    <input type="file" name="picture" id="image_news" onchange="previewAvatar(event)" class="@error('picture') error-event @enderror">Добавить
                    </label>
                    <p id="file-name" style="margin-top: 10px;"></p>
                    @error('picture')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                </div>
                @error('date_start')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                @error('date_end')
                                <div class="error-message">{{$message}}</div>
                                @enderror

                <div class="event-date">
                    <div class="">
                        <p>Даты проведения С:</p>
                        <input type="date" value="{{ $event->date_start }}" name="date_start" class="@error('date_start') error-event @enderror">

                    </div>

                    <div class="">
                        <p>ДО:(необязательно) </p>
                        <input type="date" name="date_end" value="{{ $event->date_end }}" class="@error('date_end') error-event @enderror">

                    </div>
                </div>

                <div class="event-date">
                    <div>
                        <p>Время проведения С:</p>
                        <input type="time" name="time_start" value="{{old('time_start') ?? $event->time_start}}" class="@error('time_start') error-event @enderror">
                        @error('time_start')
                        <div class="error-message">{{$message}}</div>
                        @enderror

                    </div>

                    <div >
                        <p>ДО:</p>
                        <input type="time" name="time_end" value="{{old('time_end') ?? $event->time_end}}" class="@error('time_end') error-event @enderror">
                        @error('time_end')
                        <div class="error-message">{{$message}}</div>
                        @enderror

                    </div>
                </div>

            </div>


            <div class="news-block-about">

                <div class="news-added-logo">
                    <p>Заголовок мероприятия</p>
                    <input name="header" type="text" value="{{ $event->header }}" class="@error('header') error-event @enderror">
                    @error('header')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                </div>


                <div class="news-added-description">
                    <p>Описание мероприятия</p>
                    <textarea  name="descrip"  class="@error('descrip') error-event @enderror">{{ $event->descrip }}</textarea>
                    @error('descrip')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                </div>

                <div class="event-added-info">
                    <p>Организатор</p>
                    <input name="organizer" type="text" value="{{ $event->organizer }}" placeholder="Например: ТСПК" class="@error('organizer') error-event @enderror">
                    @error('organizer')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                </div>
                <div class="event-added-info">
                    <p>Место проведения</p>
                    <input name="location" type="text" value="{{ $event->location }}" placeholder="Адрес или Онлайн (ссылка)" class="@error('location') error-event @enderror">
                    @error('location')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                </div>
                <div class="event-added-info">
                    <p>Требовния</p>
                    <input name="require" type="text" value="{{ $event->require }}" placeholder="Например: 18+" class="@error('require') error-event @enderror">
                    @error('require')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                </div>
                <div class="btn-send-news">
                    <button type="submit">Сохранить</button>
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
