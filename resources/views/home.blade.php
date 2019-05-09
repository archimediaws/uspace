@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mon Tableau de Bord</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Bienvenue <strong>{{$user->name}}</strong>,
                        vous êtes connecté sur votre compte Uspace !
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam aperiam at, blanditiis maxime minima tempore ullam! Accusamus consequuntur, ducimus impedit, ipsa laborum libero officiis sed sint suscipit tempore velit!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
