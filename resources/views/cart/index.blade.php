@extends('layouts.bootstrap')
@section('content')
<div class="container">
    <h1>Votre Panier</h1>
    @if(!empty($cart) && count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nom du produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] }} €</td>
                        <td>{{ $item['price'] * $item['quantity'] }} €</td>
                    </tr>
                    @php $total += $item['price'] * $item['quantity']; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total général</th>
                    <th>{{ $total }} €</th>
                </tr>


            </tfoot>
        </table>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection