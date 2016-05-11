@extends('master-notlogin')

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

    <div class="row col s12">
        <form class="col s6 offset-s3" enctype="multipart/form-data" action="/reg" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" class="validate" name="name">
                    <label for="name">NAME</label>
                </div>
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate" name="email">
                    <label for="email">EMAIL</label>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">PASSWORD</label>
                </div>
                <div class="input-field col s12">
                    <input id="password_confirmation" type="password" class="validate" name="password_confirmation">
                    <label for="password_confirmation">CONFIRM PASSWORD</label>
                </div>
                <div class="input-field col s12">
                    <input id="register_code" type="password" class="validate" name="register_code">
                    <label for="register_code">REGISTER CODE</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="submit" class="waves-effect waves-light btn red lighten-2 right" value="REGISTER">
                </div>
            </div>
        </form>
    </div>

@endsection