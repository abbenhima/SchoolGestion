

@extends('layouts.app')
@section('content')

<div class="col-lg-12 col-md-12 col-12">
  <div class="table-responsive">
<table class="table table-striped  ">
    <thead class="table-primary">
      <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Annee D'entre</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    @foreach ($personnes ?? '' as $personne)


    <tbody>
      <tr>
      <td>{{$personne->first_name}}</td>
        <td>{{$personne->last_name}}</td>
        <td>{{$personne->email}}</td>

        @foreach ($etudiants as $etudiant)
        @if ($etudiant->id == $personne->personneable_id)
        <td>{{$etudiant->anne_entre}}</td>
        @endif @endforeach
        
        <td><a class="btn btn-warning"  href="{{ route('etudiants.edit',['etudiant'=> $personne->id]) }}">Edit</a>
        <a class="btn btn-success"  href="{{ route('sendsms',['id'=> $personne->id]) }}">Send SMS</a>
          
         
            <form method="POST" style="display:inline" action="{{ route('etudiants.destroy',['etudiant'=> $personne->id]) }}">
               @csrf
               @method('DELETE')
               <button class="btn btn-danger" type="submit">Delete</button>
           </form>
          </td>
        </tr>
        
     
      @endforeach
      </tr>
    </tbody>
   
  </table>
  {{ $personnes->links()}}
</div>
</div>
    
@endsection
    

