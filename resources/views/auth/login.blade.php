<x-guest-layout>

<div class="dashboard-container">

    <div class="dashboard-panel login">

        <div class="dashboard-header">
            <h1>Login</h1>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

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
                <button type="submit">Login</button>
            </div>

        </form>

    </div>

    <div class="dashboard-panel register">

        <div class="dashboard-header">
            <h1>Register</h1>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="dashboard-group">
                <label>Nama</label>
                <input type="text" name="name" required>
            </div>

            <div class="dashboard-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="dashboard-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="dashboard-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <div class="dashboard-group">
                <button type="submit">Register</button>
            </div>

        </form>

    </div>

    <div class="switch-panel">
        <p>Belum punya akun?</p>
        <button class="open-btn">Register</button>
        <p>Sudah punya akun?</p>
        <button class="close-btn">Login</button>
    </div>

</div>

</x-guest-layout>