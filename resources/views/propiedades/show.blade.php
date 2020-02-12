<!-- Vista que muestra el detalle de cada publicacion -->
@extends('layouts.master')
@section('page-css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style media="screen">
.main-content-wrap {
    background: #F2E3D5;
}
</style>
@endsection



@section('main-content')

<div class="card mt-2 mb-4">
   <div class="card-header bg-transparent">
       <div class="breadcrumb mt-3">
           <ul>
               <li>
                   <a href="{{route('wea')}}"> Home </a>
               </li>
               <li>
                  <a href="{{route('propiedades.index')}}"> <b>Mi Portal Inmobiliario</b> </a>
                </li>
               <li>Mis Publicaciones - {{$propiedad->titulo_propiedad}}</li>
           </ul>
           @if(Auth::check())
               <!-- Si el usuario logeado es un admin, y la propiedad esta en espera, puede aceptarla o rechazarla -->
               @if(Auth::user()->roles_id == 1 and $propiedad->estado_publicacion == "espera")
                   <!-- <a href="{{route('update',$propiedad->id)}}"  class="btn btn-success btn-icon " style="color:white;border-style:none;margin-left:10px">
                       <span class="nav-link-inner--text">Aceptar</span>
                   </a> -->
                   <a href="" type="button" data-toggle="modal" data-target="#exampleModal2" class="btn btn-success btn-icon " style="color:white;border-style:none;margin-left:10px">
                       <span class="nav-link-inner--text">Aceptar</span>
                   </a>
                   <a href="" type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-icon " style="color:white;border-style:none;margin-left:10px">
                       <span class="nav-link-inner--text">Rechazar</span>
                   </a>
                   <a type="button" class="btn btn-warning btn-icon" onclick="onLoadBody();" style="color:white;border-style:none;margin-left:10px">
                       <span class="nav-link-inner--text">Editar</span>
                   </a>

               @endif
               @if(Auth::user()->id == $propiedad->usuario_id)
                   <!-- Si fue rechazada su publicacion, se habilita botod de editar todo -->
                   @if($propiedad->estado_publicacion == "rechazada")
                   <a href="{{route('editpropiedad', $propiedad->id)}}" type="button" class="btn btn-success btn-icon " style="color:white;border-style:none;margin-left:10px">
                       <span class="nav-link-inner--text">Editar</span>
                   </a>

                   @endif
               @endif
               @endif
       </div>
   </div>
   <div class="card-body p-5">
     <section class="ul-product-detail">


                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="ul-product-detail__image">


                                         <!-- Carousel que muestra las fotografias de la publicacion -->

                                         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                         <div class="carousel-inner">


                                           @foreach($fotos as $key => $foto)
                                              <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                  <img src="{{ asset('images/'.$foto->img)}}" class="d-block w-100"  alt="...">
                                              </div>
                                              @endforeach


                                         </div>
                                         <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                           <span class="sr-only">Previous</span>
                                         </a>
                                         <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                           <span class="sr-only">Next</span>
                                         </a>
                                       </div>


                                 </div>
                             </div>
                             <!-- CAracteristicas mas importantes de la vivienda -->
                             <div class="col-lg-6">
                                 <div class="ul-product-detail__brand-name mb-4">
                                    <input type="text" id="titulo" name="" value="{{$propiedad->titulo_propiedad}}" readonly>
                                     <p>{{$propiedad->estado_publicacion}}</p>
                                     <!-- <span class="text-mute">Modern model 2019</span> -->
                                 </div>

                                 <div class="ul-product-detail__price-and-rating d-flex align-items-baseline">
                                     <h3 class="font-weight-700 text-primary mb-0 mr-5">CLP: ${{$propiedad->valor_pesos}}</h3>
                                     <h3 class="font-weight-700 text-primary mb-0 mr-2">UF:{{$propiedad->valor_uf}}</h3>
                                 </div>


                                 <div class="ul-product-detail__features mt-3">
                                     <h6 class=" font-weight-700">Características:</h6>
                                     <ul class="m-0 p-0">
                                         <li>
                                             <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                             <span class="align-middle">Inmuble: {{$inmueble->propiedades}}</span>
                                         </li>
                                         <li>
                                             <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                             <span class="align-middle">Estado: {{$propiedad->estado}}</span>
                                         </li>
                                         <li>
                                             <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                             <span class="align-middle">Comercio: {{$propiedad->tipo_comercio}}</span>
                                         </li>
                                         <li>
                                             <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                             <span class="align-middle">Amoblado: {{$amoblado->amoblados}}</span>
                                         </li>
                                     </ul>
                                 </div>


                             </div>
                         </div>


     </section>

     <section class="ul-product-detail__box">
         <div class="row">
             <div class="col-lg-3 col-md-3 mt-4 text-center">
                 <div class="card">
                     <div class="card-body">
                         <div class="ul-product-detail__border-box">
                             <div class="ul-product-detail--icon mb-2">
                                 <i class="material-icons text-danger" style="font-size:40px">local_hotel</i>
                             </div>
                             <h5 class="heading">Habitaciones</h5>
                             <p class="text-muted text-12">{{$propiedad->nro_habitaciones}}</p>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-3 mt-4 text-center">
                 <div class="card">
                     <div class="card-body">
                         <div class="ul-product-detail__border-box">
                             <div class="ul-product-detail--icon mb-2">
                                 <i class="material-icons text-danger" style="font-size:40px">bathtub</i>
                             </div>
                             <h5 class="heading">Baños</h5>
                             <p class="text-muted text-12">{{$propiedad->nro_banos}}</p>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-lg-3 col-md-3 mt-4 text-center">
                 <div class="card">
                     <div class="card-body">
                         <div class="ul-product-detail__border-box">
                             <div class="ul-product-detail--icon mb-2">
                                 <i class="material-icons text-danger" style="font-size:40px">directions_car</i>
                             </div>
                             <h5 class="heading">Estacionamientos</h5>
                             <p class="text-muted text-12">{{$propiedad->nro_estacionamientos}}</p>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-lg-3 col-md-3 mt-4 text-center">
                 <div class="card">
                     <div class="card-body">
                         <div class="ul-product-detail__border-box">
                             <div class="ul-product-detail--icon mb-2">
                                 <i class="material-icons text-danger" style="font-size:40px">navigation</i>
                             </div>
                             <h5 class="heading">Ubicación</h5>
                             <p class="text-muted text-12">{{$propiedad->direccion}}</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <section class="ul-product-detail__tab">
         <div class="row">
             <div class="col-lg-12 col-md-12 mt-4">
                 <div class="card mt-2 mb-4 ">
                     <div class="card-body">
                         <nav>
                             <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                 <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab"
                                     href="#nav-home" role="tab" aria-controls="nav-home"
                                     aria-selected="true">Descripción</a>
                                 <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                     role="tab" aria-controls="nav-profile" aria-selected="false">Características</a>
                                 <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                     role="tab" aria-controls="nav-contact" aria-selected="false">Métodos de pago</a>
                                 <a class="nav-item nav-link" id="nav-brand-tab" data-toggle="tab" href="#nav-brand"
                                     role="tab" aria-controls="nav-contact" aria-selected="false">Información Extra</a>
                             </div>
                         </nav>
                         <div class="tab-content ul-tab__content p-5" id="nav-tabContent">
                             <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                 <div class="row">
                                     <div class="col-lg-4 col-md-4 col-sm-12">

                                     </div>
                                     <div class="col-lg-8 col-md-8 col-sm-12">
                                         <h5 class="text-uppercase font-weight-700 text-muted mt-4 mb-2" id="titulo"> {{$propiedad->titulo_propiedad}}</h5>
                                         <p>
                                             {{$propiedad->descripcion_propiedad}}
                                         </p>
                                     </div>
                                 </div>
                             </div>
                             <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                 <div class="row">
                                     <div class="col-12">
                                         Superficie Terreno: {{$propiedad->sup_terreno}} <br>
                                         Superficie Construida: {{$propiedad->sup_construida}} <br>
                                         Tipo piso: {{$piso->pisos}} <br>
                                     </div>
                                 </div>
                             </div>
                             <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                 <div class="ul-product-detail__nested-card mt-2">
                                     <div class="row text-center">
                                         <div class="col-lg-3 col-sm-12 mb-2">
                                             <div class="card">
                                                 <div class="card-body">
                                                     <div class="ul-product-detail__border-box">

                                                         <h5 class="heading">Contado</h5>
                                                         <p class="text-muted text-12">Breve descripción de que significa al contado</p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-lg-3 col-sm-12 mb-2">
                                             <div class="card">
                                                 <div class="card-body">
                                                     <div class="ul-product-detail__border-box">

                                                         <h5 class="heading">Subsidio</h5>
                                                         <p class="text-muted text-12">Breve descripción de que significa subsidio</p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-lg-3 col-sm-12 mb-2">
                                             <div class="card">
                                                 <div class="card-body">
                                                     <div class="ul-product-detail__border-box">

                                                         <h5 class="heading">Credito Hipotecario</h5>
                                                         <p class="text-muted text-12">Breve descripción de que significa credito hipotecario</p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-lg-3 col-sm-12 mb-2">
                                             <div class="card">
                                                 <div class="card-body">
                                                     <div class="ul-product-detail__border-box">

                                                         <h5 class="heading">Leasing</h5>
                                                         <p class="text-muted text-12">Breve descripción de que significa leasing</p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="tab-pane fade" id="nav-brand" role="tabpanel" aria-labelledby="nav-contact-tab">
                                 <div class="row">

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
   </div>
</div>






<!-- Modal que se muestra al administrador cuando rechazara una publicacion -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Motivo de Rechazo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="" action="{{ route('down',$propiedad->id) }}">
                <div class="modal-body">
                    <p>Usted va a rechazar este publicación, por favor, ingrese las razones detalladamente para comunicarlas al propietario de la vivienda.</p>
                    <textarea name = "detalle" rows="4" style="width:100% !important" required></textarea>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Enviar" class="btn btn-primary">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal que se muestra al administrador cuando rechazara una publicacion -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Indica el asesor a cargo de esta propiedad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method="GET" action="{{route('update',$propiedad->id)}}">
                <select class="form-control" name="asesor" id="asesor">
                  @foreach($asesores as $asesor)
                  <option value="{{$asesor->id}}">{{$asesor->nombre}}</option>
                  @endforeach
                </select>

                <div class="modal-footer">
                    <input type="submit" value="Enviar" class="btn btn-primary">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>

                </div>
              </form>
            </div>


        </div>
    </div>
</div>
<!-- Modal que se muestra para editar algunos atributos de una publicacion una publicacion -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar publicación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    </div>
</div>




@endsection

@section('page-js')
<script src="{{asset('assets/js/carousel.script.js')}}"></script>
<script type="text/javascript">
function onLoadBody() {
  console.log(document.getElementById('titulo').value);
    document.getElementById('titulo').readOnly = false;
  }
</script>

@endsection
