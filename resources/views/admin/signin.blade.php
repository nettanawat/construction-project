@extends('master-notlogin')

@section('content')

    <div class="container">

        @if (count($errors) > 0)
            <div style="margin-top: 20px;" class="red lighten-5 red-text">
                <strong>Whoops! </strong> There were some problems with your input. <br> <br>
                <ul>

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="text-center">
            <h3>ADMINISTRATOR SECTION</h3>
        </div>
        <form class="col s6 center" role="form" action="/login" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="input-field col 12">
                <input id="email" type="email" class="validate" name="email">
                <label for="email">EMAIL</label>
            </div>
            <div class="input-field col 12">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">PASSWORD</label>
            </div>
            <div class="input-field col 12">
                <input type="submit" class="right btn red lighten-1" name="loginBtn" value="LOGIN">
            </div>
        </form>
    </div>

@endsection