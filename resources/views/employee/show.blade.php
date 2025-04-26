@extends('layout')

@section('title', 'View Employee')

@section('content')
<div class="card mb-4 mt-4">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        View Employee
        <!-- Corrected the 'View All' link to route to the employee index page -->
        <a href="{{ route('employee.index') }}" class="float-end">View All</a>
    </div>

    <div class="card-body">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        @if (Session::has('msg'))
            <p class="text-success">{{ session('msg') }}</p>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Department</th>
                <td>{{ $data->department->title }}</td>
            </tr>
            <tr>
                <th>Picture</th>
                <td>
                    <img src="{{ asset($data->photo) }}" width="200" />
                </td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td>{{ $data->full_name }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $data->address }}</td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td>{{ $data->mobile }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($data->status == 1)
                        Activated
                    @else
                        Deactivated
                    @endif
                </td>
            </tr>
        </table>

        <!-- 'Edit' button to navigate to the employee edit page -->
        <a href="{{ route('employee.edit', $data->id) }}" class="btn btn-info">Edit</a>
    </div>
</div>
@endsection
