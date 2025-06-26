<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de tous les produits</title>
</head>

<body>
    <h1>Tous les produits</h1>
    <ul>
        @foreach($produits as $produit)
            <li>
                <a href="{{ route('produit.show', $produit->id) }}">
                 <strong>{{ $produit->name }}</strong> – {{ $produit->description }}
                </a>

                <form action="{{ route('produit.valider', $produit->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Valider</button>
                </form>
            </li>

        @endforeach
        <br><br>
    </ul>
</body>

</html>