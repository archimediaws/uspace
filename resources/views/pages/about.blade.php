@extends("layouts.app")
@section('title', $title)
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!! $title !!}</div>

                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci alias aliquid autem consequuntur dicta dolor fugit illum iusto magni modi molestiae quae quaerat rem, sequi suscipit vero. Sed, sit.
                    <ul>
                        @forelse($numbers as $number)

                            <li>{{$number}}</li>
                            @empty
                            <li> aucun chiffre </li>

                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


