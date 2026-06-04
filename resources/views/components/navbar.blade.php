<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm"
     style="height:70px;">

    <div class="container-fluid">

        <!-- Logo -->
<div class="d-flex align-items-center">

    <img src="{{ asset('images/Logo2.png') }}"
         alt="Logo PT SPR Langgak"
         style="
            width:38px;
            height:38px;
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

            <span class="me-4">
                🔔
            </span>

            <div
                class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2"
                style="width:38px;height:38px">

                {{ strtoupper(substr(Auth::user()?->name ?? 'A',0,1)) }}

            </div>

            <div>

                <div class="fw-semibold">
                    {{ Auth::user()?->name ?? 'Admin' }}
                </div>

                <small class="text-muted">
                    Administrator
                </small>

            </div>

        </div>

    </div>

</nav>