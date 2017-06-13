@extends('layouts.app')

@section('content')
<div class="panel-heading">Pinches escribe un post</div>
<div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content" class="col-md-4 control-label">Post</label>
            <div class="col-md-6">
                <textarea id="content" class="form-control" name="content" autofocus>
                     {{ old('content') }}
                </textarea>
                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="image" class="col-md-4 control-label">Imagen</label>
            <div class="col-md-6">
                <input id="image" type="file" class="form-control" name="image" autofocus>
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Hatear
                </button>
            </div>
        </div>
    </form>
</div>
@stop
