@extends('layouts.template')
@section('content')

<div class="card">
  <div class="card-header">Ajouter un article</div>
  <div class="card-body">

    <form action="{{ url('/admin/create') }}" method="post">
      {!! csrf_field() !!}
      <label>Nom</label></br>
      <input type="text" name="nom" placeholder="Nom de la plante" id="name" class="form-control"></br>
      <label>description</label></br>
      <input type="text" name="description" placeholder="Ajouter une description" class="form-control"></br>
      <label>prix</label></br>
      <input type="text" name="prix" placeholder="Indiquer un prix" class="form-control"></br>
      <label>image</label></br>
      <input type="text" name="image" placeholder="Lien de l'image" class="form-control"></br>
      <input type="submit" value="Ajouter" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop