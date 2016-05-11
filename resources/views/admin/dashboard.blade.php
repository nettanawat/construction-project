@extends('master-admin')


@section('content')


    <div class="row">
        <div class="col s6">
            <div class="card">
                <div class="card-image">
                    <h2 class="red-text text-lighten-1">Mae On Project</h2>
                </div>
                <div class="card-content">
                    <p> {{count($images)}} images in this project</p>
                    <p> {{count($videos)}} videos in this project</p>
                </div>
                <div class="card-action">
                    <a href="/admin/images">Manage image</a>
                    <a href="/admin/videos">Manage video</a>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-image">
                    <h2 class="red-text text-lighten-1">Mae Rim Project</h2>
                </div>
                <div class="card-content">
                    <p> {{count($images)}} images in this project</p>
                    <p> {{count($videos)}} videos in this project</p>
                </div>
                <div class="card-action">
                    <a href="/admin/images">Manage image</a>
                    <a href="/admin/videos">Manage video</a>
                </div>
            </div>
        </div>
    </div>

@endsection