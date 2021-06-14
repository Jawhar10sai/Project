@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-6 text-center">
      {{ $etudiant->nom_etudiant }} - {{ $etudiant->prenom_etudiant }}
    </div>
  </div>
</div>
@endsection
