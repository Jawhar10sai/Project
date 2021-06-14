@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>Liste des etudiants</h3>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary offset-xs-10" data-toggle="modal" data-target="#ajouterEtudiant">+</button>

    <!-- Modal -->
    <div class="modal fade" id="ajouterEtudiant" tabindex="-1" role="dialog" aria-labelledby="ajouterEtudiantLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ajouterEtudiantLabel">Ajouter etudiant</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="/etudiants" method="post" autocomplete="off">
              @csrf
              <div class="form-group">
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom" value="">
              </div>
              <div class="form-group">
                <label for="">Prenom</label>
                <input type="text" class="form-control" name="prenom" value="">
              </div>
              <div class="form-group">
                <label for="">Date de naissance</label>
                <input type="date" class="form-control" name="datenaiss" value="">
              </div>
              <div class="form-group">
                <label for="">Matricule</label>
                <input type="text" class="form-control" name="matricule" value="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      <table class="table">
        <tr>
          <th>#</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Date de naissance</th>
          <th>Matricule</th>
          <th>Actions</th>
        </tr>
        @foreach ($etudiants as $etudiant)
        <tr>
          <td>{{ $etudiant->id }}</td>
          <td>{{ $etudiant->nom_etudiant }}</td>
          <td>{{ $etudiant->prenom_etudiant }}</td>
          <td>{{ $etudiant->date_naisssance }}</td>
          <td>{{ $etudiant->matricule_etudiant }}</td>
          <td>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModifierEtudiant{{ $etudiant->id }}">update</button>

                <!-- Modal -->
                <div class="modal fade" id="ModifierEtudiant{{ $etudiant->id }}" tabindex="-1" role="dialog" aria-labelledby="ajouterEtudiantLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ajouterEtudiantLabel">Modifier etudiant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="" action="/etudiants/{{ $etudiant->id }}" method="post" autocomplete="off">
                          @csrf
                          @method('put')
                          <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" name="nom" value="{{ $etudiant->nom_etudiant }}">
                          </div>
                          <div class="form-group">
                            <label for="">Prenom</label>
                            <input type="text" class="form-control" name="prenom" value="{{ $etudiant->prenom_etudiant }}">
                          </div>
                          <div class="form-group">
                            <label for="">Date de naissance</label>
                            <input type="date" class="form-control" name="datenaiss" value="{{ date('m/d/Y',strtotime($etudiant->date_naisssance)) }}">
                          </div>
                          <div class="form-group">
                            <label for="">Matricule</label>
                            <input type="text" class="form-control" name="matricule" value="{{ $etudiant->matricule_etudiant }}">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Valider la modification</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">
      @foreach($modules as $module)
        <h4>{{ $module->module_lib }}</h4>
        <ul>
          @foreach($module->inscription as $inscription)
                    <li>{{ $inscription->etudiant->nom_etudiant }}</li>
          @endforeach
        </ul>
      @endforeach
    </div>
  </div>
</div>
@endsection
