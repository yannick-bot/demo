@extends('master')
@section('title', "Etudiant recherché")

@section('content')

<form action="{{route('etudiants.search')}}" method="post">
    @csrf
    <div class="form-row">
        <input class="trouve" type="search" name="search" placeholder="Search for students" />
        <button type="submit">Search</button>
    </div>
</form>

<div class="categorie-columns">
    @csrf
    <form action="{{route('etudiants.searchByF')}}" >
        <select name="searchByF">
            <option value="1">AL - Achitecture logiciel</option>
            <option value="2">MAC - Marketing et action commerciale</option>
            <option value="3">SI - Securite informatique</option>
        </select>
        <button type = "submit">Rechercher</button>
    </form>
</div>

<a href="{{route('etudiants.create')}}">Nouveau etudiant</a>
<table>
    <thead>
        <td>id</td>
        <td>filiere</td>
        <td>matricule</td>
        <td>nom</td>
        <td>prenom</td>
        <td>sexe</td>
        <td>adresse</td>
        <td>date de naissance</td>
        <td>numero</td>
    </thead>

    <tbody>
        @foreach ($results as $etudiant)
            <tr>
                <td>{{$etudiant->id}}</td>
                <td>{{$etudiant->filiere->code}} - {{$etudiant->filiere->nom}}</td>
                <td>{{$etudiant->matricule}}</td>
                <td>{{$etudiant->nom}}</td>
                <td>{{$etudiant->prenom}}</td>
                <td>{{$etudiant->sexe}}</td>
                <td>{{$etudiant->adresse}}</td>
                <td>{{$etudiant->date_naissance}}</td>
                <td>{{$etudiant->numero}}</td>
                <td>
                    <a href="{{route('etudiants.edit', $etudiant->id)}}">Modifier</a>
                </td>
                <td>
                    <form action="{{route('etudiants.destroy', $etudiant->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>

        @endforeach


    </tbody>

</table>

@endsection
