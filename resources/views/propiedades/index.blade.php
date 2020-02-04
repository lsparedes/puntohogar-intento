<!-- Vista que muestra el catalogo de propiedades -->
@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/dropzone.min.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
     <!-- <h1>Portal Inmoviliario</h1> -->
     <ul>
         <li><a href="#">Home</a></li>
         <li>Mi Portal Inmobiliario</li>
     </ul>
 </div>

 <hr>

 <div class="col-12">
     <div class="card text-left">

         <div class="card-body" >
             <!-- <h4 class="card-title mb-3">Basic Tab With pill</h4> -->

             <!-- <ul class="nav nav-pills" id="myPillTab" role="tablist">
                 <li class="nav-item">
                     <a class="nav-link active" id="home-icon-pill" data-toggle="pill" href="#homePIll" role="tab" aria-controls="homePIll" aria-selected="true"><i class="nav-icon i-Home1 mr-1"></i>Formulario de Publicación</a>
                 </li>
                   @if(Auth::check())
                 <li class="nav-item">
                     <a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#profilePIll" role="tab" aria-controls="profilePIll" aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i> Mis Publicaciones</a>
                 </li>
                   @if(Auth::user()->roles_id == 1)
                 <li class="nav-item">
                     <a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#contactPIll" role="tab" aria-controls="contactPIll" aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i> Solicitudes</a>
                 </li>
                 @endif
               @endif
             </ul> -->

             <ul class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                 <li class="nav-item">
                     <a class=" nav-link active" id="home-basic-tab" data-toggle="tab" href="#homeBasic" role="tab" aria-controls="homeBasic" aria-selected="true">Formulario de Publicación</a>

                 </li>
                    @if(Auth::check())
                 <li class="nav-item">
                     <a class=" nav-link " id="profile-basic-tab" data-toggle="tab" href="#profileBasic" role="tab" aria-controls="profileBasic" aria-selected="false"> Mis Publicaciones</a>

                 </li>
   @endif
             </ul>
             <div class="tab-content ul-tab__content" id="nav-tabContent">
                 <div class="tab-pane fade show active" id="homeBasic" role="tabpanel" aria-labelledby="home-basic-tab">

                     <br>
                     <div class="row">
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <input type="hidden" id="codigo" name="" value="">
                           <label for="tipopropiedad">¿Qué tipo de propiedad tienes?</label>
                           <select class="form-control" id="tipopropiedad"  >
                             @foreach ($tipopropiedades as $tipopropiedad)
                               <option value="{{$tipopropiedad->id}}">{{$tipopropiedad->propiedades}}</option>
                             @endforeach
                           </select>
                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="estadovivienda">¿En qué estado se encuentra su inmueble?</label>
                           <select class="form-control" id="estado" >
                             <option value="nuevo">Nueva</option>
                             <option value="usado">Usada</option>
                             <option value="reacondicionado">Reacondicionada</option>
                           </select>
                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="tipo_comercio">¿Qué desea hacer?</label>
                           <select class="form-control" id="tipo_comercio" >
                             <option value="vender">Vender</option>
                             <option value="arrendar">Arrendar</option>
                           </select>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="region">Región:</label>
                           <select class="form-control" id="region" onchange="changeRegion(this.value)">
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
                                 <option value="{{$comuna->id}}">{{$comuna->nombre}}</option>
                             @endforeach
                           </select>
                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="direccion">Dirección:</label>
                           <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion">
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="nro_habitaciones">Habitaciones</label>
                           <input type="number" min="0" class="form-control" id="nro_habitaciones" name="nro_habitaciones" value="{{ old('nro_habitaciones') }}">
                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="nro_banos">Baños</label>
                           <input type="number" class="form-control" name="nro_banos" id="nro_banos" min="0" value="{{ old('nro_banos') }}">
                         </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                         <div class="container form-group">
                           <label for="nro_estacionamientos">Estacionamientos</label>
                           <input type="number" class="form-control" name="nro_estacionamientos" id="nro_estacionamientos" min="0" value="{{ old('nro_estacionamientos') }}">
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="">Superficie del terreno (en m<sup>2</sup>):</label>
                           <input type="number" class="form-control" maxlength="140" name="sup_terreno" id="sup_terreno" min="0" value="{{ old('sup_terreno') }}">
                         </div>

                       </div>
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="">Superficie construida (en m<sup>2</sup>):</label>
                           <input type="number" name="sup_construida" class="form-control" maxlength="140" id="sup_construida" min="0" value="{{ old('sup_construida') }}">
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="tipopiso">Tipo de piso</label>
                           <select class="form-control" id="tipopiso" name="tipopisos_id">
                             @foreach($tipopisos as $tipopiso)
                               <option value="{{$tipopiso->id}}">{{$tipopiso->pisos}}</option>
                             @endforeach
                           </select>
                         </div>
                       </div>
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="amoblado">Amoblada</label>
                           <select class="form-control" id="amoblado" name="tipoamoblados_id">
                             @foreach($tipoamoblados as $tipoamoblado)
                               <option value="{{$tipoamoblado->id}}">{{$tipoamoblado->amoblados}}</option>
                             @endforeach
                           </select>
                         </div>
                       </div>
                     </div>
                     <div class="custom-separator"></div>

                   <!-- Segundo tab del SmartWizard -->
                   <div >

                     <br>
                     <div class="row">
                       <div class="col-6">
                         <div class="container form-group col-12">
                           <label for="titulo_propiedad">Titulo de publicación (Max. 40):</label>
                           <input type="text" name="titulo_propiedad" class="form-control" id="titulo_propiedad" maxlength="40" value="{{ old('titulo_propiedad') }}" required>
                         </div>
                         <div class="container form-group col-12">
                           <label for="descripcion_propiedad">Descripción (Max. 300):</label>
                           <input type="text" name="descripcion_propiedad" class="form-control" id="descripcion_propiedad" maxlength="300" value="{{ old('descripcion_propiedad') }}" required>
                         </div>
                       </div>
                       <div class="col-6">
                         <!-- Aqui esta el dropzone, funciona con el script del final -->
                           <div class="dropzone dropzone-file-area" id="fileUpload">
                             <div class="dz-default dz-message">
                               <h3 class="sbold">Arrastra o selecciona las fotos</h3>
                               <span>(La primera foto que arrastres quedará por defecto en el catálogo)</span>
                             </div>
                           </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-12">
                         <div class="container form-group">
                           <label for="">Financiamiento</label>
                           <div class="row">
                             <div class="col-3">
                               <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" name="contado" id="contado">
                                 <label class="custom-control-label" for="contado">Contado</label>
                               </div>
                             </div>
                             <div class="col-3">
                               <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" name="subsidio" id="subsidio">
                                 <label class="custom-control-label" for="subsidio">Subsidio</label>
                               </div>
                             </div>
                             <div class="col-3">
                               <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" name="credito" id="credito">
                                 <label class="custom-control-label" for="credito">Crédito hipotecario</label>
                               </div>
                             </div>
                             <div class="col-3">
                               <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" name="leasing" id="leasing">
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
                           <input name="valor_pesos" id = "valor_pesos" type="number" class="form-control" min="0" value='0' oninput="clptoUF(this.value)">
                         </div>
                       </div>
                       <div class="col-6">
                         <div class="container form-group">
                           <label for="sel1">Valor en UF:</label>
                           <input type="number" name="valor_uf" id="valor_uf" class="form-control" min="0" value='0' oninput="UFtoclp(this.value)">
                         </div>
                       </div>
                     </div>
                          <div class="custom-separator"></div>

                     <input type="text" name="estado_publicacion" style="display:none" id="estado_publicacion" class="form-control" value="espera">

                     <input type="button" id="btn-save" value="Guardar Publicación" class="btn btn-success btn-block">


                   </div>





                     <div>


                     </div>






                 </div>
                 <div class="tab-pane fade" id="profileBasic" role="tabpanel" aria-labelledby="profile-basic-tab">
                   @if($mispropiedades)
                     <section class = "product-cart">
                       <div class="row list-grid">

                         @foreach($mispropiedades as $propiedad)
                           <div class="list-item col-md-4">
                             <div class="card o-hidden mb-4 d-flex flex-column">
                               <div class="list-thumb d-flex">
                               <img alt="" src="{{ asset('storage/viviendas').'/'.$propiedad->id.'/0.png' }}" />
                               </div>
                               <div class="flex-grow-1 d-block">
                                 <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center">
                                   <a class="w-40 w-sm-100" href="{{ route('propiedadeshow',$propiedad->codigo) }}">
                                     <div class="item-title">
                                       <h4>{{$propiedad->titulo_propiedad}} </h4>
                                     </div>
                                   </a>
                                   <div class="row">
                                     <div class="col-4">
                                       <p class="m-0 text-muted text-small w-15 w-sm-100">Baños: {{$propiedad->nro_banos}}</p>
                                     </div>
                                     <div class="col-4">
                                       <p class="m-0 text-muted text-small w-15 w-sm-100">Habitaciones: {{$propiedad->nro_habitaciones}}</p>
                                     </div>
                                     <div class="col-4">
                                       <p class="m-0 text-muted text-small w-15 w-sm-100">Estacionamientos: {{$propiedad->nro_estacionamientos}}</p>
                                     </div>
                                   </div>
                                   <div class="row">
                                     {{$propiedad->direccion}}
                                   </div>
                                   <p class="m-0 text-muted text-small w-20 w-sm-100 d-none d-lg-block item-badges">
                                     <span class="badge badge-primary">UF: {{$propiedad->valor_uf}}</span>
                                   </p>
                                 </div>
                               </div>
                             </div>

                           </div>
                         @endforeach
                       </div>

                     </section>
                     @else
                       <div class="container">
                         Usted aun no tiene ninguna propiedad publicada
                       </div>
                     @endif
                 </div>

    </div>
         </div>
     </div>
 </div>





