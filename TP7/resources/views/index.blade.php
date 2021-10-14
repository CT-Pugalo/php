@extends('template')
@section('titrePage')
    News
@endsection
@section('content')
    <div>
        <?php
        use App\Models\NewsModel;
        foreach (NewsModel::all() as $news) {
            echo "{$news->Titre}";
            echo "{$news->Contenu}";
        }
        ?>
    </div>
@endsection
