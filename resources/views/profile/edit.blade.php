<x-app-layout>

<div class="d-flex">

    @include('components.sidebar')

    <div class="container-fluid p-4">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow border-0 rounded-4">

                    <div class="card-body p-5">

                        <h2 class="fw-bold mb-2">
                            Edit Profile
                        </h2>

                        <p class="text-muted mb-4">
                            Kelola informasi akun anda
                        </p>

                        <!-- UPDATE PROFILE -->
                        <div class="mb-5">
                            @include('profile.partials.update-profile-information-form')
                        </div>

                        <hr>

                        <!-- UPDATE PASSWORD -->
                        <div class="my-5">
                            @include('profile.partials.update-password-form')
                        </div>

                        <hr>

                        <!-- DELETE ACCOUNT -->
                        <div class="mt-5">
                            @include('profile.partials.delete-user-form')
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>