<nav class="navbar navbar-inverse ">
    <div class="container-fluid ">
        @if (Gate::allows('admin'))
            <div class="navbar-header">
                <a href="{{url('/')}}" class="navbar-brand">Machine à Coffee</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/Accueil">Accueil</a></li>
                <li><a href="{{route('boissonBdd')}}"> Boissons</a></li>
                <li><a href="{{url('ingredients')}}">Ingrédients</a></li>
                <li><a href="{{url('recette')}}">Recette</a></li>
                <li><a href="{{url('monnaie')}}">Monnaie</a></li>
                <li><a href="{{url('vente')}}">Vente</a></li>
                <li><a href="{{route('admin.index')}}">Users</a></li>

            </ul>
            @elseif (Gate::allows('superadmin'))
                <div class="navbar-header">
                    <a href="{{url('/')}}" class="navbar-brand">Machine à Coffee</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="/Accueil">Accueil</a></li>
                    <li><a href="{{route('boissonBdd')}}"> Boissons</a></li>
                    <li><a href="{{url('ingredients')}}">Ingrédients</a></li>
                    <li><a href="{{url('recette')}}">Recette</a></li>
                    <li><a href="{{url('monnaie')}}">Monnaie</a></li>
                    <li><a href="{{url('vente')}}">Vente</a></li>
                    <li><a href="{{route('admin.index')}}">Users</a></li>

                </ul>
        @elseif(Gate::allows('user'))

            <div class="navbar-header">
                <a href="{{url('/')}}" class="navbar-brand">Machine à Coffee</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/Accueil">Accueil</a></li>
                <li><a href="{{url('vente')}}">Achat</a></li>
            </ul>
        @else
            <div class="navbar-header">
                <a href="{{url('/')}}" class="navbar-brand">Machine à Coffee</a>
            </div>
    @endif
    <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                       aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<script src="{{ asset('js/app.js') }}"></script>
