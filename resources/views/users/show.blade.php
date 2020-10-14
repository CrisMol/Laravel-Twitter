@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">Tweets</div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{$user->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Entradas Publicadas</p>
                    <ul>
                        @foreach($entries as $entry)
                            <li>
                                <a href="{{ url('entries/'.$entry->id) }}">{{$entry->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection