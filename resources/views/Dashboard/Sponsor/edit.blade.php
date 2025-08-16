<div class="modal fade" id="editSponsorModal{{ $sponsor->id }}" tabindex="-1" aria-labelledby="editSponsorModalLabel{{ $sponsor->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('sponsors.update', $sponsor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSponsorModalLabel{{ $sponsor->id }}">Modifier {{ $sponsor->nom }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="evenement_id" class="form-label">Événement</label>
                        <select class="form-control" id="evenement_id" name="evenement_id" required>
                            @foreach($evenements as $evenement)
                                <option value="{{ $evenement->id }}" {{ $sponsor->evenement_id == $evenement->id ? 'selected' : '' }}>
                                    {{ $evenement->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du sponsor</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $sponsor->nom }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="promoteur" class="form-label">Promoteur</label>
                        <input type="text" class="form-control" id="promoteur" name="promoteur" value="{{ $sponsor->promoteur }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $sponsor->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        @if($sponsor->logo)
                            <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo actuel" class="img-thumbnail d-block mb-2" style="width: 80px;">
                        @endif
                        <input type="file" class="form-control" id="logo" name="logo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Mettre à jour</button>
                </div>
            </div>
        </form>
    </div>
</div>