
<nav>
    <div class="nav-wrapper red darken-1">
        <a href="#" class="brand-logo center">CS THAI GROUP</a>
        <ul class="left hide-on-med-and-down">
            <li><a href="/admin/images">MANAGE IMAGE<i class="material-icons right">perm_media</i></a></li>
            <li><a href="/admin/videos">MANAGE VIDEO<i class="material-icons right">movie</i></a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-button" href="#" data-activates="dropdown1" >{{Auth::user()->name}}<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>

<ul id="dropdown1" class="dropdown-content">
    <li><a href="/logout">LOG OUT<i class="material-icons right">power_settings_new</i></a></li>
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