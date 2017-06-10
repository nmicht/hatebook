@extends('layouts.app')

@section('content')

<div class="panel-heading">Dashboard</div>

<div class="panel-body">
<ul>
    <li>
        <a href="{{ route('posts.index') }}">Mis Putos Posts</a>
    </li>
    <li>
        <a href="{{ route('interactions') }}">Mis Emputamientos</a>
    </li>
</ul>
</div>

@endsection
