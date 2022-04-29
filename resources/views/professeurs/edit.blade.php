@extends('layouts.app')
@section('content')

<form method="POST" action="{{route('professeurs.update',['professeur'=>$personne->id])}}">
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
   
    @foreach ($professeurs as $professeur)

    @if ($personne->personneable_id==$professeur->id)
        <div class="form-group">
        <input name="anne_entre" class="form-control" id="anne_entre" type="text" value="{{old('anne_entre',$professeur->anne_entre)}}">
    </div>
    @endif
    
    @endforeach
    <button type="submit" class="btn btn-block btn-primary">edit Professeur</button>
</div>
</form>

@endsection