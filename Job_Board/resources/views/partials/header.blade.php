<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">JobBoard</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
            <a href="{{ url('/about') }}" class="nav-item nav-link">Sobre</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="{{ url('/jobs') }}" class="dropdown-item">Job List</a>
                    <!-- <a href="{{ url('/job-detail') }}" class="dropdown-item">Job Detail</a> -->
                </div>
                
            </div>
            <a href="{{ url('/contact') }}" class="nav-item nav-link">Contacto</a>
            <a class="nav-link" href="{{ route('companies.index') }}">Empresas</a>
        </div>
        <a href="{{ url('/jobs/create') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Abra Uma Vaga<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
