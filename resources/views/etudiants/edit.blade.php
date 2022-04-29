@extends('layouts.app')
@section('content')

<form method="POST" action="{{route('etudiants.update',['etudiant'=>$personne->id])}}">
    @csrf
    @method('PUT');
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
    <div class="form-group">
        <label for="first_name"></label>
        <input class="form-control" name="first_name" id="first_name" value="{{old('first_name',$personne->first_name)}}"  type="text" required>
        </div>
    <div class="form-group">
        <label for="last_name"></label>
        <input class="form-control" name="last_name" id="last_name" value="{{old('last_name',$personne->last_name)}}"  type="text" required>
    </div>
    <div class="form-group">
        <label for="email"></label>
        <input class="form-control" name="email" id="email" value="{{old('email',$personne->email)}}"  type="text" required>
    </div>
    
    @foreach ($etudiants as $etudiant)

    @if ($personne->personneable_id==$etudiant->id)
    <div class="form-group">
        <label for="anne_entre"></label>
        <input class="form-control" name="anne_entre" id="anne_entre" value="{{old('anne_entre',$etudiant->anne_entre)}}"  type="text" required>
    </div>
    @endif
    
    @endforeach
    <br>
    <button type="submit" class="btn btn-block btn-primary">edit Etudiant</button>
</div>
</form>

@endsection


