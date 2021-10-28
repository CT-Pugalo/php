@extends('template')
@section('title') Création d'une actualité @endsection
@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{url('news')}}" method="post">
    @csrf
    <div class="mb-3 row">
    <label for="title" class="col-sm-2 col-form-label @error('title') is invalid @enderror">Titre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}"
placeholder="Saisir le titre de l'actualité"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="message" class="col-sm-2 col-form-label @error('message') is invalid @enderror">Message</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="message" name="message" rows="3" value="{{ old('title') }}
placeholder="Saisir le message de l'actualité"></textarea>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="date" class="col-sm-2 col-form-label @error('date') is invalid @enderror">Date</label>
    <div class="col-sm-10">
      <input type="datetime-local" class="form-control" name="date" id="date" value="{{ old('title') }}
placeholder="Saisir la date de l'actualité"/>
    </div>
  </div>
  <div class="mb-3">
    <div class="offset-sm-2 col-sm-10">
    <button class="btn btn-primary mb-1 mr-1" type="submit">Ajouter</button>
    <a href="{{url('news')}}" class="btn btn-danger mb-1">Annuler</a>
  </div>
</form>
@endsection
