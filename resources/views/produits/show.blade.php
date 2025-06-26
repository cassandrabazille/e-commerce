@extends('layouts.bootstrap') {{-- Assure-toi que layouts.bootstrap existe --}}
@section('content')
<div class="container mt-5">
    <h1>Détail du produit</h1>

    <table class="table table-bordered mt-4">
        <thead class="table-primary">
            <tr>
                <th>Nom du produit</th>
                <th>Description</th>
                <th>Prix unitaire</th>
                <th>Image</th>
                <th>Catégorie</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $produit->name }}</td>
                <td>{{ $produit->description }}</td>
                <td>{{ $produit->price }} €</td>
                <td>
                    @if($produit->image)
                        <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->name }}" width="120">
                    @else
                        <em>Pas d'image</em>
                    @endif
                </td>
                <td>{{ $produit->categorie->name ?? 'Non catégorisé' }}</td>
            </tr>
        </tbody>
    </table>

    {{-- Lien retour --}}
    <a href="{{ route('produits.index') }}" class="btn btn-secondary mt-3">← Retour à la liste</a>
</div>
@endsection
