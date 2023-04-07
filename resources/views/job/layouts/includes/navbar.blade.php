<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">JobEntry</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link">Home</a>
            <a href="{{route('joblist')}}" class="nav-item nav-link">jobs list</a>
            @auth
                @if (auth()->user()->hasRole('user'))
                    <a href="/user" class="nav-item nav-link">mon compte</a>
                @endif
                @if (auth()->user()->hasRole('admin'))
                    <a href="/admin" class="nav-item nav-link">mon compte</a>
                @endif
                @if (auth()->user()->hasRole('fournisseur'))
                    <a href="/is-admin" class="nav-item nav-link">mon compte</a>
                @endif
            @endauth
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="job-list.html" class="dropdown-item">Job List</a>
                    <a href="job-detail.html" class="dropdown-item">Job Detail</a>
                </div>
            </div> --}}
            @include("lang")
        </div>

        <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
