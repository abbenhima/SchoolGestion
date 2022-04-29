

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
        <th scope="col">Note</th>
        <th scope="col">Action</th>
        
        
      </tr>
    </thead>
    @foreach ($notes  as $note)

    <tbody>
      <tr>
        @foreach ($cours as $cour)
        @if ($note->cour_id == $cour->id)
        <td>{{$cour->libele }}</td>
        @endif @endforeach
     
        @foreach ($personnes as $personne)
        @if ($note->etudiant_id == $personne->personneable_id)
        <td>{{$personne->first_name }}</td>
        <td>{{$personne->last_name }}</td>
        @endif @endforeach

        <td>{{$note->note}}</td>

        <td><a class="btn btn-warning"  href=" {{ route('notes.edit',['note'=> $note->id]) }}">Edit</a>
         

          <form method="POST" style="display:inline" action="{{ route('notes.destroy',['note'=> $note->id]) }}">
            
             @csrf
             @method('DELETE')
             <button class="btn btn-danger" type="submit">Delete</button>
         </form></td>
       
        </tr>
        
     
      @endforeach
      </tr>
    </tbody>
   
  </table>
  {{ $notes->links()}}
</div>
</div>
    
@endsection
    

