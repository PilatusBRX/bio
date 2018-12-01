@extends('layouts.app')

@section('content')
<div class="container">


<div class="row">
    <div class="col-md-12 create-bio">
        <h4 class="header-title mt-4">Crie sua Bio<h4>
        <p class="header-title text-muted">E deixe seu perfil para todos verem.</p>


    <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
    <h4>Foto de perfil:</h4>    
     <div class="input-group-prepend">
           <div class="form-group">
               <input name="profile_image" type="file" class="form-control-file"    placeholder="Image de Perfil" required>
          </div>
     </div>

      <div class="form-group">
        <input type="text" class="form-control" name="name"  placeholder="Nome" required="required">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="age"  placeholder="Idade" required="required">

      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="profession"  placeholder="Profissão" required="required">

      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="email"  placeholder="E-mail" required="required">

      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="phone"  placeholder="Telefone" required="required">

      </div>
      <div class="form-group">
         <textarea class="form-control" name="bio" rows="8" placeholder="Sua Bio" required="required"></textarea>
         <small style="font-size: 15px;" class="form-text text-muted">Descreva seu perfil</small>
     </div><br>
      <button class="btn btn-primary" type="submit" class="btn btn-primary">Criar Bio</button>
      @csrf
</form>
</div>
</div>
@endsection
