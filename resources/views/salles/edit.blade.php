@extends('layouts.app')
@section('content')

<form method="POST" action="{{route('salles.update',['salle'=>$salle->id])}}">
    @csrf
    @method('PUT');

    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
    <div class="form-group">
        <label for="name_salle"></label>
    <input class="form-control" name="name_salle" id="name_salle" value="{{old('name_salle',$salle->name_salle)}}" placeholder="Name Salle" type="text" required>
        </div>
       
        
        <div class="form-group">
           
            <select class="form-control" id="cour_id" name="cour_id"  >
                @foreach ($cours as $cour)
            <option value="{{$cour->id}}">{{$cour->libele}}</option>
            @endforeach
            </select>

           
        </div>

      
        
    
    
    <button type="submit" class="btn btn-block btn-primary">Add Cours</button>
</div>
</form>

@endsection