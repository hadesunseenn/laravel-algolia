<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('laracore-algolia/css/app.css') }}" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <title>LaraCore Algolia</title>
</head>
<body>

    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div>
                    <a href="{{route('laracore-algolia.home')}}" class="text-gray-800 text-xl font-bold">LaraCore Algolia</a>
                </div>
                <div class="flex space-x-4">
                    <a href="{{route('laracore-algolia.home')}}" class="text-gray-800 hover:text-gray-600">Home</a>
                    <a href="{{route('laracore-algolia.settings')}}" class="text-gray-800 hover:text-gray-600">Settings</a>
                </div>
            </div>
        </div>
    </nav>
 
    <div id="app" class="container mx-auto mt-8">
        @yield('content')
    </div>
    <script src="{{ asset('laracore-algolia/js/app.js') }}" defer></script>
 
</body>
</html>