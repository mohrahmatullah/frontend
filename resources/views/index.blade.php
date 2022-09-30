@extends('layouts.app')
@section('title', 'List')
@section('content')
{{--
<div class="wrapper">
  <h1 style="text-align: center;">All List</h1>
  <!-- Button trigger modal -->
  <a href="{{ route('add')}}" class="btn btn-primary mb-3">
    Create
  </a>
  @if($alert_toast = Session::get('alert_toast'))
      <div class="alert alert-{{$alert_toast['type']}} alert-dismissible">
          {{$alert_toast['title']}}</h4>
          {{$alert_toast['text']}}
      </div>
  @endif
  <table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fullname</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($data as $post)
      <tr>
        <td>{{ $post['id'] }}</td>
        <td>{{ $post['fullname']}}</td>
        <td>{{ $post['email'] }}</td>
        <td>{{ $post['gender'] == 1 ? 'Pria' : 'Wanita'}}</td>
        <td>{{ $post['dob'] }}</td>
        <td><a class="btn btn-warning" href="{{ route('view', $post['id'])}}">Edit</a>&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('lihat', $post['id'])}}">view</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- {{ $data->appends(request()->input())->links() }} -->
  {!! $data->appends(Request::capture()->except('page'))->render('layouts.paginate') !!}
</div>
--}}
@endsection