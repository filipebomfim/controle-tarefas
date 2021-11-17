<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Tarefa;

class FinalizarTarefaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tarefa;
    public $data_conclusao;
    public $data_limite_conclusao;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa->tarefa;
        $this->data_conclusao = date('d/m/Y');
        $this->data_limite_conclusao = date('d/m/Y', strtotime($tarefa->data_limite_conclusao));
        $this->url = config('app.url');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.check-tarefa')->subject('Tarefa Concluída');
    }
}
