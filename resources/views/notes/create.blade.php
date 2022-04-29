@extends('layouts.app')
@section('content')

<form method="POST" action="{{route('notes.store')}}">
    @csrf
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
    <div class="form-group">
        <label for="note"></label>
        <input class="form-control" name="note" id="note" value="" placeholder="Note" type="text" required>
        </div>
       

        <div class="form-group">
           
            <select class="form-control" id="cour_id" name="cour_id"  required >
                <option value="">No Selected</option>
                @foreach ($cours as $cour)
               
            <option value="{{$cour->id}}">{{$cour->libele}}</option>
            @endforeach
            </select>

           
        </div>
        
        <div class="form-group">
           
            <select class="form-control" id="etud_id" name="etud_id"  required >
                <option value="">No Selected</option>
                @foreach ($personnes as $personne)
                
            <option value="{{$personne->personneable_id}}">{{$personne->first_name." ".$personne->last_name}}</option>
            @endforeach
            </select>

           
        </div>

      
        
    
    
    <button type="submit" class="btn btn-block btn-primary">Add Cours</button>
</div>
</form>

@endsection