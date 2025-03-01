@extends('layouts.main')

@section('content')
<main class="py-5 gradient-custom text-light">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="card bg-dark text-light">
                    <div class="card-header card-title">
                      <h2 class="mb-0">View College</h2>
                    </div>           
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-light">{{ $college->name }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-light">{{ $college->address }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mb-0">
                                    <div class="col-md-9 offset-md-3">
                                        <a href="{{ route('colleges.index') }}" class="btn btn-danger">Cancel</a>
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
