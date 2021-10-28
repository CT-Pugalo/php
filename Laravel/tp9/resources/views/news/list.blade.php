@extends('template')
@section('title') Les 10 dernières actualités @endsection
@section('content')
<form id="formLogout" action="{{url('/logout')}}" method="POST">
    @csrf
  </form>
  <div class="d-flex justify-content-center">
    <span>
    @auth
      <a href="{{route('news.create')}}" class="btn btn-sm btn-primary mb-2 mr-2">
        Création d'une nouvelle actualité
      </a>
      <button type="submit" form="formLogout" class="btn btn-sm btn-danger mb-2 mr-2">
        Déconnexion
      </button>
    @else
      <a href="{{ url('/login') }}" class="btn btn-sm btn-primary mb-2 mr-2">
        Connexion
      </a>
      <a href="{{ url('/register') }}" class="btn btn-sm btn-primary mb-2 mr-2">
        Création d'un compte
      </a>
    @endauth
    </span>
  </div>
  <ul class="list-group">
@foreach($newsList as $news)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <div class="col-lg-10">
        <span class="badge rounded-pill bg-primary">
          {{strftime('%d/%m/%Y', strtotime($news->date))}}
        </span>
        <strong>{{$news->title}}</strong>
        @if(strlen($news->message) > 50)
          {{substr($news->message, 0, 50)}}...
        @else
          {{$news->message}}
        @endif
        <br/>
        <em>par {{$news->user->name}}</em>
      </div>
      <div class="col">
        <a  href="{{route('news.show',  $news->id)}}"  class="btn  btn-sm  btn-primary  mb-
1">Consulter</a>
    @auth
        <a href="{{route('news.edit',$news->id)}}" class="btn btn-sm btn-primary mb-1">
    Editer
  </a>
  <form action="{{route('news.destroy', $news->id)}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
    @endauth
</form>
      </div>
    </li>
@endforeach
  </ul>
  <div class="d-flex justify-content-center">
    <a href="{{route('news.create')}}" class="btn btn-sm btn-primary mb-1">
      Création d'une nouvelle actualité
    </a>
  </div>
@endsection
