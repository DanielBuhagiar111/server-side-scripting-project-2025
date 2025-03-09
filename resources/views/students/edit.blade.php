@extends('layouts.main')
{{-- Extends the content in the main layout --}}

@section('content')
<main class="py-5 gradient-custom text-light">
    <div class="container">
        <div class="card bg-dark text-light">
            <div class="card-header card-title">
                <div class="d-flex align-items-center">
                    <h2 class="mb-0">Edit Student</h2>
                    <div class="ml-auto d-flex align-items-center">
                    </div>
                </div>
            </div>
            
            <div class="card-body bg-dark">
                {{-- Form that when submited calls the update route, it includes the form partial view --}}
                <form action="{{ route('students.update', $student->id) }}" method="POST">
                  @method('PUT')
                  @csrf
                  @include('students._form')
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
