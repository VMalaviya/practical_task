@extends('layouts.app')

@section('title', 'Edit Company Details')

@section('content')
<div class="container mb-2">
    <h1 class="text-center my-4">Edit Company</h1>
    <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        @csrf
        @method('PUT')
        <div class="row mb-2">
            <div class="form-group col-md-4">
                <label for="name">Company Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $company->name }}" placeholder="Company Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $company->email }}" placeholder="Company Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" class="form-control" id="mobile" value="{{ $company->mobile }}" placeholder="Company Mobile">
                @error('mobile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group col-md-4">
                <label for="country">Country:</label>
                <select id="country" class="form-control" name="country_id">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $company->country_id == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                @error('country_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="state">State:</label>
                <select id="state" class="form-control" name="state_id">
                    <option value="">Select State</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}" {{ $company->state_id == $state->id ? 'selected' : '' }}>
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>
                @error('state_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="city">City:</label>
                <select id="city" class="form-control" name="city_id">
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $company->city_id == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
                @error('city_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="services">Services</label>
            <select name="services[]" class="form-control" id="services" multiple>
                <option value="Service1" 
                    {{ in_array('Service1', $company->services ?? []) ? 'selected' : '' }}>Service 1</option>
                <option value="Service2" 
                    {{ in_array('Service2', $company->services ?? []) ? 'selected' : '' }}>Service 2</option>
                <option value="Service3" 
                    {{ in_array('Service3', $company->services ?? []) ? 'selected' : '' }}>Service 3</option>
            </select>
            @error('services')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="form-group col-md-6">
                <label for="branches">Branches</label>
                <div>
                    <input type="checkbox" name="branches[]" value="Branch1" 
                        {{ in_array('Branch1', $company->branches ?? []) ? 'checked' : '' }}> Branch 1
                    <input type="checkbox" name="branches[]" value="Branch2" 
                        {{ in_array('Branch2', $company->branches ?? []) ? 'checked' : '' }}> Branch 2
                    <input type="checkbox" name="branches[]" value="Branch3" 
                        {{ in_array('Branch3', $company->branches ?? []) ? 'checked' : '' }}> Branch 3
                </div>
                @error('branches')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="logo">Company Logo</label>
                <input type="file" name="logo" class="form-control" id="logo">
                <img src="{{ asset('storage/' . $company->logo) }}" alt="Current Logo" class="img-fluid" style="max-width: 100px;">
            </div>
        </div>
        <button type="submit" class="btn btn-success rounded-0">Update</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#country').change(function() {
            var country_id = $(this).val();
            $('#state').empty().append('<option value="">Select State</option>');
            $('#city').empty().append('<option value="">Select City</option>');

            if (country_id) {
                $.ajax({
                    url: '/get-states',
                    type: 'POST',
                    data: {
                        country_id: country_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            }
        });

        $('#state').change(function() {
            var state_id = $(this).val();
            $('#city').empty().append('<option value="">Select City</option>');

            if (state_id) {
                $.ajax({
                    url: '/get-cities',
                    type: 'POST',
                    data: {
                        state_id: state_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
@endpush
