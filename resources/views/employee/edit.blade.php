@extends('layout')

@section('title', 'Edit Employee')

@section('content')
<div class="card mb-4 mt-4">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit Employee
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

        <form method="POST" action="{{ route('employee.update', $data->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Department</th>
                    <td>
                        <select name="department_id" class="form-control">
                            <option value="">-- Select Department --</option>
                            @foreach($departments as $depart)
                                <option @if($depart->id == $data->department_id) selected @endif value="{{ $depart->id }}">{{ $depart->title }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td>
                        <input type="file" name="photo" class="form-control" />
                        <p>
                            <img src="{{ asset($data->photo) }}" width="200" />
                            <input type="hidden" name="prev_photo" value="{{ $data->photo }}" />
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>
                        <input type="text" value="{{ $data->full_name }}" name="full_name" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <input type="text" value="{{ $data->address }}" name="address" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td>
                        <input type="text" value="{{ $data->mobile }}" name="mobile" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <input type="radio" name="status" value="1" @if($data->status == 1) checked @endif /> Activate <br />
                        <input type="radio" name="status" value="0" @if($data->status == 0) checked @endif /> DeActivate <br />
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
