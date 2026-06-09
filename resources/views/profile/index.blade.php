<x-app-layout>

<style>

.profile-header{
    height:280px;
    border-radius:20px 20px 0 0;
    overflow:hidden;
    position:relative;

    background:
        radial-gradient(circle at top left,
            rgba(255,255,255,.7),
            transparent 35%),

        radial-gradient(circle at bottom right,
            rgba(255,255,255,.6),
            transparent 40%),

        linear-gradient(
            135deg,
            #b9e8ff 0%,
            #eaf7ff 40%,
            #f8fbff 70%,
            #d9f0c5 100%
        );
}

.profile-header::before{
    content:'';
    position:absolute;
    width:150%;
    height:150%;
    top:-40%;
    left:-20%;

    background:
        repeating-radial-gradient(
            circle at center,
            transparent 0,
            transparent 25px,
            rgba(255,255,255,.15) 26px,
            rgba(255,255,255,.15) 30px
        );

    transform:rotate(-15deg);
}

.profile-avatar{
    width:120px;
    height:120px;
    border-radius:50%;
    background:white;
    color:#2563eb;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:48px;
    font-weight:bold;

    margin:auto;
    position:relative;
    top:40px;

    box-shadow:0 10px 25px rgba(0,0,0,.15);
}

.info-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.stat-box{
    background:#f8fafc;
    border-radius:15px;
    padding:20px;
    text-align:center;
    transition:.3s;
}

.stat-box:hover{
    transform:translateY(-3px);
}

.stat-box h4{
    margin:0;
    font-weight:700;
}

.stat-box small{
    color:#64748b;
}

.profile-name{
    margin-top:60px;
    text-align:center;
}

</style>

<div class="d-flex">

    @include('components.sidebar')

    <div class="container-fluid p-4">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card info-card">

                    <div class="profile-header">

                        <div class="profile-avatar">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A',0,1)) }}
                        </div>

                        <div class="profile-name">

                            <h2 class="fw-bold mb-1">
                                {{ Auth::user()->name }}
                            </h2>

                            <p class="text-muted mb-0">
                                {{ ucfirst(Auth::user()->role) }}
                            </p>

                        </div>

                    </div>

                    <div class="card-body p-5">

                        <div class="row mb-4">

                            <div class="col-md-4 mb-3">

                                <div class="stat-box">

                                    <h4>
                                        {{ ucfirst(Auth::user()->role) }}
                                    </h4>

                                    <small>Role</small>

                                </div>

                            </div>

                            <div class="col-md-4 mb-3">

                                <div class="stat-box">

                                    <h4>Aktif</h4>

                                    <small>Status</small>

                                </div>

                            </div>

                            <div class="col-md-4 mb-3">

                                <div class="stat-box">

                                    <h4>
                                        {{ optional(Auth::user()->created_at)->format('Y') ?? '-' }}
                                    </h4>

                                    <small>Bergabung</small>

                                </div>

                            </div>

                        </div>

                        <hr>

                        <h5 class="fw-bold mb-4">
                            Informasi Akun
                        </h5>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Nama Lengkap
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ Auth::user()->name }}"
                                    readonly>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Email
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ Auth::user()->email }}"
                                    readonly>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Role
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ ucfirst(Auth::user()->role) }}"
                                    readonly>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Bergabung Sejak
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ optional(Auth::user()->created_at)->format('d M Y') ?? '-' }}"
                                    readonly>

                            </div>

                        </div>

                        <div class="text-end mt-4">

                            <a href="{{ route('profile.edit') }}"
                               class="btn btn-primary">

                                Edit Profile

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>