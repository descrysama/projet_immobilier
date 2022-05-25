@extends('layouts.template')
@section('content')

<div class="container">
    @if (Auth::user())
    <h3>Bonjour Admin {{Auth::user()->name}}</h3>
    @endif
    <a href="{{ url('/admin/create') }}"><i class="fa-solid fa-circle-plus"></i></a>

    <div class="d-flex justify-content-evenly">
        <div class="row d-flex justify-content-center">
            @foreach ($articles as $article)
            <div class="col-md-3 col-12 col-lg-3 m-2 d-flex justify-content-center">
                <div class="card">
                    <a href="{{ url('/admin/edit' , $article->id) }}"><img src="{{$article -> image}}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <div class="d-flex">
                            <h6 class="card-title">{{$article -> nom}}</h6>
                            <div class="d-flex justify-content-end ms-auto">
                                <h6 class="card-title">{{$article -> prix}}€</h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end ms-auto">
                            <form method="POST" action="{{ url('/admin/delete' , $article->id) }}" style="display:inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection