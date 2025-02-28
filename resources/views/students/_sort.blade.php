<form method="GET" action="{{ route('students.index') }}" style="display:inline; margin: 0;">
    
    <input type="hidden" name="college_id" value="{{ request('college_id') }}">

    <button type="submit" name="sort" value="{{ request('sort') == 'name_desc' ? '' : (request('sort') == 'name_asc' ? 'name_desc' : 'name_asc') }}" 
        class="btn btn-link text-light p-0">
        @if (request('sort') == 'name_asc')
            <i class="bi bi-sort-alpha-up mb-0"></i>
        @elseif (request('sort') == 'name_desc')
            <i class="bi bi-sort-alpha-down"></i>
        @else
            <i class="bi bi-arrow-down-up"></i>
        @endif
    </button>
</form>
