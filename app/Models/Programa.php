<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $fillable = ['calendario', 'folio', 'programa', 'dependencia', 'titular', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prestadores()
    {
        return $this->belongsToMany(Prestador::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

}
