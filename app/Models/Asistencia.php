<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $fillable= [
        'prestador_id', 'programa_id', 'fecha', 'entrada', 'salida', 'user_id'
    ];

    public function prestador()
    {
        return $this->belongsTo(Prestador::class);
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function valida()
    {
        return $this->belongsTo(User::class, 'valida_id');
    }
}

