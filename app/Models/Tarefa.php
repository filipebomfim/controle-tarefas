<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = ['tarefa','data_limite_conclusao','user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
