@extends('dashboard.layouts.master', [
    'active_button' => 'services',
    'page_title'    => 'Create Service',
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
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required placeholder="Enter service name">
                </div>
                <div class="form-group">
                    <label for="description">Desription</label>
                    <input type="text" name="description" class="form-control" id="description" required placeholder="Enter service description">
                </div>
                <div class="form-group">
                    <span>Image</span> <br>
                    <label for="image" class="preview-image d-flex align-items-center justify-content-center">
                        <i class="fas fa-images fs-2"></i>
                        <img id="previewed-image" src="" alt="" class="img-fluid">
                    </label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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


