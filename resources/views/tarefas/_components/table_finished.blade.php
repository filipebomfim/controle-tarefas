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

<div class="table-responsive">
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">Tarefa</th>
      <th scope="col">Data de Conclusão</th>
      <th>Restaurar</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($tarefas as $key => $tarefa)
          <tr>
              <td>{{$tarefa->tarefa}}</td>
              <td>{{date('d/m/Y',strtotime($tarefa->deleted_at))}}</td>
              <td>
                  <form method="POST" id="form_{{$tarefa->id}}" action="{{route('tarefa.restore',$tarefa->id)}}">
                      @csrf
                  </form>
                  <a href="#" onclick="document.getElementById('form_{{$tarefa->id}}').submit()"><ion-icon name="refresh-outline" class="icon text-success"></ion-icon></a>
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