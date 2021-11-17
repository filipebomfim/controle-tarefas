<div class="card">
    <div class="card-header card-header-big bg-dark text-center">{{$titulo}}</div>
    <div class="card-body">
        <form method="POST" action="{{ isset($tarefa->id) ? route('tarefa.update', $tarefa->id) : route('tarefa.store')}}">
            @csrf
            @isset($tarefa->id)
                @method('PUT')
            @endisset

            <div class="mb-3">
                <ion-icon name="bookmarks-outline" class="align-middle"></ion-icon>
                <label class="form-label">Tarefa</label>
                <input type="text" class="form-control {{ $errors->has('tarefa') ? ' is-invalid' : '' }}" name="tarefa" value="{{ $tarefa->tarefa ?? old('tarefa')}}">
                @if ($errors->has('tarefa'))
                  <div class="invalid-feedback">{{ $errors->first('tarefa') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <ion-icon name="calendar-number-outline" class="align-middle"></ion-icon>
                <label class="form-label">Data Limite Conclusão</label>
                <input type="date" class="form-control {{ $errors->has('data_limite_conclusao') ? ' is-invalid' : '' }}" name="data_limite_conclusao" value="{{ $tarefa->data_limite_conclusao ?? old('data_limite_conclusao')}}">
                @if ($errors->has('data_limite_conclusao'))
                  <div class="invalid-feedback">{{ $errors->first('data_limite_conclusao') }}</div>
                @endif
            </div>
            
            <button type="submit" class="btn btn-dark">{{$botao}}</button>
          </form>
    </div>
</div>