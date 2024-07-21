<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('laracore-algolia/css/app.css') }}" rel="stylesheet" />
    <title>LaraCore Algolia</title>
</head>
<body>
<div>
    <nav>
        <div>
            LaraCore Algolia Settings
        </div>
        <div>
            <a href="{{ route('laracore-algolia.index') }}">Home</a>
        </div>
    </nav>
 
    <main>
        @yield('content')
    </main>
</div>
 
</body>
</html>