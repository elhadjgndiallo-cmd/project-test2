@extends('base')

@section('title', 'Modifier un produit')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-primary">
        Modifier un produit: {{ $produit->nom}}
    </h1>
    

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
        @method('PUT')
        @csrf


        <div class="mb-3">
            <label for="nom" class="form-label">Nom du produit</label>
            <input type="text" name="nom" id="nom" class="form-control"  value="{{ $produit->nom }}">
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix de vente</label>
            <input type="number" step="0.01" name="prix_vente" class="form-control"  value="{{ $produit->prix_vente }}" required>
        </div>

    

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4"  required>{{ $produit->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection