@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Add Company</h1>
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        @csrf
        <div class="row mb-3">
            <div class="form-group col-md-6">
                <label for="logo">Company Logo</label>
                <input type="file" name="logo" class="form-control" id="logo">
                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="name">Company Name</label>
                <input type="text" name="name" class="form-control" id="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" class="form-control" id="mobile">
                @error('mobile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="services">Services</label>
            <select name="services[]" class="form-control" id="services" multiple>
                <option value="Service 1">Service 1</option>
                <option value="Service 2">Service 2</option>
                <option value="Service 3">Service 3</option>
            </select>
            @error('services')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- <div class="row mb-3">
            <div class="form-group col-md-6">
                <label for="country">Country</label>
                <select name="country" class="form-control" id="country" required>
                    <option value="Country 1">Country 1</option>
                    <option value="Country 2">Country 2</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="state">State</label>
                <select name="state" class="form-control" id="state" required>
                    <!-- Populate based on selected country -->
                </select>
            </div>
        </div> --}}
        <div class="row mb-3">
            {{-- <div class="form-group col-md-6">
                <label for="city">City</label>
                <select name="city" class="form-control" id="city" required>
                    <!-- Populate based on selected state -->
                </select>
            </div> --}}
            <div class="form-group col-md-6">
                <label for="branches">Branches</label>
                <div>
                    <input type="checkbox" name="branches[]" value="Branch 1"> Branch 1
                    <input type="checkbox" name="branches[]" value="Branch 2"> Branch 2
                    <input type="checkbox" name="branches[]" value="Branch 3"> Branch 3
                </div>
                @error('branches')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </form>
</div>
@endsection
