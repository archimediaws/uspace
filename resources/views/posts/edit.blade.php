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

                        {{ __('Modifier cet article') }}

                        <button  type="submit" class="btn btn-primary float-right">
                            <a href="{{ route('posts.index') }}">
                                {{ __('Mes Articles') }}
                            </a>
                        </button>

                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.update',$post->id ) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')


                            {{--<div class="form-group row">--}}
                                {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>--}}

                                {{--<div class="col-md-6 fimg avatar">--}}
                                    {{--@if($post->fimg)--}}
                                        {{--<p class="text-center"> <img src="{{$post->fimg}}"/></p>--}}
                                    {{--@endif--}}
                                    {{--<input id="fimg" type="file" class="form-control" name="fimg"  >--}}

                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>

                                <div class="col-md-6">
                                    <input id="alias" type="text" class="form-control" name="alias" value="{{ $post->alias }}" >

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" >

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Contenu') }}</label>

                                <div class="col-md-6">
                                    <input id="contenu" type="text" class="form-control" name="contenu" value="{{ $post->contenu }}">

                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Categorie') }}</label>

                                <div class="col-md-6">
                                    {{--<input id="category_id" type="text" class="form-control" name="category_id">--}}
                                    <?php $selectedvalue = $post->category_id ?>
                                    <select class="form-control" name="category_id">
                                        @foreach($cat as $key => $value)
                                            <option value="{{$value->id}}" {{$selectedvalue == $value['id'] ? 'selected = "selected" ' : ''}}>{{$value->name}}</option>
                                        @endforeach
                                    </select>

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