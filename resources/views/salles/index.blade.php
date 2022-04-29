

@extends('layouts.app')
@section('content')

<div class="col-lg-12 col-md-12 col-12">
  <div class="table-responsive">
<table class="table table-striped  ">
    <thead class="table-primary">
      <tr>
        <th scope="col">salle  Name</th>
        <th scope="col">cour Name</th>
        <th scope="col">Professeur</th>
        <th scope="col">Action</th>
        
      
      </tr>
    </thead>
    @foreach ($salles  as $salle)

    <tbody>
      <tr>
      <td>{{$salle->name_salle}}</td>
     
        @foreach ($cours as $cour)
        @if ($salle->cour_id == $cour->id)
        <td>{{$cour->libele }}</td>

        @foreach ($personnes as $personne)
        @if ($cour->professeur_id == $personne->personneable_id)
        <td>{{$personne->first_name.' '.$personne->last_name }}</td>
        @endif @endforeach
       
        @endif @endforeach
        <td><a class="btn btn-warning"  href="{{ route('salles.edit',['salle'=> $salle->id]) }}">Edit</a>

          <form method="POST" style="display:inline" action="{{ route('salles.destroy',['salle'=> $salle->id]) }}">
             @csrf
             @method('DELETE')
             <button class="btn btn-danger" type="submit">Delete</button>
         </form></td>
       
        </tr>
        
     
      @endforeach
      </tr>
    </tbody>
   
  </table>
  {{ $salles->links()}}
</div>
</div>
    
@endsection
    

