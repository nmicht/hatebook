@extends('layouts.app')

@section('content')
@if (session()->has('message'))
	{{ session()->get('message') }}
@endif

<div class="panel-heading">
    Todas mis pinches reacciones
    @if (Request::has('search'))
    	que dicen <strong>{{ Request::get('search') }}</strong>
    @endif
</div>

<div class="panel-body">
    <ul>
    @forelse ($interactions as $post)
        <li>
            <strong>{{ $post->pivot->reaction }}</strong>
            <small>
                <a href="{{ url('posts', $post->id) }}">
                    {{ $post->abstract }}
                </a>
            </small>
        </li>
    @empty
        <p>No he estado chingando a nadie.</p>
    @endforelse
    </ul>

    {{ $interactions->links() }}
</div>
@stop
