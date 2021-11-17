@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark">
                  Tarefas Concluídas de {{Auth::user()->name}}
                </div>

                <div class="card-body">

                 @if ($tarefas->isEmpty())
                  <div class="alert alert-dark" role="alert">
                    <ion-icon name="close-outline" class="align-middle"></ion-icon>
                    Não existem tarefas concluídas. <strong><hr> Olha lá, cuidado com os prazos hein?</strong> 
                  </div>
                  
                 @else
                    @isset ($msg)
                      <div class="alert alert-success" role="alert">
                        <ion-icon name="checkmark-outline" class="align-middle"></ion-icon>
                        {{$msg}} 
                      </div>                 
                    @endisset

                  <table class="table table-striped table-responsive text-center">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tarefa</th>
                        <th scope="col">Data de Conclusão</th>
                        <th>Restaurar</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarefas as $key => $tarefa)
                            <tr>
                                <th scope="row">{{$tarefa->id}}</th>
                                <td>{{$tarefa->tarefa}}</td>
                                <td>{{date('d/m/Y',strtotime($tarefa->deleted_at))}}</td>
                                <td>
                                    <form method="POST" id="form_{{$tarefa->id}}" action="{{route('tarefa.restore',$tarefa->id)}}">
                                        @csrf
                                    </form>
                                    <a href="#" onclick="document.getElementById('form_{{$tarefa->id}}').submit()"><ion-icon name="refresh-outline" class="icon-finish"></ion-icon></a>
                                </td>
                            </tr>
                        @endforeach                          
                    </tbody>
                  </table>

                  <nav class="py-4">
                    <ul class="pagination d-flex justify-content-center">
                      <li class="page-item"><a class="page-link" href="{{$tarefas->previousPageUrl()}}">Voltar</a></li>
                      @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                        <li class="page-item {{$tarefas->currentPage() == $i ? 'active' : ''}}">
                            <a class="page-link" href="{{$tarefas->url($i)}}">{{$i}}</a>
                        </li>
                      @endfor                          
                      <li class="page-item"><a class="page-link" href="{{$tarefas->nextPageUrl()}}">Avançar</a></li>
                    </ul>
                  </nav>

                 @endif                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
