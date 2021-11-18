@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-4">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-dark">
                  Tarefas de {{Auth::user()->name}}
                </div>

                <div class="card-body">

                 @if ($tarefas->isEmpty())
                  <div class="alert alert-dark" role="alert">
                    <ion-icon name="close-outline" class="align-middle"></ion-icon>
                    Não existem tarefas cadastradas. <strong><hr> Hora de se organizar hein?</strong> 
                  </div>
                  
                 @else
                    @isset ($msg)
                      <div class="alert alert-success" role="alert">
                        <ion-icon name="checkmark-outline" class="align-middle"></ion-icon>
                        {{$msg}} 
                      </div>                 
                    @endisset
                  
                  <div class="table-responsive">
                    <table class="table table-hover text-center">
                      <thead>
                        <tr>
                          <th scope="col">Tarefa</th>
                          <th scope="col">Data Limite Conclusão</th>
                          <th>Editar</th>
                          <th>Excluir</th>
                          <th>Concluir</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($tarefas as $key => $tarefa)
                              <tr>
                                  <td>{{$tarefa->tarefa}}</td>
                                  <td>{{date('d/m/Y',strtotime($tarefa->data_limite_conclusao))}}</td>
                                  <td><a href="{{route('tarefa.edit', $tarefa->id)}}"><ion-icon name="create-outline" class="icon-edit"></ion-icon></a></td>
                                  <td>
                                      <form method="POST" id="form_delete_{{$tarefa->id}}" action="{{route('tarefa.destroy',$tarefa->id)}}">
                                          @method('DELETE')
                                          @csrf
                                      </form>
                                      <a href="#" onclick="document.getElementById('form_delete_{{$tarefa->id}}').submit()"><ion-icon name="trash-outline" class="icon-trash"></ion-icon></a>
                                  </td>
                                  <td>
                                      <form method="POST" id="form_check_{{$tarefa->id}}" action="{{route('tarefa.check',$tarefa->id)}}">
                                          @csrf
                                      </form>
                                      <a href="#" onclick="document.getElementById('form_check_{{$tarefa->id}}').submit()"><ion-icon name="checkmark-done-outline" class="icon-restaure"></ion-icon></a>
                                  </td>                                                              
                              </tr>
                          @endforeach                          
                      </tbody>
                    </table>
                  </div>

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
