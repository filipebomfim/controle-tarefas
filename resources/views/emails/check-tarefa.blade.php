@component('mail::message')
# {{$tarefa}}

Tarefa concluída em: {{$data_conclusao}} -
Data limite de conclusão: {{$data_limite_conclusao}}

@component('mail::button', ['url' => $url])
Clique aqui para ver as tarefas em aberto
@endcomponent

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent
