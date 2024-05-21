<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $primaryKey = 'CodeCategorie';
    public function chambres()
    {
        return $this->hasMany(Chambre::class);
    }
}
