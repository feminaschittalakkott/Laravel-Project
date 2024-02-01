<nav class="navbar">
    <div class="navbar-left">
        <a href="/"  class="{{ request()->routeIs('/') ? 'active' : '' }}">Home</a>
        <a href="{{ route('products.index') }}">Product</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>
</nav>