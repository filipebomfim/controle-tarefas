@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-4">
        <div class="col-md-8">
          @component('tarefas._components.form',[
            'titulo' => 'Atualizar Tarefa',
            'tarefa'=>$tarefa,
            'errors'=>$errors,
            'botao'=>'Atualizar',
          ])                
          @endcomponent
        </div>
    </div>
</div>
@endsection
