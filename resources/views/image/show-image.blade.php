@extends('master')


@section('content')

    <div class="row">
        @if($project=='maeon')
            <h4 class="col s12 text-lighten-2 blue-text">โครงการอ่างเก็บน้ำแม่อ้อน</h4>
            @else
            <h4 class="col s12 text-lighten-2 blue-text">โครงการอ่างเก็บน้ำแม่พริก</h4>
            @endif
        <h5 class="col s8 text-darken-2 blue-text">GALLERY</h5>
        <!-- Dropdown Trigger -->
        <a class='dropdown-button btn col s4' href='/project/{{$project}}/images/all' data-activates='dateid'>SHOW BY DATE</a>

        <!-- Dropdown Structure -->
        <ul id='dateid' class='dropdown-content'>
            <li><a href="/project/{{$project}}/images/all">ALL</a></li>
            @foreach( $allDates as $date)
                <li class="divider"></li>
                <li><a href="/project/{{$project}}/images/{{$date}}">{{$date}}</a></li>
            @endforeach
        </ul>
        @foreach( $dates as $date)
            <hr class="col s12">
            <h5 class="col s12 text-darken-3 blue-text">{{$date}}</h5>
            @foreach($images as $image)
                @if($image->date == $date)
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <a class="example-image-link" href="{!! asset('uploads/images/'.$image->path) !!}"
                                   data-lightbox="example-1">
                                    <img class="example-image" src="{!! asset('uploads/images/'.$image->path) !!}"
                                         alt="thumb-1" width="100%"/></a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
@endsection