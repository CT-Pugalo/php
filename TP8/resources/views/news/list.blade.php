@extends('template')
@section('title') Les 10 dernières actualités @endsection
@section('content')
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
      </div>
      <div class="col">
        <a  href="{{route('news.show',  $news->id)}}"  class="btn  btn-sm  btn-primary  mb-
1">Consulter</a>
        <a href="{{route('news.edit',$news->id)}}" class="btn btn-sm btn-primary mb-1">
    Editer
  </a>
  <form action="{{route('news.destroy', $news->id)}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
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
