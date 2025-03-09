<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <div>
            {{-- Two routes to take you to one of the main pages --}}
            <a href="{{ route('colleges.index') }}">All Colleges</a>
            <a href="{{ route('students.index') }}">All Students</a>
        </div>
    </body>
</html>
