@extends('dashboard.layouts.master', [
    'active_button' => 'services',
    'page_title'    => 'Update Service',
])
@push('styles')
    {{-- <link rel="stylesheet" href="{{ asset('dashboard/assets/css/services.css') }}"> --}}
@endpush

@section('content')
    <div class="card">
        <form action="{{ route('services.update' , $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $service->name }}" @class(['form-control' , 'is-invalid' => $errors->has('name')]) id="name" required placeholder="Enter service name">
                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Desription</label>
                    <input type="text" name="description" @class(['form-control' , 'is-invalid' => $errors->has('description')]) value="{{ $service->description }}" id="description" required placeholder="Enter service description">
                    @error('description')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="icons">
                        Select Icon
                    </label>
                    <select id="icons" name="icon_id" class="custom-select">
                        <option disabled>Select icon</option>
                        @foreach ($icons as $icon)
                            <option value="{{ $icon->id }}" @selected( $service->icon_id == $icon->id )>{{ $icon->name }}</option>
                        @endforeach
                    </select>
                    @error('icon_id')
                        <span class="text-danger text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    {{-- <script src="{{ asset('dashboard/assets/js/services.js') }}"></script> --}}
@endpush


