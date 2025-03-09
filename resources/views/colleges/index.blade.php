@extends('layouts.main')
{{-- Extends the content in the main layout --}}

@section('content')
<main class="py-5 gradient-custom text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-dark text-light">
                    <div class="card-header card-title">
                        <div class="d-flex align-items-center">
                            <h2 class="mb-0">All Colleges</h2>
                            <div class="ml-auto">
                                {{-- Button that redirects to the create page --}}
                                <a href="{{ route('colleges.create') }}" class="btn btn-success">
                                    <i class="bi bi-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body bg-dark">
                        {{-- Display error and success messages passed from other pages --}}
                        @if ($message = session('message'))
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-success text-center">{{ $message }}</div>
                                </td>
                            </tr>
                        @endif
                        @if ($error = session('error'))
                        <tr>
                            <td colspan="8">
                                <div class="alert alert-danger text-center">{{ $error }}</div>
                            </td>
                        </tr>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-dark table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display all colleges information --}}
                                    @foreach ($colleges as $index => $college)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $college->name }}</td>
                                            <td>{{ $college->address }}</td>
                                            <td width="150" class="text-center">
                                                {{-- Buttons to call different routes --}}
                                                <a href="{{ route('colleges.show', $college->id) }}" class="btn btn-sm btn-outline-info" title="Show">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="{{ route('colleges.destroy', $college->id) }}" class="btn-delete btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- Delete Button form --}}
                                    <form id="form-delete" method="POST" style="display: none">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
