<button {{ $attributes->merge(['type' => 'button', 'class' => 'saas-btn-secondary active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#4a69bd] focus:ring-offset-2 disabled:opacity-50']) }}>
    {{ $slot }}
</button>
