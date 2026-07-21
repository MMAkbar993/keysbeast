@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-neutral-900 border-neutral-700 text-white placeholder-neutral-500 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm']) }}>
