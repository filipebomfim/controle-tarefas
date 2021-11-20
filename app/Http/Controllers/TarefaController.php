<?php

namespace App\Http\Controllers;

use App\Mail\NovaTarefaMail;
use App\Mail\EdicaoTarefaMail;
use App\Mail\FinalizarTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TarefaController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tarefas = Tarefa::where('user_id',Auth::user()->id)
            ->orderBy('data_limite_conclusao')
            ->with('user')
            ->paginate(5);
        $msg = $request->msg;
        return view('tarefas.index', compact('tarefas','msg'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'tarefa'=>'required',
            'data_limite_conclusao'=>'required|date|date_format:Y-m-d|after:yesterday'
        ];

        $feedback = [
            'required'=>'O campo precisa estar preenchido',
            'after'=>'A data precisa ser maior ou igual à data de hoje'
        ];

        $request->validate($regras,$feedback);

        $dados = $request->all('tarefa','data_limite_conclusao');
        $dados['user_id'] = auth()->user()->id;

        $tarefa = Tarefa::create($dados);
        
        $destinatario = auth()->user()->email;
        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));
        return redirect()->route('tarefa.show',['tarefa'=>$tarefa->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefas.show', ['tarefa'=>$tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        if (Auth::user()->id != $tarefa->user_id) return redirect()->route('denied'); 
        
        return view('tarefas.edit', compact('tarefa'));               
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $regras = [
            'tarefa'=>'required',
            'data_limite_conclusao'=>'required'
        ];

        $feedback = [
            'required'=>'O campo precisa estar preenchido'
        ];

        $request->validate($regras,$feedback);
        if (Auth::user()->id != $tarefa->user_id) return redirect()->route('denied'); 
        
        $tarefa->update($request->all());
        $destinatario = Auth::user()->email;
        Mail::to($destinatario)->send(new EdicaoTarefaMail($tarefa));
        return redirect()->route('tarefa.show',$tarefa);
                    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        if (Auth::user()->id != $tarefa->user_id) return redirect()->route('denied'); 
        $tarefa->forceDelete();
        return redirect()->route('tarefa.index', ['msg'=>'delete']);
            
    }

    public function check(Tarefa $tarefa){
        if (Auth::user()->id != $tarefa->user_id) return redirect()->route('denied'); 
        $tarefa->delete();

        $destinatario = Auth::user()->email;
        Mail::to($destinatario)->send(new FinalizarTarefaMail($tarefa));
        return redirect()->route('tarefa.index', ['msg'=>'check']);
    }

    public function listFinished(Request $request){
        $tarefas = Tarefa::onlyTrashed()
            ->where('user_id',Auth::user()->id)
            ->orderBy('deleted_at')
            ->with('user')
            ->paginate(5);
        $msg = $request->msg;
        return view('tarefas.listFinished', compact('tarefas', 'msg'));
    }

    public function restore($id){
        $tarefa = Tarefa::onlyTrashed()
            ->where('user_id',Auth::user()->id)
            ->where('id',$id); 

            $tarefa->restore();
            return redirect()->route('tarefa.finished', ['msg'=>'restored']);
    }
}
