@extends('layouts.app')

@include('inc.header')

@section('title-block')Новость@endsection

@section('new')


<div class="container new">

<div class="newRight">
            <h2>{{ $new->header }}</h2>

            <div class="img-news">

                <ul id="image-gallery">
                    <li>
                        <a href="" data-lightbox="image-gallery" data-title="Image 1">
                            <img src="{{ asset ('storage/' . $new->picture) }}" alt="Image 1">
                        </a>
                    </li>
                    <!-- Добавь остальные изображения -->
                </ul>
            </div>

            <script>
                $(document).ready(function() {
                    $('#image-gallery a').lightbox({
                        fadeDuration: 500
                    });
                });
            </script>


           <div class="descripNews">
           <p>{{ $new->descrip}} </p>
            </div>
        </div>



        <div class="newLeft">
            <h2><span class="color">Свежие</span> новости
            </h2>
            @foreach ($freshNews as $item)
            <article class="new_block">
                <a href="{{route('new', $item->id)}}">
                <img src="{{ asset ('storage/' . $item->picture) }}" alt="тут фотка новостей"><br>
                </a>
                <h3>{{$item->header}}</h3>
                <div style="margin-top: 10px;">{{ $item->created_at->format('d.m.y') }}</div>

            </article>
            @endforeach



        </div>

    </div>

            </div>

@endsection

@include('inc.footer')
