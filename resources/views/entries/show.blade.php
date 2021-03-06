@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{$entry->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $entry->content }}
                </div>

                <div class="card-footer">
                    Autor:
                    <a href="{{ url('@').$entry->user->username}}">{{ $entry->user->name}}</a>
                </div>
            </div>
            <!--@if($entry->user_id == auth()->id())
                <hr>
                <a href="{{ url('/entries/'.$entry->id.'/edit') }}" class="btn btn-primary">Editar Entrada</a>
            @endif-->
            @can('update', $entry)
                <hr>
                <a href="{{ url('/entries/'.$entry->id.'/edit') }}" class="btn btn-primary">Editar Entrada</a>
            @endcan
        </div>
    </div>
</div>
@endsection
