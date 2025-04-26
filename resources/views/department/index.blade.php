@extends('layout')

@section('title', 'All Departments')

@section('content')
<div class="card mb-4 mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Departments
        <a href="{{ url('depart/create') }}" class="float-end">Add New</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($data as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->title }}</td>
                    <td>
                    <a href="{{ url('depart/'.$department->id) }}" class="btn btn-warning btn-sm">Show</a>
                    <a href="{{ url('depart/'.$department->id.'/edit') }}" class="btn btn-info btn-sm">Update</a>
                        <a onclick="return confirm('Are you sure to delete this data?')" href="{{ url('depart/'.$department->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('public') }}/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('public') }}/js/datatables-simple-demo.js"></script>
@endsection
