<x-mail::message>
# Thanks for your purchase!

Here is your license key for **{{ $order->product->name }}**:

<x-mail::panel>
{{ $order->licenseKey->key_value }}
</x-mail::panel>

Keep this key somewhere safe — you can also view it any time from your account dashboard.

<x-mail::button :url="route('dashboard')">
View My Licenses
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
