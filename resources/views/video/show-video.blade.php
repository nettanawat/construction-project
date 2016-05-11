@extends('master')


@section('content')
    <div class="row">
        @if($project=='maeon')
            <h4 class="col s12 text-lighten-2 blue-text">โครงการอ่างเก็บน้ำแม่อ้อน</h4>
        @else
            <h4 class="col s12 text-lighten-2 blue-text">โครงการอ่างเก็บน้ำแม่พริก</h4>
        @endif
        <h5 class="col s8 text-darken-2 blue-text">VIDEOS</h5>
        <!-- Dropdown Trigger -->
        <a class='dropdown-button btn col s4' href='/project/{{$project}}/videos/all' data-activates='dateid'>SHOW BY DATE</a>

        <!-- Dropdown Structure -->
        <ul id='dateid' class='dropdown-content'>
            <li><a href="/project/{{$project}}/videos/all">ALL</a></li>
            @foreach( $allDates as $date)
                <li class="divider"></li>
                <li><a href="/project/{{$project}}/videos/{{$date}}">{{$date}}</a></li>
            @endforeach
        </ul>
        @foreach( $dates as $date)
            <hr class="col s12">
            <h5 class="col s12 text-darken-3 blue-text">{{$date}}</h5>
            @foreach($videos as $video)
                @if($video->date == $date)
                    <div class="col s12 m4">
                        <div class="card">
                            <div style="height: 150px;" class="card-image center">
                                <p style="padding-top: 10px;" class="center">{{$video->name}}</p>
                                <a class="waves-effect waves-light btn modal-trigger" href="#modal{{$video->id}}">WATCH</a>
                            </div>
                        </div>
                    </div>
                @endif
                        <!-- Modal Structure -->
                    <div id="modal{{$video->id}}" class="modal">
                        <div class="modal-content">
                            <h4 class="col s12">{{$video->name}}</h4>
                            <object class="col s12 vidPlayer" width="1000" height="600" data="{{$video->url}}"></object>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
                        </div>
                    </div>
            @endforeach
        @endforeach
    </div>
@endsection