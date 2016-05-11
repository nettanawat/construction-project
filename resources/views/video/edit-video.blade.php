@extends('master-admin')


@section('content')

    @if (count($errors) > 0)
        <div style="margin-top: 20px;" class="red lighten-5 red-text">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <form class="col s12" enctype="multipart/form-data" action="/admin/edit-video/{{ $video->id }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="input-field col s6">
                    <h4>Add video</h4>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="path" type="text" class="validate" name="path" value="{{ $video->url }}">
                    <label for="path">SOURCE</label>
                </div>
                <div class="input-field col s6">
                    <input id="name" type="text" class="validate" name="name" value="{{ $video->name }}">
                    <label for="name">NAME</label>
                </div>
                <div class="input-field col s6">
                    <input id="date" type="text" class="datepicker" name="date">
                    <label for="date" data-error="wrong">DATE</label>
                </div>
                <div class="input-field col s6">
                    <p>
                        <input name="project" type="radio" value="1" id="test1"/>
                        <label for="test1">MAE PRIK PROJECT</label>
                    </p>
                    <p>
                        <input name="project" type="radio" value="2" id="test2" />
                        <label for="test2">MAE ON PROJECT</label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <a class="waves-effect waves-light btn red lighten-2" href="/admin/videos">Back</a>
                    <input type="submit" class="waves-effect waves-light btn" value="Update Video">
                </div>
            </div>
        </form>
    </div>


@endsection