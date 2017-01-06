@extends('layouts.app')

@section('content')
    <h1 class="padbot80"><strong>Report</strong> a <span class="golden">Malfunction</span></h1>
    
    <form action = "{{action('MalfunctionEntriesController@store')}}" enctype="multipart/form-data" method = "POST" class="form-horizontal">
        {{csrf_field()}}
        <div class = "form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for = "title" class = "control-label col-sm-2">Title</label>
            <div class="col-sm-10">
                <input type = "text" id="title" name = "title" value = "{{ old("title") }}" class = "form-control" required autofocus >
                @if ($errors->has('title'))
                    <span class = "help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class = "form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for = "description" class="control-label col-sm-2">Description</label>
            <div class="col-sm-10">
                <textarea id="description" name = "description" class = "form-control" required autofocus rows = "4">{{ old("description") }}</textarea>
                @if ($errors->has('description'))
                    <span class = "help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class = "form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            <label for = "image" class="control-label col-sm-2">Image</label>
            <div class="col-sm-10">
                <input type = "file" id="image" name = "image">
                @if ($errors->has('image'))
                    <span class = "help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class = "form-group">
            <div class="col-sm-12">
                <input type = "submit" class = "btn btn-link pull-right" value = "Report malfunction">
            </div>
        </div>
    </form>
@endsection