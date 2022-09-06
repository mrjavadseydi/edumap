<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom  ">
    <!-- Left navbar links -->
    <ul class="navbar-nav d-flex justify-between">

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link">خانه</a>
        </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">

        <li class="nav-item d-none d-sm-inline-block">

            <form method="post" action="{{route('logout')}}">
                @csrf
                <input type="submit" class="btn btn-outline-secondary" value="خروج">
            </form>
        </li>

    </ul>
</nav>

