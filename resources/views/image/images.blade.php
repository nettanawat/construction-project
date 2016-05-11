@extends('master-admin')


@section('content')

    <div style="margin-top: 20px;" class="row">
        <a href="/admin/add-image" class="btn-floating btn-large waves-effect waves-light red lighten-2 right"><i class="material-icons">add</i></a>
    </div>
    <table>
        <thead>
        <tr>
            <th data-field="id">Image</th>
            <th data-field="name">Image Name</th>
            <th data-field="name">Date</th>
            <th data-field="price">Project</th>
            <th data-field="action">Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($images as $image)
            <tr>
                <td>
                    <div class="card-image">
                        <img src="{{asset('uploads/images/').'/'.$image->path}}" height="100px">
                    </div>
                </td>
                <td>{{$image->path}}</td>
                <td>{{$image->date}}</td>
                <td>{{$image->project}}</td>
                <td>
                    <form action="/admin/delete-image/{{$image->id}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="waves-effect waves-light btn-sm red white-text" value="DELETE">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection