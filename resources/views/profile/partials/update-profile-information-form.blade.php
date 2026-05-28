<section class="space-y-6">
    <header class="border-b border-[#eef0f5] pb-4">
        <h3 class="text-lg font-bold text-[#1e2535]">
            {{ __('Informasi Profil') }}
        </h3>
        <p class="mt-1 text-sm text-[#6b7794]">
            {{ __("Perbarui informasi profil akun dan alamat email Anda untuk tetap terhubung.") }}
        </p>
    </header>

    <!-- Hidden form for sending email verification link -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Full-Width Responsive Inputs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name Input Group -->
            <div class="space-y-1">
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <div class="relative">
                    <x-text-input id="name" name="name" type="text" class="block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                </div>
                <x-input-error class="mt-1" :messages="$errors->get('name')" />
            </div>

            <!-- Email Input Group -->
            <div class="space-y-1">
                <x-input-label for="email" :value="__('Alamat Email')" />
                <div class="relative">
                    <x-text-input id="email" name="email" type="email" class="block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                </div>
                <x-input-error class="mt-1" :messages="$errors->get('email')" />

                <!-- Verification Handler -->
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-3 p-3 bg-amber-50 rounded-lg border border-amber-200">
                        <p class="text-xs text-amber-800 flex items-center gap-1.5 font-medium">
                            <svg class="w-4 h-4 text-amber-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ __('Alamat email Anda belum terverifikasi.') }}
                        </p>
                        <button form="send-verification" class="mt-2 text-xs font-semibold text-[#3d5a9e] underline hover:text-[#192a56] transition-colors focus:outline-none">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-xs font-semibold text-green-600 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                {{ __('Link verifikasi baru telah dikirim ke alamat email Anda.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-[#eef0f5]">
            <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-1.5 text-sm font-semibold text-green-600 bg-green-50 px-3 py-1.5 rounded-full border border-green-200"
                >
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    {{ __('Berhasil disimpan.') }}
                </div>
            @endif
        </div>
    </form>
</section>
