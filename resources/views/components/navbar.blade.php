<nav class="sticky bg-lime-300 py-4 text-green-900 overflow-hidden">
    <a class="float-left text-center text-lg px-4 py-4 hover:text-green-500" href="/">HOME</a>
    <a class="float-left text-center text-lg px-4 py-4 hover:text-green-500" href="#news">NEWS</a>
    <a class="float-left text-center text-lg px-4 py-4 hover:text-green-500" href="#notification">NOTIFICATIONS</a>

    @auth
        <div class="float-left right-auto text-center text-lg px-2 py-4 hover:text-green-500">
            <a href="{{ route('dashboard') }}">DASHBOARD</a>
        </div>
        <div class="float-right right-auto text-center text-lg px-2 py-4 hover:text-green-500">
            <a href="#logout">LOGOUT</a>
        </div>
        <div class="float-right right-auto text-center text-lg px-2 py-4">
            <a href="#">{{ auth()->user()->name }}</a>
        </div>
    @endauth
    @guest
        <div class="float-right right-auto text-center text-lg px-2 py-4 hover:text-green-500">
            <a href="{{ route('register') }}">REGISTER</a>
        </div>
        <div class="float-right right-auto text-center text-lg px-2 py-4 hover:text-green-500">
            <a href="#login">LOGIN</a>
        </div>
    @endguest
</nav>
