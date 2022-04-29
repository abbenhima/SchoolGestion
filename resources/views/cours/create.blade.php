@extends('layouts.app')
@section('content')

<form method="POST" action="{{route('cours.store')}}">
    @csrf
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
    <div class="form-group">
        <label for="libele"></label>
        <input class="form-control" name="libele" id="libele" value="" placeholder="libele" type="text" required>
        </div>
       
        
        <div class="form-group">
           
            <select class="form-control" id="prof_id" name="prof_id"  >
                @foreach ($personnes as $personne)
            <option value="{{$personne->personneable_id}}">{{$personne->first_name." ".$personne->last_name}}</option>
            @endforeach
            </select>

           
        </div>

      
        
    
    
    <button type="submit" class="btn btn-block btn-primary">Add Cours</button>
</div>
</form>

@endsection