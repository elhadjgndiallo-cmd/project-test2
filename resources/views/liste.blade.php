@extends('base')

@section('title', 'Liste des produits')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="mb-4">Liste des produits</h1>
        </div>
                <div class="col-auto">
            @can('ajouter')
            <a href="{{ route('produits.create') }}" class="btn btn-primary">Ajouter un produit</a>
            @endcan
        </div>

    </div>

    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom du produit</th>
                <th>Prix de vente</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           

            @foreach($produits as $produit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->prix_vente }}</td>
                    <td>{{ $produit->description }}</td>
                    <td>
                        @can('modifier')
                        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        @endcan
                        <form onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');"
                        action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            @can('supprimer')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            @endcan
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
