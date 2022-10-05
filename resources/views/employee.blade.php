@extends('layouts.app')
@section('title', 'List')
@section('content')

<div class="wrapper">
  <h1 style="text-align: center;">All List</h1>
  <!-- Button trigger modal -->
  <a href="" class="btn btn-primary mb-3">
    Create
  </a>

  <a href="{{ route('logout') }}" class="btn btn-primary mb-3">
    Logout
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
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Marial Status</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
     @foreach ($employee as $post)
      <tr>
        <td>{{ $post['id'] }}</td>
        <td>{{ $post['username']}}</td>
        <td>{{ $post['password'] }}</td>
        <td>{{ $post['date_of_birth'] }}</td>
        <td>{{ $post['marital_status'] }}</td>
        <td></td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
  
  {{--
  <!-- {{ $employee->appends(request()->input())->links() }} -->

--}}

  {!! $employee->appends(Request::capture()->except('page'))->render('layouts.paginate') !!}
  

  
</div>

@endsection