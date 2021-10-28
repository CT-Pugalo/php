@extends('template')
@section('title') Modifier une actualité @endsection
@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{url('news', $news->id)}}" method="post">
  @csrf
  @method('PUT')
  <div class="mb-3 row">
    <label for="title" class="col-sm-2 col-form-label">Titre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" id="title"
placeholder="Saisir le titre de l'actualité" value="{{$news->title}}"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="message" class="col-sm-2 col-form-label">Message</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="message" name="message" rows="3"
placeholder="Saisir le message de l'actualité">{{$news->message}}</textarea>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="date" class="col-sm-2 col-form-label">Date</label>
    <div class="col-sm-10">
      <input type="datetime-local" class="form-control" name="date" id="date"
placeholder="Saisir la date de l'actualité" value="{{date('Y-m-d\TH:i', strtotime($news->date))}}"/>
    </div>
  </div>
  <div class="mb-3">
    <div class="offset-sm-2 col-sm-10">
      <button class="btn btn-primary mb-1 mr-1" type="submit">Modifier</button>
      <a href="{{route('news.show',$news->id)}}" class="btn btn-danger mb-1">Annuler</a>
    </div>
  </div>
</form>
</div>
@endsection
