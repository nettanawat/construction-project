
<nav>
    <div class="nav-wrapper blue lighten-2">
        {{--<a class="brand-logo center">CS THAI GROUP</a>--}}
        <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-button" href="/project/maeon" data-activates="dropdown2">โครงการอ่างเก็บน้ำแม่อ้อน<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="/project/maeprik" data-activates="dropdown1">โครงการอ่างเก็บน้ำแม่พริก<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        <ul class="left hide-on-med-and-down">
            <li><a href="/">กลับสู่หน้าแรก</a></li>
        </ul>
    </div>
</nav>

<ul id="dropdown1" class="dropdown-content">
    <li><a href="/project/maeprik">ABOUT</a></li>
    <li><a href="/project/maeprik/images/all">IMAGES</a></li>
    <li><a href="/project/maeprik/videos/all">VIDEOS</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
    <li><a href="/project/maeon">ABOUT</a></li>
    <li><a href="/project/maeon/images/all">IMAGES</a></li>
    <li><a href="/project/maeon/videos/all">VIDEOS</a></li>
</ul>

<script>
    $('.dropdown-button').dropdown({
                constrain_width: true, // Does not change width of dropdown to that of the activator
                hover: true, // Activate on hover
                gutter: 0, // Spacing from edge
                belowOrigin: true, // Displays dropdown below the button
                alignment: 'left' // Displays dropdown with edge aligned to the left of button

            }
    );

</script>