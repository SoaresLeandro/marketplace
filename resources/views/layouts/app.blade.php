<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-sm mb-4">

        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">Marketplace</a>

            <button class="navbar-toggler">
                <span class="navbar-toggler"></span>
            </button>

            @auth
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item @if (request()->is('admin/stores')) active @endif">
                        <a href="{{ route('admin.stores.index') }}" class="nav-link">Lojas</a>
                    </li>
                    <li class="nav-item @if (request()->is('admin/products')) active @endif">
                        <a href="{{ route('admin.products.index') }}" class="nav-link">Produtos</a>
                    </li>
                    <li class="nav-item @if (request()->is('admin/categories')) active @endif">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link">Categorias</a>
                    </li>

                    <div class="my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" onclick="event.preventDefault(); document.querySelector('form.logout').submit()">Sair</a>

                                <form action="{{ route('logout') }}" method="POST" class="logout" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                    <li class="nav-item @if (request()->is('admin/products')) active @endif">
                        <a href="#" class="nav-link">{{ auth()->user()->email }}</a>
                    </li>
                </ul>
            @endauth
            
        </div>

    </nav>
    
    <div class="container">
        @include('flash::message')
        @hasSection ('content')
            @yield('content')
        @else
            
        @endif
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>