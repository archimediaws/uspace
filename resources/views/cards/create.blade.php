@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                            {{ __('Créer une carte') }}

                            <button  type="submit" class="btn btn-primary float-right">
                                <a href="{{ route('cards.index') }}">
                                    {{ __('Voir Mes Cartes') }}
                                </a>
                            </button>

                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cards.store') }}" enctype="multipart/form-data">
                            @csrf
                            {{--@method('PUT')--}}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6 avatar">
                                    <input id="fimg" type="file" class="form-control" name="fimg"  >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" >

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Contenu') }}</label>

                                <div class="col-md-6">
                                    <input id="contenu" type="text" class="form-control" name="contenu">

                                </div>

                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Créer') }}
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
