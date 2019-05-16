@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($apiflag === true)
             <div class="text-center text-uppercase m-4">{{ __('Toutes les Cartes') }}</div>
                @else
                <div class="text-center text-uppercase m-4">{{ __('Mes Cartes') }}</div>
            @endif


                @if($cards->isEmpty())
                    <div class="row justify-content-center">
                        <div class="col-8 text-center ">
                            <img class="img-fluid" src="img\bg2.jpg" alt=""/>
                            <div class="col-12">
                                <span> vous n'avez pas encore créé de cartes ! </span>
                            </div>
                            <div class="col-12">
                                <div class="btn">
                                    <a href="{{ route('cards.create')}}" class="btn btn-primary">Créer une carte</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


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
                                {{--<img class="img-fluid" src="img\bg2.jpg" alt=""/>--}}
                                    <img class="img-fluid" src="{{$card->fimg}}" alt=""/>
                                </div>

                                <div class="card-body">
                                <p class="text-left">{{$card->contenu}}</p>
                                </div>


                                @if ($card->user_id === $user->id)

                                    <div class="row justify-content-between card-btn">
                                        <div class="btn">
                                            <a href="{{ route('cards.edit',$card->id)}}" class="btn btn-primary">Modifier</a>
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