<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    //quand on est sur une instance de filiere, on peut automatiquement connaitre les étudiants de cette iliere
    public function etudiants() {
        return $this->hasMany(Etudiant::class, 'filieres_id', 'id');
    }
}
