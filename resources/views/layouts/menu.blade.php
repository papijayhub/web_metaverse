<li class="nav-item">
    <a href="{{ route('shopkeepers.index') }}"
       class="nav-link {{ Request::is('shopkeepers*') ? 'active' : '' }}">
        <p>Shopkeepers</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>









<li class="nav-item">
    <a href="{{ route('posts.index') }}"
       class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
        <p>Posts</p>
    </a>
</li>


