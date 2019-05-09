@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Vous êtes connecté !
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam aperiam at, blanditiis maxime minima tempore ullam! Accusamus consequuntur, ducimus impedit, ipsa laborum libero officiis sed sint suscipit tempore velit!
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
