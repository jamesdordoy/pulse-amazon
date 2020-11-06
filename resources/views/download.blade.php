@extends('layout')

@section('main')


<table>
    <thead>
        <th>Filename</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($images as $image)
            <tr>
                <td>{{ $image['Key'] }}</td>
                <td><a href="">Download</a></td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
