@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-header mb-4">Entradas</div>

                    @foreach($entries as $entry)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-header">
                                    <h2>{{$entry->id}}. {{ $entry->title }}</h2>
                                </div>
                                <div class="card-body">
                                    <p>{{ $entry->content }}</p>
                                </div>
                                <div class="card-footer">
                                    <a href=" {{url('users/'.$entry->user_id)}} ">Autor: {{ $entry->user->name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $entries->links() }}
        </div>
    </div>
</div>
@endsection
