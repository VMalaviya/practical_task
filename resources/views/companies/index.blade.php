@extends('layouts.app')

@section('title', 'Company Data')

@section('content')
<div class="container pt-4">
    
    <div class="card shadow p-4 rounded-0 bg-light mb-4">
        <h1 class="text-center">Companies Information</h1>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('companies.create') }}" class="btn btn-primary rounded-0">Add Company</a>
            </div>
            <div class="col-md-6 text-right">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger rounded-0">Logout</button>
                </form>
            </div>
        </div>
    </div>
    
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
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
                <td><img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="img-fluid" style="max-width: 50px;"></td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->mobile }}</td>
                <td>
                    <a href="{{ route('companies.show', $company) }}" class="btn btn-info rounded-0">View</a>
                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning rounded-0">Edit</a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-0">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
