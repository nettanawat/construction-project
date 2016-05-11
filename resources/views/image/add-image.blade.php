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
        <form class="col s12" action="/admin/add-image" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s6">
                    <h4>Add image</h4>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>IMAGE</span>
                        <input type="file" name="images[]" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more images">
                    </div>
                </div>
                <div class="input-field col s6">
                    <input id="date_of_birth" type="text" class="datepicker" name="date">
                    <label for="date_of_birth" data-error="wrong">Date</label>
                </div>
                <div class="input-field col s6">
                    <p>
                        <input name="project" type="radio" value="1" id="test1"/>
                        <label for="test1">Mae Rim Project</label>
                    </p>
                    <p>
                        <input name="project" type="radio" value="2" id="test2" />
                        <label for="test2">Mae On Project</label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <a class="waves-effect waves-light btn red lighten-2" href="/admin/images">Back</a>
                    <input type="submit" class="waves-effect waves-light btn" value="Add New Images">
                </div>
            </div>
        </form>
    </div>
@endsection