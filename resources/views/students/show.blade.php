@extends('layouts.main')

@section('content')
<main class="py-5 gradient-custom text-light">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="card bg-dark text-light">
                    <div class="card-header card-title">
                      <h2 class="mb-0">View Student</h2>
                    </div>           
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-light">{{ $student->name }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-light">{{ $student->email }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Phone</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-light">{{ $student->phone }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">DOB</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-light">{{ $student->dob }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">College</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-light">{{ $student->college->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mb-0">
                                    <div class="col-md-9 offset-md-3">
                                        <a href="{{ route('students.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
