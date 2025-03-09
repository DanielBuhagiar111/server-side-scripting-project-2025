{{-- Form that routes back to the index page --}}
<form method="GET" action="{{ route('students.index') }}" style="display:inline; margin: 0;">
    
    {{-- Gets the filter value so it isint removed in case its set --}}
    <input type="hidden" name="college_id" value="{{ request('college_id') }}">

    {{-- Sets the sort value depending on the current state of the cycle: unsorted -> ascending -> decending --}}
    <button type="submit" name="sort" value="{{ request('sort') == 'name_desc' ? '' : (request('sort') == 'name_asc' ? 'name_desc' : 'name_asc') }}" 
        class="btn btn-link text-light p-0">
        {{-- Changes the icon to correspond to the vlaue in sort --}}
        @if (request('sort') == 'name_asc')
            <i class="bi bi-sort-alpha-up mb-0"></i>
        @elseif (request('sort') == 'name_desc')
            <i class="bi bi-sort-alpha-down"></i>
        @else
            <i class="bi bi-arrow-down-up"></i>
        @endif
    </button>
</form>
