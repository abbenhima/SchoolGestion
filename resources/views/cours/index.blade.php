

@extends('layouts.app')
@section('content')

<div class="col-lg-12 col-md-12 col-12">
  <div class="table-responsive">
<table class="table table-striped  ">
    <thead class="table-primary">
      <tr>
        <th scope="col">Cour Name</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Action</th>
        
      
      </tr>
    </thead>
    @foreach ($cours  as $cour)

    <tbody>
      <tr>
      <td>{{$cour->libele}}</td>
     
        @foreach ($personnes as $personne)
        @if ($cour->professeur_id == $personne->personneable_id)
        <td>{{$personne->first_name }}</td>
        <td>{{$personne->last_name }}</td>
        @endif @endforeach
        <td><a class="btn btn-warning"  href="{{ route('cours.edit',['cour'=> $cour->id]) }}">Edit</a>

          <form method="POST" style="display:inline" action="{{ route('cours.destroy',['cour'=> $cour->id]) }}">
             @csrf
             @method('DELETE')
             <button class="btn btn-danger" type="submit">Delete</button>
         </form></td>
       
        </tr>
        
     
      @endforeach
      </tr>
    </tbody>
   
  </table>
  {{ $cours->links()}}
</div>
</div>
    
@endsection
    

