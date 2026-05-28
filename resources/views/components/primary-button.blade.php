<button {{ $attributes->merge(['type' => 'submit', 'class' => 'saas-btn-primary active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#4a69bd] focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
