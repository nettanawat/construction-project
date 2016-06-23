<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
{{--    <title>@yield('title')</title>--}}
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{!! asset('css/materialize/css/materialize.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('css/lightbox.css') !!}" rel="stylesheet" type="text/css">
    <title>สำนักงานก่อสร้างชลประทานที่ ๒</title>


</head>
<body>
{{--<div class="container" style="background-color: #bce8f1">--}}
    <div class="row">
        <img class="col s2" src="{!! asset('images/logo_water.jpg') !!}" style="max-width: 180px">
        <div class="col s10 titlehead text-center ">
            <p class="col s12" style="color: #730073; font-size: 25px;">ฝ่ายก่อสร้างที่ ๒ สำนักงานก่อสร้างชลประทานที่ ๒</p>
            <h2 class="col s12" style="color: #730073; font-size: 30px; margin-top: -10px"><strong>กองพัฒนาแหล่งน้ำขนาดกลาง กรมชลประทาน</strong></h2>
            <h1 class="col s12" style="color: #730073; font-size: 60px; margin-top: -10px"><strong>กระทรวงเกษตรและสหกรณ์</strong></h1>
        </div>
    </div>
{{--</div>--}}

@include('menu')
<div class="container">
    @yield('content')
</div>
<div style="height: 4em">

</div>
<footer style="position: fixed; bottom: 0px; width: 100%" class="blue lighten-2">
    <div class="container">
            <div class="col l6 s12">
                <p class="center grey-text text-lighten-1">Copyright © CS Development Team 2016 All rights reserved</p>
            </div>
    </div>
</footer>
<script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('css/materialize/js/materialize.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/lightbox-2.6.min.js') !!}"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
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
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
</script>
<script>
    var myCenter=new google.maps.LatLng(17.6024091,98.9545819);
    var marker;
    //18.7736041,99.9008876
    function initialize()
    {
        var mapProp = {
            center:myCenter,
            zoom:13,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker=new google.maps.Marker({
            position:myCenter,
            animation:google.maps.Animation.BOUNCE,
            icon: "{!! asset('images/pin.png') !!}"
        });

        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);


</script>
</body>
</html>