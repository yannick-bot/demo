@extends('master')
@section('title', "Création d'un étudiant")


@section('content')
<h1>Création d'un étudiant</h1>
<form action="{{route('etudiants.update', $etudiant->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="filiere">Filiere</label>
        <select name="filiere" id="filiere">
            @foreach ($filieres as $filiere)
                <option value="{{$filiere->id}}" {{($filiere->id == $etudiant->filiere_id) ? 'selected' : ''}}> {{$filiere->code}} - {{$filiere->nom}}</option>

            @endforeach
        </select>

    </div>
    <div>
        <label for="nom">Nom:</label>
        <input id="nom" name="nom" type="text" required value = {{$etudiant->nom}}>
    </div>

    <div>
        <label for="prenom">Prénom</label>
        <input id="prenom" name="prenom" type="text" required value="{{$etudiant->prenom}}">
    </div>

    <div>
        <label for="">Sexe </label>
        Masculin: <input type="radio" name="sexe" value="M" required {{($etudiant->sexe == 'M') ? 'checked' : ''}}>
        Féminin: <input type="radio" name="sexe" value="F" {{($etudiant->sexe == 'F') ? 'checked' : ''}}>
    </div>
    <div>
        <label for="adresse">adresse</label>
        <input id="adresse" name="adresse" type="text" required value="{{$etudiant->adresse}}">
    </div>
    <div>
        <label for="date_naissance">date_naissance</label>
        <input id="date_naissance" name="date_naissance" type="date" required value="{{$etudiant->date_naissance}}">
    </div>
    <div>
        <label for="numero">Numero</label>
        <input id="numero" name="numero" type="text" required value="{{$etudiant->numero}}">
    </div>
    <div>
        <button type="submit">Envoyer</button>
    </div>



</form>


@endsection

