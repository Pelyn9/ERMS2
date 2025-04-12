@extends('layout')
@section('title', 'Create Departments')
@section('content')
<div class="card mb-4 mt-4">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

     <div class="card-header">
        <i class="fas fa-table me-1"></i>
       Create Department
        <a href="{{url('depart') }}" class="float-end">View All</a>
      </div>
      <div class="card-body">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif        

        @if(Session::has('msg'))
        <p class="text-success">{{ session('msg') }}</p>
        @endif
        <form method="post" action="{{ url('depart') }}">
          @csrf
          <table class="table table-bordered">
              <tr>
                <th>Title</th>
                <td>
                  <input type="text" class="from-control" />
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="submit" class="btn btn-primary" value="Submit" />
                </td>
              </tr>
          </table>
        </form>
    </div>
</div>
@endsection