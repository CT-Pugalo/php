@extends('template')
@section('title') Affichage d'une actualité @endsection
@section('content')
<i>{{strftime('%d/%m/%Y', strtotime($news->date))}}</i>
<strong>{{$news->title}}</strong>
{{$news->message}}<br/>
<a href="{{url('news/')}}">Retour à la liste</a>
@endsection
