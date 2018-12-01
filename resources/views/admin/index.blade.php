@extends('layouts.app')
@section('content')
<div class="container">
@include('flash::message')
<div class="row">
    <div class="col-md-12">

        <h4 class="header-title mt-4">Lista de Bios</h4>
        <p class="header-title text-muted">Encontre a pessoa certa para trabalhar para sua empresa.</p>

        <div class="panel panel-default  profile">

            <div class="panel-body">
                  @if(count($apps))
           		<ul class="list-group">
                    @foreach($apps as $app)
           			<li class="list-group-item ">
                        <img class="img-fluid img-post" src="storage/profile_images/{{$app->profile_image}}" alt="{{$app->name}}">
                        <span class="btn-profile"><b class="name">{{$app->name}}</b><a class="btn btn-primary btn-index mt-3" href="{{route('show',$app->id)}}">Perfil completo</a></span>
                    </li>
                    @endforeach
           		</ul>
                @else
                       <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <p>Nenhuma Bio foi encontrada</p>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                @endif

            </div>

        </div>
        {{--Paginação--}}
        <br><br>
        <div class="container mt-4">
            {{ $apps->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
</div>
</div>
@endsection
