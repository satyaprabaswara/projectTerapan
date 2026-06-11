<nav class="navbar bg-white border-bottom shadow-sm" style="height:70px; position: sticky; top: 0; z-index: 30;">

    <div class="container-fluid px-2 px-lg-3">

        <!-- Logo -->
        <div class="d-flex align-items-center">

            <img src="{{ asset('images/Logo2.png') }}"
                 alt="Logo PT SPR Langgak"
                 style="width:50px;height:50px;object-fit:contain;"
                 class="me-3">

            <div class="d-flex flex-column justify-content-center"
                 style="line-height:1.1;">

                <h5 class="fw-bold mb-0 fs-6 fs-lg-5">
                    PT SPR Langgak
                </h5>

                <small class="text-muted d-none d-md-inline"
                       style="font-size:16px;">
                    Sistem Dokumentasi Digitalisasi Divisi Finance
                </small>

            </div>

        </div>

        <!-- User Dropdown -->
        <div class="d-flex align-items-center">

            <!-- Avatar -->
            <div
                class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2"
                style="width:38px;height:38px">

                {{ strtoupper(substr(Auth::user()?->name ?? 'A',0,1)) }}

            </div>

            <!-- Dropdown -->
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
                    style="min-width:220px;">

                    <li class="px-3 py-2">

                        <div class="fw-bold">
                            {{ Auth::user()?->name ?? 'Admin' }}
                        </div>

                        <small class="text-muted">
                            Administrator
                        </small>

                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item"
                           href="{{ route('profile') }}">

                            <i class="bi bi-person me-2"></i>
                            Profile

                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item"
                           href="{{ route('settings') }}">

                            <i class="bi bi-gear me-2"></i>
                            Settings

                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>

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
