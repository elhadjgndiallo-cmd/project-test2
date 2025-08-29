
@extends('base')

@section('title', 'Créer un produit')

@section('content')
    <div class="container alert alert-success">

        <h3>
            Produit Crud
        </h3>

    </div>

    <div class="container mt-5">
    <h3>Créer un nouveau produit</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('produits.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du produit</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix de vente</label>
            <input type="number" step="0.01" name="prix_vente" class="form-control" required>
        </div>

    

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
        @can('ajouter')
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        @endcan
    </form>
</div>

@endsection