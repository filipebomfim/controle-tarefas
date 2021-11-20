@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center py-4">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-dark">
                  Tarefas de {{$tarefas->first()->user->name}}
                </div>

                <div class="card-body">
                    @component('tarefas._components.table_create', [
                      'tarefas'=>$tarefas
                    ])                        
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
