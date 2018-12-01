@extends('layouts.app')

@section('content')
<div class="container">

@include('flash::message')
<div class="row">
    <div class="col-md-12 create-bio">
        <h4 class="header-title mt-4">Editar sua Bio<h4>
        <p class="header-title text-muted">E deixe seu perfil para todos verem.</p>


    <form class="" method="POST" action="{{route('update', ['id'=>$app->id])}}">

        <div class="form-group">
          <input name="profile_image" value="{{$app->profile_image}}" type="file" class="form-control-file" placeholder="Image de Perfil">
        </div>

      <div class="form-group">
        <input type="text" class="form-control" value="{{$app->name}}"  name="name"  placeholder="Nome">

      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="{{$app->age}}"  name="age"  placeholder="Idade">

      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="{{$app->profession}}"  name="profession"  placeholder="Profissão">

      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="{{$app->email}}"  name="email"  placeholder="E-mail">

      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="{{$app->phone}}"  name="phone"  placeholder="Telefone">
      </div>

      <div class="form-group">
         <textarea class="form-control" name="bio" rows="8" placeholder="Sua Bio">
             @if(!old('bio'))
			{!! $app->bio !!}
			@endif
			{!! old('bio') !!}
         </textarea>
         <small style="font-size: 15px;" class="form-text text-muted">Descreva seu perfil</small>
     </div><br>
      <button class="btn btn-primary" type="submit" class="btn btn-primary">Atualizar Bio</button>
      @csrf
</form>
</div>
</div>
@endsection
