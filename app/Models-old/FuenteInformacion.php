<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuenteInformacion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function archivosGestion()
    {
        return $this->hasMany(ArchGestionCalidad::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
