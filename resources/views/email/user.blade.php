<x-mail::message>
    Il tuo ordine é stato creato

    Prepara la tavola!
    Il tuo ordine di Deliveboo sta arrivando!
    Ecco un riepilogo dei dati che hai inserito:
    Nome:{{$order['customer_name']}}
    Email: {{ $order['email'] }}
    Telefono: {{ $order['phone_number'] }}
    Indirizzo: {{$order['address']}}
    Prezzo: {{$order['total_price']}}



    Thanks,
    Team5 from Deliveboo
</x-mail::message>