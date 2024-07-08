@extends('master')
@section('title', "Création d'un étudiant")


@section('content')
<h1>Création d'un étudiant</h1>
<form action="{{route('etudiants.store')}}" method="POST">
    @csrf
<!-- Pour gérer les erreurs soulevés par les règles de validation du formulaire -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    ({{$error}})
                </li>
            @endforeach
        </ul>
    @endif

    <div>
        <label for="filiere">Filiere</label>
        <select name="filiere" id="filiere">
            @foreach ($filieres as $filiere)
                <option value="{{$filiere->id}}"  {{($filiere->id == old('filiere')) ? 'selected' : ''}}> {{$filiere->code}} - {{$filiere->nom}}</option>

            @endforeach
        </select>

    </div>
<!-- La fonction hold() permet de faire revenir les infos entrés dans le formulaire en cas d'erreurs -->
    <div>
        <label for="nom">Nom:</label>
        <input id="nom" name="nom" type="text" required value = "{{old('nom')}}">

    </div>
    <div>
        <label for="prenom">Prénom</label>
        <input id="prenom" name="prenom" type="text"  required value = "{{old('prenom')}}">
    </div>

    <div>
        <label for="">Sexe </label>
        Masculin: <input type="radio" name="sexe" required value="M" required value ="{{old('sexe')}}"  {{($etudiant->sexe == old('sexe'))? 'selected' : ''}}>
        Féminin: <input type="radio" name="sexe" required value="F">
    </div>
    <div>
        <label for="adresse">adresse</label>
        <input id="adresse" name="adresse" type="text" required  value = "{{old('adresse')}}">
    </div>
    <div>
        <label for="date_naissance">date_naissance</label>
        <input id="date_naissance" name="date_naissance" type="date" required  value = "{{old('date_naissance')}}">
    </div>
    <div>
        <label for="numero">Numero</label>
        <input id="numero" name="numero" type="text" required  value = "{{old('numero')}}">
    </div>
    <div>
        <button type="submit">Envoyer</button>
    </div>



</form>


@endsection
