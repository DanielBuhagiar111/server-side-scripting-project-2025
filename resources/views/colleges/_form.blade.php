{{-- College form partial view --}}
<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label">Name</label>
    <div class="col-md-9">
        {{-- If theres an old name value place it in the input field --}}
        <input type="text" name="name" id="name" value="{{ old('name', $college->name ?? '') }}" class="form-control @error('name') is-invalid @enderror">
        {{-- If name has an error display the error message --}}
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
        {{-- If theres an old address value place it in the input field --}}
        <input type="text" name="address" id="address" value="{{ old('address', $college->address ?? '') }}" class="form-control @error('address') is-invalid @enderror">
        {{-- If address has an error display the error message --}}
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
        {{-- click the save button to submit or the cancel button to go back to the index page --}}
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('colleges.index') }}" class="btn btn-danger">Cancel</a>
    </div>
</div>
