<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    public function filiere() {
        return $this->belongsTo(Filiere::class, 'filieres_id', 'id'); //filiere_id est la clé étrangère. La méthode belongsTo nous permet de récupérer l'information associée à l'étudiant(0,1) OU (1,1)
        //id est la clé primaire de la table filiere
    }
}
