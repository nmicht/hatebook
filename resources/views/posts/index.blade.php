@extends('layout')

@section('content')
    <h2>Todos tus pinches Posts</h2>

    <ul>
    @forelse ($posts as $post)
        <li>{{ $post->content }}</li>
    @empty
        <p>No has pinche hecho ningún post, culero.</p>
    @endforelse
    </ul>
@stop
