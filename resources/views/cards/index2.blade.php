@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Mes Cartes</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>N°</td>
                    <td>Titre</td>
                    <td>Contenu</td>

                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($cards as $card)
                    <tr>
                        <td>{{$card->id}}</td>
                        <td>{{$card->title}}</td>
                        <td>{{$card->contenu}}</td>

                        <td>
                            <a href="{{ route('cards.edit',$card->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('cards.destroy', $card->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection