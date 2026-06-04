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
                            class="btn btn-link p-0 text-decoration-none text-muted"
                            type="button"
                            id="profileDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()?->name ?? 'User' }}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown" style="z-index:2000;">
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    🚪 Logout
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>

        </div>


    </div>

</nav>