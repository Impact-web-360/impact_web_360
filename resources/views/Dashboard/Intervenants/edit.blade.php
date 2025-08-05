@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Modifier l'intervenant</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('intervenants.update', $intervenant->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom complet *</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $intervenant->nom }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $intervenant->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="theme" class="form-label">Thème/Spécialité</label>
                            <input type="text" class="form-control" id="theme" name="theme" value="{{ $intervenant->theme }}">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $intervenant->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="poste" class="form-label">Poste/Fonction</label>
                            <input type="text" class="form-control" id="poste" name="poste" value="{{ $intervenant->poste }}">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Photo de profil</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            @if($intervenant->image)
                                <img src="{{ asset('storage/' . $intervenant->image) }}" alt="Photo actuelle" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="evenement_id" class="form-label">Événement associé</label>
                            <select class="form-select" id="evenement_id" name="evenement_id">
                                <option value="">Sélectionner un événement</option>
                                @foreach($evenements as $evenement)
                                    <option value="{{ $evenement->id }}" {{ $intervenant->evenement_id == $evenement->id ? 'selected' : '' }}>
                                        {{ $evenement->titre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('intervenants.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-warning">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
