@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">

                        {{ __('Modifier la  carte') }}

                        <button  type="submit" class="btn btn-primary float-right">
                            <a href="{{ route('cards.index') }}">
                                {{ __('Mes Cartes') }}
                            </a>
                        </button>

                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cards.update',$card->id ) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6 fimg avatar">
                                    @if($card->fimg)
                                        <p class="text-center"> <img src="{{$card->fimg}}"/></p>
                                    @endif
                                    <input id="fimg" type="file" class="form-control" name="fimg"  >

                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $card->title }}" >

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Contenu') }}</label>

                                <div class="col-md-6">
                                    <input id="contenu" type="text" class="form-control" name="contenu" value="{{ $card->contenu }}">

                                </div>

                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Modifier') }}
                                    </button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection