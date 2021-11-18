@component('mail::message')
# {{$tarefa}}

Data limite de conclusão: {{$data_limite_conclusao}} <hr>

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent
