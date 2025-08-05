@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Ajouter un nouvel intervenant</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('intervenants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom complet *</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="theme" class="form-label">Thème/Spécialité</label>
                            <input type="text" class="form-control" id="theme" name="theme">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="poste" class="form-label">Poste/Fonction</label>
                            <input type="text" class="form-control" id="poste" name="poste">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Photo de profil</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="evenement_id" class="form-label">Événement associé</label>
                            <select class="form-select" id="evenement_id" name="evenement_id">
                                <option value="">Sélectionner un événement</option>
                                @foreach($evenements as $evenement)
                                    <option value="{{ $evenement->id }}">{{ $evenement->titre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('intervenants.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Créer l'intervenant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
