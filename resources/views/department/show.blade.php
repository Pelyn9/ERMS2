@extends('layout')

@section('title', ' View Department')

@section('content')
<div class="card mb-4 mt-4">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        View Department
        <a href="{{url('depart') }}" class="float-end">View All</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <td>
                    {{ $data->title }}
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
