@extends('layout')

@section('content')
    <div class="media">
      <div class="media-left">
        <a href="#">
          <img class="media-object" src="..." alt="...">
        </a>
      </div>
      <div class="media-body">
        {{ $post->content }}
        <footer>
            Creado {{ $post->created_at }}
        </footer>
      </div>

    </div>
@stop
