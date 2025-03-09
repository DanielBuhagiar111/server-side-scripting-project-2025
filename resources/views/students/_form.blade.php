{{-- Student form partial view --}}
<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label">Name</label>
    <div class="col-md-9">
        {{-- If theres an old name value place it in the input field --}}
        <input type="text" name="name" id="name" value="{{ old('name', $student->name ?? '') }}" class="form-control @error('name') is-invalid @enderror">
        {{-- If name has an error display the error message --}}
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-3 col-form-label">Email</label>
    <div class="col-md-9">
        {{-- If theres an old email value place it in the input field --}}
        <input type="text" name="email" id="email" value="{{ old('email', $student->email ?? '') }}" class="form-control @error('email') is-invalid @enderror">
        {{-- If email has an error display the error message --}}
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="phone" class="col-md-3 col-form-label">Phone</label>
    <div class="col-md-9">
        {{-- If theres an old phone value place it in the input field --}}
        <input type="text" name="phone" id="phone" value="{{ old('phone', $student->phone ?? '') }}" class="form-control @error('phone') is-invalid @enderror">
        {{-- If phone has an error display the error message --}}
        @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="dob" class="col-md-3 col-form-label">DOB</label>
    <div class="col-md-9">
        {{-- If theres an old dob value place it in the input field --}}
        <input type="date" name="dob" id="dob" value="{{ old('dob', $student->dob ?? '') }}" class="form-control @error('dob') is-invalid @enderror">
        {{-- If dob has an error display the error message --}}
        @error('dob')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="college_id" class="col-md-3 col-form-label">College</label>
    <div class="col-md-9">
        {{-- Display a dropdown menu with the college names and if one was already selected set it to that one --}}
        <select name="college_id" id="college_id" class="form-control @error('college_id') is-invalid @enderror">
            @foreach ($colleges as $id => $name)
                <option {{ old('college_id', $student->college_id ?? '') == $id ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        {{-- If college has an error display the error message --}}
        @error('college_id')
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
        <a href="{{ route('students.index') }}" class="btn btn-danger">Cancel</a>
    </div>
</div>
