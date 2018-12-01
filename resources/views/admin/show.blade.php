@extends('layouts.app')

@section('content')
<div class="container">
@include('flash::message')
<div class="row">
    <div class="col-md-12">

        <h4 class=" mt-4">Bio de {{$app->name}}</h4>

        <div class="panel panel-default mt-4">
            <div class="panel-body">
           		<ul class="list-group show-section ">
                    <div class="col-md-5 ">
                        <img class="img-fluid img-show" src="storage/profile_images/{{$app->profile_image}}" alt="{{$app->name}}">
                    </div>

                    <div class=" col-md-8">
                        <li class="list-group-item"><b>Nome:</b> {{$app->name}}</li>
               			<li class="list-group-item"><b>Idade:</b> {{$app->age}}</li>
                        <li class="list-group-item"><b>Profissão:</b> {{$app->profession}}</li>
                        <li class="list-group-item"><b>E-mail:</b> {{$app->email}}</li>
                        <li class="list-group-item"><b>Telefone:</b> {{$app->phone}}</li>
                    </div>

           		</ul>

           		<div class="well">
                    <li class="list-group-item"><h4>Biografia:</h4>	<hr>
                        <p>{{$app->bio}}</p>
                     </li>
                     <a class="btn btn-primary mt-4" href="/">Voltar à lista de Bios</a>
                     @can('show-link', $app)
                     <a class="btn btn-primary mt-4 float-right " href="{{route('edit',$app->id)}}">Editar Bio</a>
                     <!-- Button trigger modal -->
                     <a class="btn btn-danger float-right mt-4 mr-4" data-toggle="modal" data-target="#exampleModal">
                       Excluir Bio
                     </a><!-- Button trigger modal -->
                     @endcan
           		</div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span class="close" aria-hidden="true">&times;</span>
                                </button>
                          </div>
                          <div class="modal-body">
                            <span class="fas fa-trash-alt"></span>
                            <p class="text-center">Tem certeza de  que quer apagar a Bio ?</p>
                          </div>
                          <div class="modal-footer">
                            <a  class="btn btn-primary float-right mt-4 mr-4" data-dismiss="modal">Fechar</a>
                            <a href="{{ route('destroy', $app->id)}}" class="btn btn-primary float-right mt-4 mr-4">Exluir Bio</a>
                         </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
