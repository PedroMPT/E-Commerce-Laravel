@component('mail::message')
# Encomenda Enviada

Olá, {{ $order->name }}, a encomenda foi enviada para a sua morada:
{{ $order->address }}
com os seguintes produtos:
  {{ $order->cart }}


A pagar por: {{ $order->payment }}

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
