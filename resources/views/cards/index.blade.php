@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="text-center text-uppercase m-4">{{ __('Mes Cartes') }}</div>

            @foreach($cards as $card)

                <div class="card card-margin-top" >
                        <div class="card-header">

                            @if($user)

                                @foreach($users as $userid)

                                    @if($userid->id === $card->user_id && $userid->avatar)
                                        <span><img src="{{$userid->avatar}}" style="width:10%; border-radius: 50%; margin-right:10px"/></span>

                                    @endif

                                @endforeach

                            @else
                                <span><img src="img/avatar_default.png" style="width:10%; border-radius: 50%; margin-right:10px"/></span>

                            @endif

                            <span class="text-uppercase align-content-center"> {{$card->title}}</span>
                            <button class="btn btn-outline-success btn-circle btn-lg float-right"><span> {{$card->id}}</span></button>

                        </div>

                        <div class="card-img-top">
                        <img class="img-fluid" src="img\bg2.jpg" alt=""/>
                        </div>

                        <div class="card-body">
                        <p class="text-left">{{$card->contenu}}</p>
                        </div>


                        @if ($card->user_id === 1)

                            <div class="row justify-content-between card-btn">
                                <div class="btn">
                                    <a href="{{ route('cards.update',$card->id)}}" class="btn btn-primary">Modifier</a>
                                </div>
                                <div class="btn">
                                    <form action="{{ route('cards.destroy', $card->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                    </form>
                                </div>

                            </div>
                        @endif
                </div>

            @endforeach

            </div>
        </div>
    </div>
@endsection