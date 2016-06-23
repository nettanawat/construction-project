<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    {{--    <title>@yield('title')</title>--}}
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{!! asset('css/materialize/css/materialize.min.css') !!}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('css/materialize/js/materialize.js') !!}"></script>

</head>
<body>

@include('menu-admin')
<div class="container">
    @yield('content')
</div>

<div style="height: 4em">

</div>
<footer style="position: fixed; bottom: 0px; width: 100%" class="red darken-2">
    <div class="container">
        <div class="col l6 s12">
            <p class="center grey-text text-lighten-1">Copyright © CS DEVELOPMENT TEAM 2016 All rights reserved</p>
        </div>
    </div>
</footer>
<script>
    $(document).ready(function () {
        $('.collapsible').collapsible({
            accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
    });

    $(document).ready(function () {
        $('ul.tabs').tabs();
    });


    $(document).ready(function () {
        $('select').material_select();
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 5,
        formatSubmit: 'Y-m-d',
        max: +7
    });

</script>
</body>
</html>