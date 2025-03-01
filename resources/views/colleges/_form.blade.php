<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label">Name</label>
    <div class="col-md-9">
        <input type="text" name="name" id="name" value="{{ old('name', $college->name ?? '') }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="address" class="col-md-3 col-form-label">Address</label>
    <div class="col-md-9">
        <input type="text" name="address" id="address" value="{{ old('address', $college->address ?? '') }}" class="form-control @error('address') is-invalid @enderror">
        @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<hr>

<div class="form-group row mb-0">
    <div class="col-md-9 offset-md-3">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('colleges.index') }}" class="btn btn-danger">Cancel</a>
    </div>
</div>
