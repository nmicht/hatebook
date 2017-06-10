@extends('layouts.app')

@section('content')
<div class="panel-heading">Tu pinche post</div>
<div class="panel-body">
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="..." alt="...">
            </a>
        </div>
        <div class="media-body">
            {{ $post->content }}
            <div class="media-footer">
                Publicado {{ $post->created_at }}
            </div>
        </div>
        @if (Auth::user()->id == $post->user_id)
        <div class="">
            <form method="POST" action="{{ route('posts.destroy',$post->id) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit" name="button">ALV</button>
            </form>
        </div>
        @endif
    </div>
</div>
@stop
