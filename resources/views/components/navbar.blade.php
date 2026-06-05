<nav class="navbar bg-white border-bottom shadow-sm"
     style="height:70px;">

    <div class="container-fluid px-2 px-lg-3">

        <!-- Logo -->
<div class="d-flex align-items-center">

    <img src="{{ asset('images/Logo2.png') }}"
         alt="Logo PT SPR Langgak"
         style="
            width:50px;
            height:50px;
            object-fit:contain;
         "
         class="me-3">

    <div class="d-flex flex-column justify-content-center"
         style="line-height:1.1;">

        <h5 class="fw-bold mb-0">
            PT SPR Langgak
        </h5>

        <small class="text-muted d-none d-md-inline"
               style="font-size:16px;">
            Sistem Dokumentasi Digitalisasi Divisi Finance
        </small>

    </div>

</div>
        <!-- User -->
        <div class="d-flex align-items-center justify-content-end flex-grow-1">

            <div
                class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2"
                style="width:38px;height:38px">

                {{ strtoupper(substr(Auth::user()?->name ?? 'A',0,1)) }}

            </div>

                <div>

                    <div class="dropdown">
                        <button
                            class="btn btn-link p-0 text-decoration-none text-muted"
                            type="button"
                            id="profileDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()?->name ?? 'User' }}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown" style="z-index:2000;">
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                                    @csrf
                                </form>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    🚪 Logout
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

        </div>


    </div>

</nav>