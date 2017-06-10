@extends('layouts.app')

@section('content')
@if (session()->has('message')):
	{{ session()->get('message') }}
@endif

<div class="panel-heading">Todos tus pinches posts</div>
<div class="panel-body">
    <ul>
    @forelse ($posts as $post)
        <li>
            <a href="{{ url('posts', $post->id) }}">
                {{ $post->abstract }}
            </a>
            <small>{{ $post->created_at }}</small>
        </li>
    @empty
        <p>No has pinche hecho ningún post, culero.</p>
    @endforelse
    </ul>
</div>
@stop
