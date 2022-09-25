@extends('dashboard.layouts.master', [
    'active_button' => 'services',
    'page_title'    => 'Update Service',
])
@push('styles')
    <style>
        .preview-image{
            width: 90px;
            height: 90px;
            border: 1px solid black;
            border-radius: 15px;
        }
        #image{
            opacity: 0;
            overflow: hidden;
        }
    </style>
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
                    <span>Image</span> <br>
                    <label for="image" class="preview-image d-flex align-items-center justify-content-center">
                        @if ($service->image)
                            <img src="{{ asset('storage/'. $service->image) }}" height="150">
                        @else
                            <i class="fas fa-images fs-2"></i>
                            <img id="previewed-image" src="" alt="" class="img-fluid">
                        @endif
                    </label>
                    <input type="file" id="image" name="image" accept="image/*">
                    @error('image')
                        <span class="text-danger">
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
    <script>
        $('#image').on('change' , function (e){
            $('#previewed-image').attr('src' , URL.createObjectURL(e.target.files[0]))
        })
    </script>
@endpush


