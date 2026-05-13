<x-guest-layout>

    <div class="dashboard-container">

        <div class="dashboard-panel register">

            <div class="dashboard-header">
                <h1>Register</h1>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="dashboard-group">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <div class="dashboard-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="dashboard-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <div class="dashboard-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required>
                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <div class="dashboard-group">
                    <button type="submit">Register</button>
                </div>

                <div style="text-align:center; margin-top:10px;">
                    <a href="{{ route('login') }}">Sudah punya akun?</a>
                </div>

            </form>

        </div>

    </div>

</x-guest-layout>