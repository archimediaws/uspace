@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">


            @if($flag === true)
                <div class="text-center text-uppercase m-4">{{ __('Tous les Articles') }}</div>
            @else
                <div class="text-center text-uppercase m-4">{{ __('Mes Articles') }}</div>
            @endif

                @if($posts->isEmpty())
                    <div class="row justify-content-center">
                        <div class="col-8 text-center ">
                            <img class="img-fluid" src="img\bg2.jpg" alt=""/>
                            <div class="col-12">
                                <span> vous n'avez pas d'article ! </span>
                            </div>
                            <div class="col-12">
                                <div class="btn">
                                    <a href="{{ route('posts.create')}}" class="btn btn-primary">Créer un article</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                    @foreach($posts as $post)

                        <div class="card card-margin-top" >
                                <div class="card-header">

                                    @if($user)

                                        @foreach($users as $userid)

                                            @if($userid->id === $post->user_id && $userid->avatar)
                                                <span><img src="{{$userid->avatar}}" style="width:10%; border-radius: 50%; margin-right:10px"/></span>

                                            @endif

                                        @endforeach

                                    @else
                                        <span><img src="img/avatar_default.png" style="width:10%; border-radius: 50%; margin-right:10px"/></span>

                                    @endif



                                            <span class="text-uppercase align-content-center"> {{$post->title}}</span>

                                                {{--@if($post->category['id']=== 1)--}}
                                                {{--<button class="btn btn-outline-danger btn-circle btn-lg float-right"><span> {{$post->category['name']}}</span></button>--}}
                                                    {{--@elseif($post->category['id']=== 2)--}}
                                                    {{--<button class="btn btn-outline-success btn-circle btn-lg float-right"><span> {{$post->category['name']}}</span></button>--}}

                                                {{--@endif--}}

                                        <div class="row m-2" style="display:none;">
                                            <span class=" align-content-right font-italic"> {{$post->alias}}</span>
                                        </div>

                                </div>


                            <div class="row">
                                <div class="col-md-6 col-sm-8 card-margin-top post-margin">
                                    <div class="card-img-top padding-img-post">
                                    <img class="img-fluid" src="img\bg2.jpg" alt=""/>
                                        {{--<img class="img-fluid" src="{{$card->fimg}}" alt=""/>--}}

                                        @if($post->category['id']=== 1)
                                            <button class="btn btn-outline-danger btn-circle btn-lg float-left btn-sm"><span> {{$post->category['name']}}</span></button>
                                        @elseif($post->category['id']=== 2)
                                            <button class="btn btn-outline-success btn-circle btn-lg float-left btn-sm"><span> {{$post->category['name']}}</span></button>

                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-8">
                                    <div class="card-body">
                                    <p class="text-left">{{$post->contenu}}</p>
                                    </div>

                                </div>
                            </div>

                                @if ($post->user_id === $user->id)

                                    <div class="row justify-content-between card-btn">
                                        <div class="btn">
                                            <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">Modifier</a>
                                        </div>
                                        <div class="btn">
                                            <form action="{{ route('posts.destroy', $post->id)}}" method="post">
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