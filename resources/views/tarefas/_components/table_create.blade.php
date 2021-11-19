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

<div class="legenda pb-3">
  <div class="legenda-content mr-2">
    <div class="circle bg-danger"></div>
    <span>Atrasado</span>
  </div>
  <div class="legenda-content">
    <div class="circle bg-warning"></div>
    <span>Vence hoje</span>
  </div>
</div>
<div class="table-responsive">
  <table class="table text-center">
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
            <tr class =
              "{{date('d/m/Y',strtotime($tarefa->data_limite_conclusao)) < date('d/m/Y') ? 'bg-red' : ''}}
              {{date('d/m/Y',strtotime($tarefa->data_limite_conclusao)) == date('d/m/Y') ? 'bg-yellow' : ''}}
            ">
                <td>{{$tarefa->tarefa}}</td>
                <td>{{date('d/m/Y',strtotime($tarefa->data_limite_conclusao))}}</td>
                <td><a href="{{route('tarefa.edit', $tarefa->id)}}"><ion-icon name="create-outline" class="icon primary"></ion-icon></a></td>
                <td>
                    <form method="POST" id="form_delete_{{$tarefa->id}}" action="{{route('tarefa.destroy',$tarefa->id)}}">
                        @method('DELETE')
                        @csrf
                    </form>
                    <a href="#" onclick="document.getElementById('form_delete_{{$tarefa->id}}').submit()"><ion-icon name="trash-outline" class="icon text-danger"></ion-icon></a>
                </td>
                <td>
                    <form method="POST" id="form_check_{{$tarefa->id}}" action="{{route('tarefa.check',$tarefa->id)}}">
                        @csrf
                    </form>
                    <a href="#" onclick="document.getElementById('form_check_{{$tarefa->id}}').submit()"><ion-icon name="checkmark-done-outline" class="icon text-success"></ion-icon></a>
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