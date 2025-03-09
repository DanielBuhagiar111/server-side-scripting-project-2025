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
                            <h2 class="mb-0">All Students</h2>
                            <div class="ml-auto d-flex align-items-center">
                                {{-- Includes the filter partial view --}}
                                @include('students._filter')

                                {{-- Button that redirects to the create page --}}
                                <a href="{{ route('students.create') }}" class="btn btn-success">
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
                                        {{-- Include the sort partial view next to the name to indicate what yourr sorting by --}}
                                        <th scope="col">Name  @include('students._sort')</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">College</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display all students information --}}
                                    @foreach ($students as $index => $student)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->dob }}</td>
                                            <td>{{ $student->college->name }}</td>
                                            <td width="150" class="text-center">
                                                {{-- Buttons to call different routes --}}
                                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-outline-info" title="Show">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="{{ route('students.destroy', $student->id) }}" class="btn-delete btn btn-sm btn-outline-danger" title="Delete">
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
