<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#00bbf0] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#0099cc] focus:bg-[#0099cc] active:bg-[#0099cc] focus:outline-none focus:ring-2 focus:ring-[#00bbf0] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

