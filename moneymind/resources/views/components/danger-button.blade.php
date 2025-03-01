<button {{ $attributes->merge(['type' => 'submit', 'style' => 'font-weight: 600; font-family: Poppins, sans-serif; color: white; background-color: #ff1a1a; border: 1px solid ##ff1a1a; box-shadow: 5px 5px black; padding: 5px 20px; border-radius: 5px; transition: transform 0.15s ease-in-out;', 'onmouseover' => "this.style.transform='scale(1.1)'", 'onmouseout' => "this.style.transform='scale(1)'"]) }}>
    {{ $slot }}
</button>
