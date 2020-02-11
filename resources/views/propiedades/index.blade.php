@extends('layouts.master') @section('page-css')

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
</style>
@endsection @section('main-content')

<div class="card mt-2 mb-4">
   <div class="card-header bg-transparent">
       <div class="breadcrumb mt-3">
           <ul>
               <li>
                   <a href="{{route('wea')}}"> <b>Home</b> </a>
               </li>
               <li>Mi Portal Inmobiliario</li>
           </ul>
       </div>
   </div>
   <div class="card-body">
       <ul class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

           <li class="nav-item">
               <a class=" nav-link active" id="home-basic-tab" data-toggle="tab" href="#homeBasic" role="tab" aria-controls="homeBasic" aria-selected="true"> <b>Formulario de Publicación</b> </a>
           </li>
           @if(Auth::check()) @if(Auth::user()->roles_id == 1)
           <li class="nav-item">
               <a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#contactPIll" role="tab" aria-controls="contactPIll" aria-selected="false"> <b>Solicitudes Pendientes de Revisión</b> </a>
           </li>
           @else
           <li class="nav-item">
               <a class=" nav-link " id="profile-basic-tab" data-toggle="tab" href="#profileBasic" role="tab" aria-controls="profileBasic" aria-selected="false"> <b>Mis Publicaciones</b> </a>
           </li>
           @endif @endif

       </ul>
       <div class="tab-content ul-tab__content" id="nav-tabContent">

           <div class="tab-pane fade show active" id="homeBasic" role="tabpanel" aria-labelledby="home-basic-tab">

               <br>

               <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                   <div class="row">
                       <div class="col-md-4 col-sm-12">
                           <div class="container form-group">
                               <input type="hidden" id="codigo" name="codigo" value="">
                               <label for="tipopropiedad">¿Qué tipo de propiedad tienes?</label>
                               <select class="form-control" id="tipopropiedad" name="tipopropiedad">
                                   <option value="" selected>Selecciona un tipo</option>
                                   @foreach ($tipopropiedades as $tipopropiedad)
                                   <option value="{{$tipopropiedad->id}}">{{$tipopropiedad->propiedades}}</option>
                                   @endforeach
                               </select>

                           </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                           <div class="container form-group">
                               <label for="estadovivienda">¿En qué estado se encuentra su inmueble?</label>
                               <select class="form-control" id="estado" name="estado">
                                   <option value="" selected>Selecciona un estado</option>
                                   <option value="nuevo">Nueva</option>
                                   <option value="usado">Usada</option>
                                   <option value="reacondicionado">Reacondicionada</option>
                               </select>
                           </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                           <div class="container form-group">
                               <label for="tipo_comercio">¿Qué desea hacer?</label>
                               <select class="form-control" id="tipo_comercio" name="tipo_comercio">
                                   <option value="" selected>Selecciona una opción</option>
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
                               <select class="form-control" name="region" id="region" onchange="changeRegion(this.value)">
                                 <option value="" selected>Selecciona una región</option>
                                   @foreach($regiones as $region)
                                   <option value="{{$region->id}}">{{$region->order}}, {{$region->nombre}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                           <div class="container form-group">
                               <label for="comunas">Comuna:</label>
                               <select class="form-control" id="comunas" name="comunas">
                                   <option value="" selected>Selecciona una comuna</option>
                                   @foreach($comunas as $comuna)
                                   <option value="{{$comuna->id}}">{{$comuna->nombre}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                       <div class="col-md-4 col-sm-12">
                           <div class="container form-group">
                               <label for="direccion">Dirección:</label>
                               <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}">
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
                               <select class="form-control" id="tipopiso" name="tipopisos">
                                 <option value="" selected>Selecciona un tipo de piso</option>
                                   @foreach($tipopisos as $tipopiso)
                                   <option value="{{$tipopiso->id}}">{{$tipopiso->pisos}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                       <div class="col-6">
                           <div class="container form-group">
                               <label for="amoblado">Amoblada</label>
                               <select class="form-control" id="amoblado" name="amoblado">
                                   <option value="" selected>Selecciona el espacio amoblado</option>
                                   @foreach($tipoamoblados as $tipoamoblado)
                                   <option value="{{$tipoamoblado->id}}">{{$tipoamoblado->amoblados}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="custom-separator"></div>

                   <!-- Segundo tab del SmartWizard -->
                   <div>

                       <br>
                       <div class="row">
                           <div class="col-6">
                               <div class="container form-group col-12">
                                   <label for="titulo_propiedad">Titulo de publicación (Max. 40):</label>
                                   <input type="text" name="titulo_propiedad" class="form-control" id="titulo_propiedad" maxlength="40" value="{{ old('titulo_propiedad') }}">
                               </div>
                               <div class="container form-group col-12">
                                   <label for="descripcion_propiedad">Descripción (Max. 300):</label>
                                   <input type="text" name="descripcion_propiedad" class="form-control" id="descripcion_propiedad" maxlength="300" value="{{ old('descripcion_propiedad') }}">
                               </div>
                           </div>
                           <div class="col-6">
                               <!-- Aqui esta el dropzone, funciona con el script del final -->
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
                                   <input name="valor_pesos" id="valor_pesos" type="number" class="form-control" min="0" value='' oninput="clptoUF(this.value)" placeholder="0">
                               </div>
                           </div>
                           <div class="col-6">
                               <div class="container form-group">
                                   <label for="sel1">Valor en UF:</label>
                                   <input type="number" name="valor_uf" id="valor_uf" class="form-control" min="0" value='' oninput="UFtoclp(this.value)" placeholder="0">
                               </div>
                           </div>
                       </div>
                       <div class="custom-separator"></div>
                       {{-- INICIO ALERTAS --}}
                       <div id="errorDiv"  class="alert alert-card alert-danger d-none" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                               <ul id="errorMsg"></ul>
                       </div>
                       {{-- FIN ALERTAS --}}

                       <input type="text" name="estado_publicacion" style="display:none" id="estado_publicacion" class="form-control" value="espera">

                       <input type="submit" name="upload" value="Guardar Publicación" class="btn btn-block" style="background-color:rgb(242, 121, 15);color:white;border-style:none">

                   </div>

                   <div>

                   </div>

               </form>

           </div>
           <div class="tab-pane fade" id="profileBasic" role="tabpanel" aria-labelledby="profile-basic-tab">
           @if($mispropiedades)
           <section class="product-cart">
               <div class="row list-grid p-3">

                   @foreach($mispropiedades as $propiedad)

                   <a href="{{ route('propiedadeshow',$propiedad->codigo) }}">
                       <div class="list-item col-md-3">
                           <div class="card o-hidden mb-4 d-flex flex-column">
                               <div class="list-thumb d-flex">
                                 @if($fotos==null)

                                   @else
                                   @foreach($fotos as $foto)
                                    @if($foto->codigo==$propiedad->codigo)
                                   <img src="{{ asset('images/'.$foto->img) }}" alt="">

                                     @endif
                                     @endforeach
                                   @endif
                               </div>
                               <div class="flex-grow-1 d-block">
                                   <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center">
                                       <a class="w-40 w-sm-100">
                                           <div class="item-title">
                                               <h4> <b>{{$propiedad->titulo_propiedad}}</b> </h4>
                                               <h6>Comuna, Región</h6>
                                           </div>
                                       </a>
                                       <div class="table-responsive">
                                           <table class="table table-sm">

                                               <tbody>
                                                   <tr>
                                                       <td scope="row">Baños</td>
                                                       <th style="text-align:right">{{$propiedad->nro_banos}}</th>

                                                   </tr>
                                                   <tr>
                                                       <td scope="row">Habitaciones</td>
                                                       <th style="text-align:right">{{$propiedad->nro_habitaciones}}</th>

                                                   </tr>
                                                   <tr>
                                                       <td scope="row">Estacionamientos</td>
                                                       <th style="text-align:right">{{$propiedad->nro_estacionamientos}}</th>

                                                   </tr>

                                               </tbody>
                                           </table>
                                       </div>
                                       <p class="m-0   w-55 w-sm-100 d-none d-lg-block item-badges">
                                           <span class="badge" style="background-color:rgb(242, 121, 15);color:white;">{{$propiedad->valor_uf}}UF</span>
                                       </p>

                                   </div>
                               </div>
                           </div>
                       </div>
                   </a>
                   @endforeach
               </div>
           </section>
           @else
           <div class="container">
               Usted aun no tiene ninguna propiedad publicada
           </div>
           @endif
       </div>
           <div class="tab-pane fade" id="contactPIll" role="tabpanel" aria-labelledby="nav-contact-tab">
           @if($propiedadesespera)
           <section class="product-cart">
               <div class="row list-grid">
                   <!-- Muestra las solicitudes de publicaciones -->
                   @foreach($propiedadesespera as $propiedad)
                   <a href="{{ route('propiedadeshow',$propiedad->codigo) }}">
                       <div class="list-item col-md-3">
                           <div class="card o-hidden mb-4 d-flex flex-column">
                               <div class="list-thumb d-flex">
                                 @if($fotos2==null)

                                @else
                                @foreach($fotos2 as $fotos)
                                 @if($fotos->codigo==$propiedad->codigo)
                                <img src="{{ asset('images/'.$fotos->img) }}" alt="">

                                  @endif
                                  @endforeach
                                @endif
                               </div>
                               <div class="flex-grow-1 d-block">
                                   <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center">
                                       <a class="w-40 w-sm-100">
                                           <div class="item-title">



                                               <h4> <b>{{$propiedad->titulo_propiedad}}</b> </h4>
                                               <h6>{{$propiedad->direccion}}-Comuna, Región</h6>
                                           </div>
                                       </a>
                                       <div class="table-responsive">
                                           <table class="table table-sm">

                                               <tbody>
                                                   <tr>
                                                       <td scope="row">Baños</td>
                                                       <th style="text-align:right">{{$propiedad->nro_banos}}</th>

                                                   </tr>
                                                   <tr>
                                                       <td scope="row">Habitaciones</td>
                                                       <th style="text-align:right">{{$propiedad->nro_habitaciones}}</th>

                                                   </tr>
                                                   <tr>
                                                       <td scope="row">Estacionamientos</td>
                                                       <th style="text-align:right">{{$propiedad->nro_estacionamientos}}</th>

                                                   </tr>

                                               </tbody>
                                           </table>
                                       </div>
                                       <p class="m-0   w-55 w-sm-100 d-none d-lg-block item-badges">
                                           <span class="badge badge-info">{{$propiedad->valor_uf}}UF</span>
                                       </p>

                                   </div>
                               </div>
                           </div>
                       </div>
                   </a>
                   @endforeach
               </div>
           </section>
           @else
           <div class="container">
               Aún no hay ninguna solicitud pendiente
           </div>
           @endif
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
                       <input id="email_modal" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email')
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
                       <button type="button" class="btn" onclick="login()" style="background:#F2790F;color:white">
                           <b>{{ __('Iniciar sesión') }}</b>
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
                   <input id="name_modal2" type="text" class="form-control @error('name') is-invalid @enderror form-control-rounded" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> @error('name')
                   <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span> @enderror

               </div>
               <div class="form-group">
                   <label for="email">Segundo Nombre</label>
                   <input id="segundo_nombre_modal2" type="text" class="form-control @error('name') is-invalid @enderror form-control-rounded" name="segundo_nombre" value="{{ old('segundo_nombre') }}" required autocomplete="segundo_nombre" autofocus> @error('segundo_nombre')
                   <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span> @enderror

               </div>
               <div class="form-group">
                   <label for="email">Primer apellido</label>
                   <input id="apellido_paterno_modal2" type="text" class="form-control @error('apellido_paterno') is-invalid @enderror form-control-rounded" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required autocomplete="apellido_paterno" autofocus> @error('apellido_paterno')
                   <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span> @enderror

               </div>
               <div class="form-group">
                   <label for="email">Segundo apellido</label>
                   <input id="apellido_materno_modal2" type="text" class="form-control @error('apellido_materno') is-invalid @enderror form-control-rounded" name="apellido_materno" value="{{ old('apellido_materno') }}" required autocomplete="apellido_materno" autofocus> @error('apellido_materno')
                   <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span> @enderror

               </div>
               <div class="form-group">
                   <label for="email">Email</label>
                   <input id="email_modal2" type="email" class="form-control @error('email') is-invalid @enderror form-control-rounded" name="email" value="{{ old('email') }}" required autocomplete="email"> @error('email')
                   <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span> @enderror
               </div>
               <div class="form-group">
                   <label for="password">Contraseña</label>
                   <input id="password_modal2" type="password" class="form-control @error('password') is-invalid @enderror form-control-rounded" name="password" required autocomplete="new-password"> @error('password')
                   <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span> @enderror
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

@endsection @section('page-js')

<script src="http://malsup.github.com/jquery.form.js"></script>

<script type="text/javascript">
   function showModal() {
       $('#exampleModal2').modal("hide");
       $('#exampleModal').modal("show");
   }

   function login() {

       var q = 0;
       var r = 0;
       var s = 0;
       var t = 0;

       if ($('#contado').prop('checked')) {
           var q = 1;
       }
       if ($('#subsidio').prop('checked')) {
           var r = 1;
       }
       if ($('#credito').prop('checked')) {
           var s = 1;
       }
       if ($('#leasing').prop('checked')) {
           var t = 1;
       }

       $.ajax({
           url: "{{ route('login.modal') }}",
           type: 'POST',
           data: {
               'contado': q,
               'subsidio': r,
               'credito': s,
               'leasing': t,
               'codigo': document.getElementById('pasandocodigo').value,
               'email': document.getElementById('email_modal').value,
               'password': document.getElementById('password_modal').value,
               '_token': $("meta[name='csrf-token']").attr("content")
           },
           dataType: 'JSON',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
           },
           success: function(response) {

               if (response.success) {
                   window.location = response.url;
               }

           },
           error: function() {

               $('#email').addClass('is-invalid');
               $('#password').addClass('is-invalid');

           }
       });
   }

   function register() {

       var q = 0;
       var r = 0;
       var s = 0;
       var t = 0;

       if ($('#contado').prop('checked')) {
           var q = 1;
       }
       if ($('#subsidio').prop('checked')) {
           var r = 1;
       }
       if ($('#credito').prop('checked')) {
           var s = 1;
       }
       if ($('#leasing').prop('checked')) {
           var t = 1;
       }

       $.ajax({
           url: "{{ route('register.modal') }}",
           type: 'POST',
           data: {
               'contado': q,
               'subsidio': r,
               'credito': s,
               'leasing': t,
               'codigo': document.getElementById('pasandocodigo2').value,
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
           success: function(response) {

               if (response.success) {

                   window.location = response.url;
               }

           },
           error: function() {

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

       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $('form').ajaxForm({

           success: function(data) {
               if (data.success == true) {
                   {
                       if (data.modal == true) {
                           $('#exampleModal2').modal("show");
                       } else {
                           window.location = data.url;
                       }
                   }
               }else{

                  $('#errorDiv').removeClass('d-none');
                   $('#errorMsg').html('');



                  $.each(data.errors, function(key, value) {

                     $('#errorMsg').append('<li >' + value + '</li>');
                  });
               }
           }
       });
   });


   // Funcion que cambia el value del input del valor_uf con respecto al valor ingresado en valor pesos
   function clptoUF(val) {
       document.getElementById("valor_uf").value = Math.trunc(val / {{$UF}} );
   }
   // Funcion que cambia el value del input del valor_pesos con respecto al valor ingresado en valor UF
   function UFtoclp(val) {
       document.getElementById("valor_pesos").value = Math.trunc(val * {{$UF}} );
   }
</script>

@endsection
