<form method="GET" action="{{ route('students.index') }}" class="mr-2">

    <input type="hidden" name="sort" value="{{ request('sort') }}">

    <select name="college_id" class="form-select bg-dark text-light border-light" onchange="this.form.submit()">
        @foreach ($colleges as $id => $name)
            <option value="{{ $id }}" {{ $id == $college_id ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
    </select>
</form>
