<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>My Contact</title>

    <!-- Bootstrap -->
    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css')}}" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="{{ asset('/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
  </head>
  <body>
    {{-- Header that will be shown in every page --}}
    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container">  
            <h1 class="text-light">Student App</h1>
        <div>
          <ul class="navbar-nav">
            <li class="nav-item "><a href="{{ route('colleges.index') }}" class="nav-link text-light">Colleges</a></li>
            <li class="nav-item active"><a href="{{ route('students.index') }}" class="nav-link text-light">Students</a></li>
          </ul>
        </div>
      </div>
    </nav>

    {{-- Show content from the other views that extend the main view --}}
    @yield('content')

  </body>
</html>