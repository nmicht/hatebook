@extends('layouts.app')

@section('content')
<div class="panel-heading">
    Todos tus pinches posts
    @if (Request::has('search'))
    	que dicen <strong>{{ Request::get('search') }}</strong>
    @endif
</div>

<div class="panel-body">
    <form class="form-horizontal" role="form" method="GET" action="{{ route('posts.index') }}">
        <div class="form-group">
            <label for="search" class="col-md-4 control-label">Qué pinches buscas?</label>
            <div class="col-md-6">
                <input id="search" type="search" class="form-control" name="search" value="{{ old('search') }}" required autofocus>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
            </div>
        </div>
    </form>
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

    {{ $posts->appends(['search' => Request::get('search')])->links() }}
</div>
@stop
