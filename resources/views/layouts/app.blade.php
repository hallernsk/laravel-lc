<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index (Blade)</title>


    <!-- Styles -->

    <!-- public/build/assets/app-D-sv12UV.css -->
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
<!-- <link href="{{ asset('css/app-D-sv12UV.css') }}" rel="stylesheet"> -->

<link href="{{ asset('build/assets/app-D-sv12UV.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row">

        <ul class="nav">
            <li class="nav-item">
               <a class="nav-link active" href="{{ route('post.index') }}">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about.index') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
            </li>
        </ul>        
            <!-- <nav>
                <ul>
                    <li><a href="{{ route('post.index') }}">Posts</a></li>
                    <li><a href="{{ route('about.index') }}">About</a></li>
                    <li><a href="{{ route('contact.index') }}">Contacts</a></li>
                </ul>
            </nav> -->
    </div>
    @yield('content')   
    </div> 
    <!-- Scripts -->
    <script src="{{ asset('build/assets/app-BziwsqBe.js') }}"></script>   
</body>
</html>