@extends('dashboard.layouts.master', [
    'active_button' => 'services',
    'page_title'    => 'services page'
    ])

@section('content')
    <a href="{{ route('services.create') }}" class="btn btn-outline-success mb-2">
        Add Service
    </a>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td>{{{ $loop->iteration }}}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->description }}</td>
                            <td> <img src="{{ asset('storage/'. $service->image) }}" height="50"> </td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('services.edit' , $service->id) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-sm btn-info">Update</button>
                                    </form>
                                    <form action="{{ route('services.destroy' , $service->id) }}" method="post" class="ml-2">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5" class="text-center">
                                There isn't any service yet
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
