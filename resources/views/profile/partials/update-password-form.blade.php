<section class="space-y-6">
    <header class="border-b border-[#eef0f5] pb-4">
        <h3 class="text-lg font-bold text-[#1e2535]">
            {{ __('Keamanan Kata Sandi') }}
        </h3>
        <p class="mt-1 text-sm text-[#6b7794]">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk menjaga keamanan.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="space-y-5 max-w-xl">
            <!-- Current Password -->
            <div class="space-y-1">
                <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')" />
                <div class="relative">
                    <x-text-input id="update_password_current_password" name="current_password" type="password" class="block w-full" autocomplete="current-password" />
                </div>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
            </div>

            <!-- New Password -->
            <div class="space-y-1">
                <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" />
                <div class="relative">
                    <x-text-input id="update_password_password" name="password" type="password" class="block w-full" autocomplete="new-password" />
                </div>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-1">
                <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi Baru')" />
                <div class="relative">
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="block w-full" autocomplete="new-password" />
                </div>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-[#eef0f5]">
            <x-primary-button>{{ __('Perbarui Kata Sandi') }}</x-primary-button>

            @if (session('status') === 'password-updated')
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
