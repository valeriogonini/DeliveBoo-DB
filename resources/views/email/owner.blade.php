<x-mail::message>
    Nuovo ordine ricevuto

    Ecco un riepilogo dei dati dell'ordine:
    Nome: {{ $order['customer_name']}}
    Email: {{ $order['email'] }}
    Telefono: {{ $order['phone_number'] }}
    Indirizzo: {{$order['address']}}
    Prezzo: {{$order['total_price']}}


    Thanks,
    Team5 from Deliveboo
</x-mail::message>