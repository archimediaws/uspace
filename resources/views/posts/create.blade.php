@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                            {{ __('Créer un article') }}

                            <button  type="submit" class="btn btn-primary float-right">
                                <a href="{{ route('posts.index') }}">
                                    {{ __('Voir Mes Articles') }}
                                </a>
                            </button>

                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            {{--@method('PUT')--}}

                            {{--<div class="form-group row">--}}
                                {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>--}}

                                {{--<div class="col-md-6 avatar">--}}
                                    {{--<input id="fimg" type="file" class="form-control" name="fimg"  >--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('slug') }}</label>

                                <div class="col-md-6">
                                    <input id="alias" type="text" class="form-control" name="alias" >

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

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Categorie') }}</label>

                                <div class="col-md-6">
                                    {{--<input id="category_id" type="text" class="form-control" name="category_id">--}}
                                    <select class="form-control" name="category_id">
                                        @foreach($cat as $key => $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>

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
