@extends('layout')

@section('main')

<h2>Download Images from S3</h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <th>Filename</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($images as $image)
                <tr>
                    <td>{{ $image['Key'] }}</td>
                    <td><a href="https://jd-pulse-test-bucket.s3.eu-west-1.amazonaws.com/{{ $image['Key'] }}">Download</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
