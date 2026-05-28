<section class="space-y-6">
    <header class="border-b border-red-100 pb-4">
        <h3 class="text-lg font-bold text-red-600 flex items-center gap-2">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
            {{ __('Zona Bahaya: Hapus Akun') }}
        </h3>
        <p class="mt-1 text-sm text-[#6b7794]">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan data di dalamnya akan dihapus secara permanen.') }}
        </p>
    </header>

    <!-- Danger Warning Card -->
    <div class="p-4 bg-red-50 border border-red-200 rounded-xl space-y-4">
        <div class="flex gap-3">
            <div class="flex-shrink-0 text-red-500 mt-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <div>
                <h4 class="text-sm font-bold text-red-800">Tindakan ini tidak dapat dibatalkan</h4>
                <p class="text-xs text-red-700 mt-1 leading-relaxed">
                    Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan. Proses ini tidak dapat dipulihkan kembali.
                </p>
            </div>
        </div>
        
        <div>
            <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="saas-btn-danger"
            >
                {{ __('Hapus Akun Saya') }}
            </x-danger-button>
        </div>
    </div>

    <!-- Beautiful Modern Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('delete')

            <div class="border-b border-[#eef0f5] pb-4">
                <h3 class="text-xl font-bold text-[#1e2535]">
                    {{ __('Konfirmasi Penghapusan Akun') }}
                </h3>
                <p class="mt-1 text-sm text-[#6b7794]">
                    {{ __('Apakah Anda yakin ingin menghapus akun Anda secara permanen?') }}
                </p>
            </div>

            <div class="p-4 bg-amber-50 border border-amber-200 rounded-lg text-xs text-amber-800 leading-relaxed">
                {{ __('Setelah dihapus, seluruh artikel yang telah dipublikasikan dan data profil Anda akan dihapus secara permanen dari server kami. Harap masukkan kata sandi Anda untuk mengonfirmasi tindakan ini.') }}
            </div>

            <!-- Password Input -->
            <div class="space-y-1">
                <x-input-label for="password" value="{{ __('Kata Sandi Akun') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full sm:w-3/4"
                    placeholder="{{ __('Masukkan Kata Sandi Anda') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-1" />
            </div>

            <!-- Modal Action Buttons -->
            <div class="flex justify-end gap-3 pt-4 border-t border-[#eef0f5]">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batalkan') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Hapus Permanen') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
