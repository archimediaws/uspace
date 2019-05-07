@if(session()->has('success'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        </div>
    </div>
@endif