<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <b>¡Bienvenido de nuevo!</b> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                  <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                      <input type="hidden" id="pasandocodigo" name="" value="">
                      <div class="col-md-6">
                          <input id="email_modal" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus > @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span> @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                      <div class="col-md-6">
                          <input id="password_modal" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span> @enderror
                      </div>
                  </div>


                  <div class="form-group row mb-0">
                      <div class="col-md-8 offset-md-4 ">
                          <button type="button" class="btn btn-primary" onclick="login()">
                              {{ __('Iniciar sesión') }}
                          </button>

                          @if (Route::has('password.request'))
                          <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                              {{ __('Recuperar contraseña?') }}
                          </a>  -->
                          @endif
                          <br>
                          <br> Si no tienes cuenta, registrate <a type="button" onclick="showModal();" style="color:blue">aquí.</a>

                      </div>
                  </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <b>Necesitamos conocerte más</b> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                  <div class="form-group">
                      <input type="hidden" id="pasandocodigo2" name="" value="">
                      <label for="email">Primer Nombre</label>
                    <input id="name_modal2" type="text" class="form-control @error('name') is-invalid @enderror form-control-rounded" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror


                  </div>
                  <div class="form-group">
                      <label for="email">Segundo Nombre</label>
                      <input id="segundo_nombre_modal2" type="text" class="form-control @error('name') is-invalid @enderror form-control-rounded" name="segundo_nombre" value="{{ old('segundo_nombre') }}" required autocomplete="segundo_nombre" autofocus>

                      @error('segundo_nombre')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror


                  </div>
                  <div class="form-group">
                      <label for="email">Primer apellido</label>
                      <input id="apellido_paterno_modal2" type="text" class="form-control @error('apellido_paterno') is-invalid @enderror form-control-rounded" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required autocomplete="apellido_paterno" autofocus>

                      @error('apellido_paterno')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror


                  </div>
                  <div class="form-group">
                      <label for="email">Segundo apellido</label>
                      <input id="apellido_materno_modal2" type="text" class="form-control @error('apellido_materno') is-invalid @enderror form-control-rounded" name="apellido_materno" value="{{ old('apellido_materno') }}" required autocomplete="apellido_materno" autofocus>

                      @error('apellido_materno')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror


                  </div>
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email_modal2" type="email" class="form-control @error('email') is-invalid @enderror form-control-rounded" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="password">Contraseña</label>
                        <input id="password_modal2" type="password" class="form-control @error('password') is-invalid @enderror form-control-rounded" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                      <input id="roles_id" type="number" class="" name="roles_id" required autocomplete="1" value="2" style="display:none">
                      <input id="usuario" type="number" class="" name="usuario_id" required autocomplete="1" value="1" style="display:none">
                  </div>

                  <div class="form-group">
                        <label for="repassword">Confirmar contraseña</label>

                          <input id="password-confirm_modal2" type="password" class="form-control form-control-rounded" name="password_confirmation" required autocomplete="new-password">

                  </div>

                  <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary" onclick="register()">
                              {{ __('Registrarse') }}
                          </button>
                      </div>
                  </div>




            </div>

        </div>
    </div>
</div>




@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/jquery.smartWizard.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script>
<script src="{{asset('assets/js/dropzone.script.js')}}"></script>

<script type="text/javascript">

function showModal(){
      $('#exampleModal2').modal("hide");
     $('#exampleModal').modal("show");
 }




function login(){
  $.ajax({
                        url: "{{ route('login.modal') }}",
                        type: 'POST',
                        data: {
                                'contado'               : $('#contado').val(),
                                'subsidio'              : $('#subsidio').val(),
                                'credito'               : $('#credito').val(),
                          '     leasing'               : $('#leasing').val(),
                                'codigo' : document.getElementById('pasandocodigo').value,
                                'email': document.getElementById('email_modal').value,
                                'password': document.getElementById('password_modal').value,
                                '_token': $("meta[name='csrf-token']").attr("content")
                            },
                        dataType: 'JSON',
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                                },
                        success: function(response){

                           if (response.success) {

                                // $('#exampleModal2').modal('hide');
                                // document.getElementById('boton').style.display='none';
                                // document.getElementById('cont1').style.display='block';
                                //
                                //
                                // document.getElementById('cont1').innerHTML='Soy '+response.user.name+' '+response.user.apellido_paterno+'<br><input type="hidden" name="" value="'+response.user.id+'" id="usuario">';
                                // document.getElementById('btn-save').style.display='block';
                                 window.location = response.url;

                            }


                        },
                        error: function(){

                            $('#email').addClass('is-invalid');
                            $('#password').addClass('is-invalid');

                        }
                    });
}

function register(){
  $.ajax({
                        url: "{{ route('register.modal') }}",
                        type: 'POST',
                        data: {
                                'contado'               : $('#contado').val(),
                                'subsidio'              : $('#subsidio').val(),
                                'credito'               : $('#credito').val(),
                                'leasing'               : $('#leasing').val(),
                                'codigo' : document.getElementById('pasandocodigo2').value,
                                'name': document.getElementById('name_modal2').value,
                                'segundo_nombre': document.getElementById('segundo_nombre_modal2').value,
                                'apellido_paterno': document.getElementById('apellido_paterno_modal2').value,
                                'apellido_materno': document.getElementById('apellido_materno_modal2').value,
                                'email': document.getElementById('email_modal2').value,
                                'password': document.getElementById('password_modal2').value,
                                'password': document.getElementById('password-confirm_modal2').value,
                                '_token': $("meta[name='csrf-token']").attr("content")
                            },
                        dataType: 'JSON',
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                                },
                        success: function(response){

                           if (response.success) {
                                // $('#exampleModal').modal('hide');
                                // document.getElementById('boton').style.display='none';
                                // document.getElementById('cont1').style.display='block';
                                //
                                //
                                // document.getElementById('cont1').innerHTML='Soy '+response.user.name+' '+response.user.apellido_paterno+'<br><input type="hidden" name="" value="'+response.user.id+'" id="usuario">';
                                // document.getElementById('btn-save').style.display='block';
                                window.location = response.url;
                            }


                        },
                        error: function(){

                            // $('#email').addClass('is-invalid');
                            // $('#password').addClass('is-invalid');

                        }
                    });
}




$(document).ready(function(min, max) {

var num = Math.floor((Math.random() * 99) + 1);
$('#codigo').val(num);
$('#pasandocodigo').val(num);
$('#pasandocodigo2').val(num);
console.log(num);
});


 $(document).ready(function() {



   $('#btn-save').click(function() {

          var a=$('#tipopropiedad').val();

          var b=$('#estado').val();
          var c=$('#tipo_comercio').val();
          var d= $('#region').val();
          var e= $('#comunas').val();
          var f= $('#direccion').val();
          var g= $('#nro_habitaciones').val();
          var h= $('#nro_banos').val();
          var i= $('#nro_estacionamientos').val();
          var j= $('#sup_terreno').val();
          var k= $('#sup_construida').val();
          var l= $('#tipopiso').val();
          var m= $('#amoblado').val();
          var n= $('#titulo_propiedad').val();
          var o= $('#descripcion_propiedad').val();
          var p= $('#pic').val();
          var q= $('#contado').val();
          var r= $('#subsidio').val();
          var s= $('#credito').val();
          var t= $('#leasing').val();
          var u= $('#valor_pesos').val();
          var v= $('#valor_uf').val();
          var w= $('#usuario').val();
          var x= $('#estado_publicacion').val();

          console.log("tipopropiedad: "+a);
          console.log("estado: "+b);
          console.log("tipo_comercio: "+c);
          console.log("region :"+d);
          console.log("comunas :"+e);
          console.log("direccion :"+f);
          console.log("nro_habitaciones :"+g);
          console.log("nro_banos :"+h);
          console.log("nro_estacionamientos :"+i);
          console.log("sup_terreno :"+j);
          console.log("sup_construida :"+k);
          console.log("tipopiso :"+l);
          console.log("amoblado :"+m);
          console.log("titulo_propiedad :"+n);
          console.log("descripcion_propiedad :"+o);
          //console.log("pic :"+p);
          console.log("contado :"+q);
          console.log("subsidio :"+r);
          console.log("credito :"+s);
          console.log("leasing :"+t);
          console.log("valor_pesos :"+u);
          console.log("valor_uf :"+v);
          //console.log("usuario_id :"+w);
          console.log("estado_publicacion :"+x);



             $.ajax({
                 url: "{{ route('propiedades.store') }}",
                 type: "POST",
                 data: {
                   'codigo'           : $('#codigo').val(),
                   'tipopropiedad'         : $('#tipopropiedad').val(),
                   'estado'                : $('#estado').val(),
                   'tipo_comercio'         : $('#tipo_comercio').val(),
                   'region'                : $('#region').val(),
                   'comunas'               : $('#comunas').val(),
                   'direccion'             : $('#direccion').val(),
                   'nro_habitaciones'      : $('#nro_habitaciones').val(),
                   'nro_banos'             : $('#nro_banos').val(),
                   'nro_estacionamientos'  : $('#nro_estacionamientos').val(),
                   'sup_terreno'           : $('#sup_terreno').val(),
                   'sup_construida'        : $('#sup_construida').val(),
                   'tipopiso'              : $('#tipopiso').val(),
                   'amoblado'              : $('#amoblado').val(),
                   'titulo_propiedad'      : $('#titulo_propiedad').val(),
                   'descripcion_propiedad' : $('#descripcion_propiedad').val(),
                   //'fotos'                 : $('#pic').val(),
                   'valor_pesos'           : $('#valor_pesos').val(),
                   'valor_uf'              : $('#valor_uf').val(),
                   //'usuario_id'            : $('#usuario').val(),
                   'estado_publicacion'    : $('#estado_publicacion').val(),
                   '_token'                : $("meta[name='csrf-token']").attr("content")
                 },
                 dataType: 'JSON',
                 headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                 },
                 success: function(data) {
                   console.log(data);
                   console.log('succes' , data);

                   if(data.success == true){

                     //console.log(data);
                     console.log(data.codigo);
                     //$('#successDiv').removeClass('d-none');
                     //$('#successMsg').html('');

                     
                     if(data.modal==true){
                       $('#exampleModal2').modal("show");
                     }



                     //$('#successDiv').append(data.message);
                       // setTimeout(function(){
                       //     $('#successDiv').addClass('d-none');
                       //  }, 2000);
                       //var oTable = $('#motorstable').dataTable();
                        //oTable.api().ajax.reload();



                   }else{

                       //$('#errorDiv').removeClass('d-none');
                       //$('#errorMsg').html('');

                       //$.each(data.errors, function(key, value) {

                         // $('#errorMsg').append('<li >' + value + '</li>');
                       //});
                   }
                 },
                 error: function(xhr) {

                   console.log('error' , xhr);
             }
           });

     });

     // Smart Wizard


 });



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
