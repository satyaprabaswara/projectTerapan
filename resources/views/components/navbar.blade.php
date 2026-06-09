<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm"
     style="height:70px;">

    <div class="container-fluid">

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

        <small class="text-muted"
               style="font-size:16px;">
            Sistem Dokumentasi Digitalisasi Divisi Finance
        </small>

    </div>

</div>
        <!-- User -->
    <div class="d-flex align-items-center">

        <div
            class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2"
            style="width:38px;height:38px">

            {{ strtoupper(substr(Auth::user()?->name ?? 'A',0,1)) }}

            </div>

            <div>

                <div class="dropdown">

                    <button
                        class="btn btn-link p-0 text-decoration-none text-dark fw-semibold dropdown-toggle"
                        type="button"
                        id="profileDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        {{ Auth::user()?->name ?? 'Admin' }}

                    </button>

                    <ul
                        class="dropdown-menu dropdown-menu-end shadow"
                        aria-labelledby="profileDropdown"
                        style="z-index:2000; min-width:220px;">

                        <li class="px-3 py-2">

                            <div class="fw-bold">
                                {{ Auth::user()?->name ?? 'Admin' }}
                            </div>

                            <small class="text-muted">
                                Administrator
                            </small>

                        </li>

                        <li>

                <a class="dropdown-item" href="{{ route('profile') }}">

                    <i class="bi bi-person me-2"></i>
                    Profile

                </a>

            </li>

            <li>

        <a class="dropdown-item" href="{{ route('settings') }}">

            <i class="bi bi-gear me-2"></i>
            Settings

        </a>

    </li>

                        <form method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="dropdown-item text-danger">

                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>