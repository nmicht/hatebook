@extends('layouts.app')

@section('content')
<div class="panel-heading">Todos tus pinches posts</div>
<div class="panel-body">
    <ul>
    @forelse ($posts as $post)
        <li>{{ $post->content }}</li>
    @empty
        <p>No has pinche hecho ningún post, culero.</p>
    @endforelse
    </ul>
</div>
@stop
