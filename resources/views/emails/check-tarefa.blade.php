@component('mail::message')
# {{$tarefa}}

Tarefa concluída em: {{$data_conclusao}} 

Data limite de conclusão: {{$data_limite_conclusao}} <hr>

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent
