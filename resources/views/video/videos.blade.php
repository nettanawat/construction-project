@extends('master-admin')


@section('content')

    <div style="margin-top: 20px;" class="row">
        <a href="/admin/add-video" class="btn-floating btn-large waves-effect waves-light red lighten-2 right"><i class="material-icons">add</i></a>
    </div>
    <table>
        <thead>
        <tr>
            <th data-field="id">VIDEO</th>
            <th data-field="name">VIDEO NAME</th>
            <th data-field="name">DATE</th>
            <th data-field="price">PROJECT</th>
            <th data-field="action">ACTION</th>
        </tr>
        </thead>

        <tbody>
        @foreach($videos as $video)
            <tr>
                <td>
                    <object width="210" height="160" data="{{$video->url}}"></object>
                </td>
                <td>{{$video->name}}</td>
                <td>{{$video->date}}</td>
                <td>{{$video->project}}</td>
                <td>
                    <form action="/admin/delete-video/{{$video->id}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <a class="orange-text" href="/admin/edit-video/{{ $video->id }}"><i class="material-icons left">open_in_new</i></a>
                        <input type="submit" class="waves-effect waves-light btn-sm red white-text" value="DELETE">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection