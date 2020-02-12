<!-- Vista que se muestra al editar completamente una publicacion -->
@extends('layouts.master')



@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

<style media="screen">
   .nav-tabs .nav-item .nav-link.active {
       /* background: rgba(25,140,133,0.1); */
       background: #198c85;
       border: 2px solid;
       color: white;
       border-color: #198c85;
   }

   .main-content-wrap {
       background: #F2E3D5;
   }
   .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    	  border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }

</style>

<div class="card mt-2 mb-4">
   <div class="card-header bg-transparent">
       <div class="breadcrumb mt-3">
           <ul>
               <li>
                   <a href="{{route('wea')}}"> Home </a>
               </li>
               <li>Mi Portal Inmobiliario</li>
               <li> <b>Edición de {{ $propiedad->titulo_propiedad }}</b> </li>
           </ul>
       </div>
   </div>
   <div class="card-body">
       <ul class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

           <li class="nav-item">
               <a class=" nav-link @if($active_tab=="edicion_datos") active @endif" id="home-basic-tab" data-toggle="tab" href="#homeBasic" role="tab" aria-controls="homeBasic" aria-selected="true"> <b>Edición de datos</b></a>
           </li>
           <li class="nav-item">
               <a class=" nav-link @if($active_tab=="edicion_imagenes") active @endif" id="profile-basic-tab" data-toggle="tab" href="#profileBasic" role="tab" aria-controls="profileBasic" aria-selected="false"> <b>Edición de Imágenes</b> </a>
           </li>


       </ul>
       <div class="tab-content ul-tab__content" id="nav-tabContent">
           <div class="tab-pane fade  @if($active_tab=="edicion_datos") in show active @endif" id="homeBasic" role="tabpanel" aria-labelledby="home-basic-tab">

               <br>

               <form enctype="multipart/form-data" method="POST" action="{{ route('editAll', $propiedad->id)}}" role="form" id="smartwizard">
                 {{ csrf_field() }}

                 <div>
                   <div id="step-1" class="">

                     <div class="row">
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="tipopropiedad">¿Que tipo de propiedad tienes?</label>
                           <select class="form-control" id="tipopropiedad" name="tipopropiedades_id">
                             @foreach ($tipopropiedades as $tipopropiedad)
                               @if($tipopropiedad->id == $propiedad->tipopropiedades_id)
                                 <option value="{{$tipopropiedad->id}}">{{$tipopropiedad->propiedades}}</option>
                               @endif
                             @endforeach
                             @foreach ($tipopropiedades as $tipopropiedad)
                               @if(!($tipopropiedad->id == $propiedad->tipopropiedades_id))
                                 <option value="{{$tipopropiedad->id}}">{{$tipopropiedad->propiedades}}</option>
                               @endif
                             @endforeach
                           </select>
                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="estadovivienda">¿Estado de vivienda?</label>
                           <select class="form-control" id="estado" name="estado">
                           @if($propiedad->estado == "nuevo")
                             <option value="nuevo">Nueva</option>
                             <option value="usado">Usada</option>
                             <option value="reacondicionado">Reacondicionada</option>
                           @endif
                           @if($propiedad->estado == "usado")
                             <option value="usado">Usada</option>
                             <option value="nuevo">Nueva</option>
                             <option value="reacondicionado">Reacondicionada</option>
                           @endif
                           @if($propiedad->estado == "reacondicionado")
                             <option value="reacondicionado">Reacondicionada</option>
                             <option value="nuevo">Nueva</option>
                             <option value="usado">Usada</option>
                           @endif


                           </select>
                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="tipo_comercio">¿Que quieres hacer con ella?</label>
                           <select class="form-control" id="tipo_comercio" name="tipo_comercio">
                           @if($propiedad->tipo_comercio == "vender")
                             <option value="vender">Vender</option>
                             <option value="arrendar">Arrendar</option>
                           @else
                             <option value="arrendar">Arrendar</option>
                             <option value="vender">Vender</option>
                           @endif
                           </select>

                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="region">Region:</label>
                           <select class="form-control" id="region">
                             @foreach($regiones as $region)
                               <option value="{{$region->id}}">{{$region->order}}, {{$region->nombre}}</option>
                             @endforeach

                           </select>

                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="comunas">Comuna:</label>
                           <select class="form-control" id="comunas" name="comunas_id">

                             @foreach($comunas as $comuna)
                               @if($propiedad->comunas_id == $comuna->id)
                                 <option value="{{$comuna->id}}">{{$comuna->nombre}}</option>
                               @endif
                             @endforeach
                             @foreach($comunas as $comuna)
                               @if(!($propiedad->comunas_id == $comuna->id))
                                 <option value="{{$comuna->id}}">{{$comuna->nombre}}</option>
                               @endif
                             @endforeach

                           </select>

                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="direccion">Dirección:</label>
                           <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $propiedad->direccion }}" required autocomplete="direccion">
                         </div>
                       </div>
                     </div>

                     <div class="row">
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="nro_habitaciones">Habitaciones</label>
                           <input type="number" min="0" class="form-control" id="nro_habitaciones" name="nro_habitaciones" value='{{$propiedad->nro_habitaciones}}'>
                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="nro_banos">Baños</label>
                           <input type="number" class="form-control" name="nro_banos" id="nro_banos" min="0" value='{{$propiedad->nro_banos}}'>
                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="nro_estacionamientos">Estacionamientos</label>
                           <input type="number" class="form-control" name="nro_estacionamientos" id="nro_estacionamientos" min="0" value='{{$propiedad->nro_estacionamientos}}'>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="">Superficie terreno (en m<sup>2</sup>):</label>
                           <input type="number" class="form-control" maxlength="140" name="sup_terreno" id="sup_terreno" min="0" value='{{$propiedad->sup_terreno}}'>
                         </div>

                       </div>
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="">Superficie construida (en m<sup>2</sup>):</label>
                           <input type="number" name="sup_construida" class="form-control" maxlength="140" id="sup_construida" min="0" value='{{$propiedad->sup_construida}}'>
                         </div>

                       </div>
                     </div>
                     <div class="row">
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="tipopiso">Tipo de piso</label>
                           <select class="form-control" id="tipopiso" name="tipopisos_id">
                             @foreach($tipopisos as $tipopiso)
                               @if($propiedad->tipopisos_id == $tipopiso->id)
                               <option value="{{$tipopiso->id}}">{{$tipopiso->pisos}}</option>
                               @endif
                             @endforeach
                             @foreach($tipopisos as $tipopiso)
                               @if(!($propiedad->tipopisos_id == $tipopiso->id))
                               <option value="{{$tipopiso->id}}">{{$tipopiso->pisos}}</option>
                               @endif
                             @endforeach
                           </select>
                         </div>

                       </div>
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="amoblado">Amoblada</label>
                           <select class="form-control" id="amoblado" name="tipoamoblados_id">
                             @foreach($tipoamoblados as $tipoamoblado)
                               @if($propiedad->tipoamoblados_id == $tipoamoblado->id)
                                 <option value="{{$tipoamoblado->id}}">{{$tipoamoblado->amoblados}}</option>
                               @endif
                             @endforeach
                             @foreach($tipoamoblados as $tipoamoblado)
                               @if(!($propiedad->tipoamoblados_id == $tipoamoblado->id))
                                 <option value="{{$tipoamoblado->id}}">{{$tipoamoblado->amoblados}}</option>
                               @endif
                             @endforeach
                           </select>
                         </div>

                       </div>
                     </div>


                   </div>

                   <div id="step-2" class="">
                     <h3 class="border-bottom border-gray pb-2">Publicación</h3>
                     <div class="row">
                       <div class="col-6">
                         <div class="container form-group col-12">
                           <label for="titulo_propiedad">Titulo de publicacion (Max. 40):</label>
                           <input type="text" name="titulo_propiedad" class="form-control" id="titulo_propiedad" maxlength="40" value = "{{$propiedad->titulo_propiedad}}" required>
                         </div>
                         <div class="container form-group col-12">
                           <label for="descripcion_propiedad">Descripción (Max. 300):</label>
                           <input type="text" name="descripcion_propiedad" class="form-control" id="descripcion_propiedad" value = "{{$propiedad->descripcion_propiedad}}" maxlength="300" required>
                         </div>
                       </div>
                       <div class="col-6">

                         <input type="file" name="file[]" id="file" accept="image/*" multiple />


                       </div>
                     </div>
                     <div class="row">
                       <div class="col-12">
                         <div class="container form-group">
                           <label for="">Financiamiento</label>
                           <div class="row">
                             <div class="col-3">
                               <div class="custom-control custom-checkbox">
                                 @if($contado == 1)
                                   <input type="checkbox" class="custom-control-input" name="contado" id="contado" value="1" checked>
                                 @else
                                   <input type="checkbox" class="custom-control-input" name="contado" id="contado" value="1">
                                 @endif
                                 <label class="custom-control-label" for="contado">Contado</label>

                               </div>
                             </div>
                             <div class="col-3">
                               <div class="custom-control custom-checkbox">
                                 @if($subsidio == 1)
                                 <input type="checkbox" class="custom-control-input" name="subsidio" id="subsidio" value="1" checked>
                                 @else
                                 <input type="checkbox" class="custom-control-input" name="subsidio" id="subsidio" value="1">
                                 @endif
                                 <label class="custom-control-label" for="subsidio">Subsidio</label>
                               </div>
                             </div>
                             <div class="col-3">
                               <div class="custom-control custom-checkbox">
                                 @if($credito == 1)
                                 <input type="checkbox" class="custom-control-input" name="credito" id="credito" value="1" checked>
                                 @else
                                 <input type="checkbox" class="custom-control-input" name="credito" id="credito" value="1">
                                 @endif
                                 <label class="custom-control-label" for="credito">Credito hipotecario</label>
                               </div>
                             </div>
                             <div class="col-3">
                               <div class="custom-control custom-checkbox">
                                 @if($leasing == 1)
                                 <input type="checkbox" class="custom-control-input" name="leasing" id="leasing" value="1" checked>
                                 @else
                                 <input type="checkbox" class="custom-control-input" name="leasing" id="leasing" value="1">
                                 @endif
                                 <label class="custom-control-label" for="leasing">Leasing</label>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="sel1">Valor en CLP:</label>
                           <input name="valor_pesos" id = "valor_pesos" type="number" value="{{$propiedad->valor_uf * $UF}}" class="form-control" min="0"   onchange="clptoUF(this.value)">
                         </div>
                       </div>
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="sel1">Valor en UF:</label>
                           <input type="number" name="valor_uf" id="valor_uf" class="form-control" min="0" value='{{$propiedad->valor_uf}}' onchange="UFtoclp(this.value)">

                         </div>
                       </div>
                     </div>

                       <input type="number" name="usuario_id" style="display:none" id="usuario_id" class="form-control" value="{{Auth::id()}}">
                       <input type="text" name="estado_publicacion" style="display:none" id="estado_publicacion" class="form-control" value="espera">
                         <input type="submit"  value="Guardar" class="btn btn-success btn-block">

                   </div>


                 </div>
               </form>

           </div>




           <div class="tab-pane fade  @if($active_tab=="edicion_imagenes") in show active @endif" id="profileBasic" role="tabpanel" aria-labelledby="profile-basic-tab">

           <form method="post" action="{{ route('imagenes') }}" enctype="multipart/form-data " >


        {!! csrf_field() !!}

             @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
              </div>
              @endif

              <div class="row">


                    <input type="hidden" name="codigo" class="form-control" placeholder="Title" value="{{ $propiedad->codigo }}">


                 <div class="col-3">
                     <strong>Selecciona aquí las imágenes que desees subir</strong>
                     <br><br>
                      <input type="file" name="file[]" id="file" accept="image/*" multiple />
                      <br><br>
                       <button type="submit" class="btn btn-success btn-sm btn-block">Subir y Guardar</button>
                 </div>
               </form>

                 <div class="col-9">
                   <div class="row">
                     <div class='list-group gallery'>


                             @if($fotos->count())
                                 @foreach($fotos as $image)
                                 <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                                     <a class="thumbnail fancybox" rel="ligthbox" href="{{ asset('images/'.$image->img) }}">
                                         <img class="img-responsive" alt="" src="{{ asset('images/'.$image->img) }}" />

                                     </a>
                                     <form action="{{ route('imgs',$image->id) }}" method="POST">
                                     <input type="hidden" name="_method" value="delete">
                                     {!! csrf_field() !!}
                                     <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                                     </form>
                                 </div> <!-- col-6 / end -->
                                 @endforeach
                             @endif


                         </div> <!-- list-group / end -->
                   </div>
                 </div>

             </div>




           </div>


       </div>
   </div>
</div>







@endsection

@section('page-js')


<!-- Script para hacer funcional el Dropzone -->

<script>
  // Funcion que cambia el value del input del valor_uf con respecto al valor ingresado en valor pesos
  function clptoUF(val) {
    document.getElementById("valor_uf").value = Math.trunc(val / {{$UF}});
  }
  // Funcion que cambia el value del input del valor_pesos con respecto al valor ingresado en valor UF
  function UFtoclp(val) {
    document.getElementById("valor_pesos").value = Math.trunc(val * {{$UF}});
  }
</script>




@endsection
