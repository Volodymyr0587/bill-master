<nav class="sticky bg-sky-200 py-4 text-green-900 overflow-hidden">
    <a class="float-left text-center text-lg px-4 py-4 hover:text-green-500" href="/">HOME</a>
    <a class="float-left text-center text-lg px-4 py-4 hover:text-green-500" href="#news">NEWS</a>
    <a class="float-left text-center text-lg px-4 py-4 hover:text-green-500" href="{{ route('notifications') }}">NOTIFICATIONS</a>

    @auth
        <div class="float-left right-auto text-center text-lg px-2 py-4 hover:text-green-500">
            <a href="{{ route('dashboard') }}">DASHBOARD</a>
        </div>
        <div class="float-right right-auto text-center text-lg px-4 py-4 hover:text-green-500">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">LOGOUT</button>
            </form>
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
            <a href="{{ route('login') }}">LOGIN</a>
        </div>
    @endguest
</nav>
