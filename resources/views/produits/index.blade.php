@extends('layouts.bootstrap')

@section('title', 'Tous les produits')

@section('content')
    @forelse($produits as $produit)
        <div class="col">
            <div class="card h-100 shadow-sm">
                @if($produit->image_url)
                    <img src="{{ asset('storage/' . $produit->image_url) }}" class="card-img-top" alt="{{ $produit->name }}">
                @else
                    <img src="https://via.placeholder.com/300x200?text=Produit+Sans+Image" class="card-img-top" alt="{{ $produit->name }}">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $produit->name }}</h5>
                    <p class="card-text text-truncate">{{ Str::limit($produit->description, 80) }}</p>
                    <div class="mt-auto">
                        <p class="h6 fw-bold text-primary">{{ number_format($produit->price, 2, ',', ' ') }} €</p>

                        <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-sm btn-outline-primary w-100 mb-2">Voir le produit</a>
                        
                        <form action="{{ route('cart.add', $produit->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success w-100">Ajouter au panier</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">Aucun produit disponible.</div>
        </div>
    @endforelse
@endsection
