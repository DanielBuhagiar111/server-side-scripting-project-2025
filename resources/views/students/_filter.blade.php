{{-- Form that routes back to the index page --}}
<form method="GET" action="{{ route('students.index') }}" class="mr-2">
    
    {{-- Gets the sort value so it isint removed in case its set --}}
    <input type="hidden" name="sort" value="{{ request('sort') }}">

    {{-- Display all the colleges in the drop down and when one is selected submit the form --}}
    <select name="college_id" class="form-select bg-dark text-light border-light" onchange="this.form.submit()">
        @foreach ($colleges as $id => $name)
            <option value="{{ $id }}" {{ $id == $college_id ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
    </select>
</form>
