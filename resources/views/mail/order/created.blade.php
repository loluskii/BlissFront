@component('mail::message')
# Invoice - Bliss Store

Thank you for your purchase. Your order has been successfully placed. Please view below for the details of your subscription.

<b>Grocery Subscription</b>
<p><span style="font-weight: bold">Plan: </span> </p>


Total : {{ $order->grand_total }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
