<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <i class="fab fa-linux" style="font-size: 50px"></i>
        <a class="navbar-brand font-weight-bold ml-md-3" href="{{ url('/') }}">
            <h3 class="m-0">
                {{ config('app.name', 'Laravel') }}
            </h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav ml-auto my-4 my-md-auto">
                <li class="my-3 my-md-auto d-none d-md-block">
                    <a href="https://gitlab.com/meaculpa/doesitrunlinux" target="_blank">
                        <h2 class="m-0"><i class="fab fa-git-alt"></i></h2>
                    </a>
                </li>
                <li class="my-3 my-md-auto ml-md-5">
                    <a href="{{ route('configurations.create') }}">
                        <h2 class="d-none d-md-block m-0"><i class="fas fa-plus"></i></h2>
                        <h5 class="d-md-none m-0"><i class="fas fa-plus mr-3"></i>Add your configuration</h5>
                    </a>
                </li>
                <li class="my-3 my-md-auto ml-md-5">
                    <a href="{{ route('configurations.index') }}">
                        <h2 class="d-none d-md-block m-0"><i class="fas fa-database"></i></h2>
                        <h5 class="d-md-none m-0"><i class="fas fa-database mr-3"></i>Database</h5>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
