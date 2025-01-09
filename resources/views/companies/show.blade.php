@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="card shadow p-4 rounded bg-light">
        <h3 class="text-center">Company: {{ $company->name }}</h3>
        <div class="text-center">
            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="img-fluid" style="max-width: 150px;">
        </div>
        <div class="mt-3">
            <p><strong>Email:</strong> {{ $company->email }}</p>
            <p><strong>Mobile:</strong> {{ $company->mobile }}</p>
            <p><strong>Services:</strong>
                @if($company->services)
                    @foreach($company->services as $service)
                        <span class="badge badge-info rounded-0">{{ $service }}</span>
                    @endforeach
                @else
                    <span>No services selected</span>
                @endif
            </p>
            <p><strong>Branches:</strong>
                @if($company->branches)
                    @foreach($company->branches as $branch)
                        <span class="badge badge-secondary rounded-0">{{ $branch }}</span>
                    @endforeach
                @else
                    <span>No branches selected</span>
                @endif
            </p>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning rounded-0">Edit</a>
            <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger rounded-0">Delete</button>
            </form>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary rounded-0">Back to Companies</a>
        </div>
    </div>
</div>
@endsection
