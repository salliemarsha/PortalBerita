<button {{ $attributes->merge(['type' => 'submit', 'class' => 'saas-btn-danger active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
