@extends('layouts.app')

@section('title', 'Company Data')

@section('content')
<div class="container">
    <h1>Companies Data</h1>
    <div class="row">
        <div class="col-6">
            <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
        </div>
        <div class="col-6 text-right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger align-right">Logout</button>
            </form>
        </div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td><img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="50"></td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->mobile }}</td>
                <td>
                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection