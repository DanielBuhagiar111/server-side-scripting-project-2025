@extends('layouts.main')

@section('content')
<main class="py-5 gradient-custom text-light">
    <div class="container">
        <!-- Card to hold the content -->
        <div class="card">
            <div class="card-header card-title bg-dark text-light">
                <div class="d-flex align-items-center">
                    <h2 class="mb-0">Add College</h2>
                    <div class="ml-auto d-flex align-items-center">
                        <!-- You can add filters or other actions here if needed -->
                    </div>
                </div>
            </div>
            
            <!-- Card body where the form will be placed -->
            <div class="card-body bg-dark">
                <form action="{{ route('colleges.store') }}" method="POST">
                    @csrf
                    @include('colleges._form')  <!-- Include form from another file -->
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
