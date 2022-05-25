@extends('layouts.template')
@section('content')

<div class="card">
  <div class="card-header">Editer un article</div>
  <div class="card-body">

    <form action="{{ url('/admin/edit/' .$articles->id) }}" method="POST">
      @csrf
      <input type="hidden" name="id" id="id" value="{{$articles->id}}" id="id" />
      <label>Nom</label></br>
      <input type="text" name="nom" id="nom" value="{{$articles->nom}}" class="form-control"></br>
      <label>description</label></br>
      <input type="text" name="description" id="description" value="{{$articles->description}}" class="form-control"></br>
      <label>prix</label></br>
      <input type="text" name="prix" id="prix" value="{{$articles->prix}}" class="form-control"></br>
      <label>image</label></br>
      <input type="text" name="image" id="image" value="{{$articles->image}}" class="form-control"></br>
      <input type="submit" value="Editer" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop