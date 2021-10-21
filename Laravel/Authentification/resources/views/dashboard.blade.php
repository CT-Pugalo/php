@extends('template')
@guest
<script>
    window.location = "/";
  </script>
  @php
      exit();
  @endphp
@endguest
@section('titre')
Dashboard
@endsection
@section('content')
<div>
    <p>Bienvenue {{ Auth::user()->name }}</p>
</div>
@endsection
