@extends('layouts.app')
@section('content')

<form method="POST" action="{{route('etudiants.store')}}">
    @csrf
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
    <div class="form-group">
        <label for="first_name"></label>
        <input class="form-control" name="first_name" id="first_name" value="{{old('first_name')}}" placeholder="First Name" type="text" required>
        </div>
    <div class="form-group">
        <label for="last_name"></label>
        <input class="form-control" name="last_name" id="last_name" value="{{old('last_name')}}" placeholder="Last Name" type="text" required>
    </div>
    <div class="form-group">
        <label for="email"></label>
        <input class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Email" type="text" required>
    </div>
    <div class="form-group">
        <label for="anne_entre"></label>
        <input class="form-control" name="anne_entre" id="anne_entre" value="{{old('anne_entre')}}" placeholder="Anne d'entre" type="text" required>
    </div>
    <button type="submit" class="btn btn-block btn-primary">Add Etudiant</button>
</div>
</form>

@endsection