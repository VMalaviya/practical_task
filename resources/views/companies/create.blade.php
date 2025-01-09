@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Add Company</h1>
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        @csrf
        <div class="row mb-3">
            
            <div class="form-group col-md-4">
                <label for="name">Company Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Company Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Company Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" id="mobile" placeholder="Company Mobile">
                @error('mobile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            
        </div>
        <div class="form-group mb-3">
            <label for="services">Services</label>
            <select name="services[]" class="form-control" id="services" multiple>
                <option value="Service1" {{ in_array('Service1', old('services', [])) ? 'selected' : '' }}>Service 1</option>
                <option value="Service2" {{ in_array('Service2', old('services', [])) ? 'selected' : '' }}>Service 2</option>
                <option value="Service3" {{ in_array('Service3', old('services', [])) ? 'selected' : '' }}>Service 3</option>
            </select>
            @error('services')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="form-group col-md-6">
                <label for="branches">Branches</label>
                <div>
                    <input type="checkbox" name="branches[]" value="Branch1" {{ in_array('Branch1', old('branches', [])) ? 'checked' : '' }}> Branch 1
                    <input type="checkbox" name="branches[]" value="Branch2" {{ in_array('Branch2', old('branches', [])) ? 'checked' : '' }}> Branch 2
                    <input type="checkbox" name="branches[]" value="Branch3" {{ in_array('Branch3', old('branches', [])) ? 'checked' : '' }}> Branch 3
                </div>
                @error('branches')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="logo">Company Logo</label>
                <input type="file" name="logo" class="form-control" id="logo">
                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success rounded-0">Submit</button>
    </form>
</div>
@endsection
