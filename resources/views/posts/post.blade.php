@extends('layouts.app')

@section('content')
<div class="panel-heading">Tu pinche post</div>
<div class="panel-body">
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="{{ Storage::url('images/'.$post->thumb) }}" alt="{{$post->abstract}}">
            </a>
        </div>
        <div class="media-body">
            {{ $post->content }}
            <div class="media-footer">
                Publicado {{ $post->created_at }}
            </div>
        </div>
        @can('delete-post', $post)
        <div class="">
            <form method="POST" action="{{ route('posts.destroy',$post->id) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger btn-sm" type="submit" name="button">Mandar ALV</button>
            </form>
        </div>
        @endcan
    </div>
</div>
@stop
