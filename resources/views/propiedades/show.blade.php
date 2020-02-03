<!-- Vista que muestra el detalle de cada publicacion -->
@extends('layouts.master')
@section('page-css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

@endsection

@section('main-content')

<div class="breadcrumb">
           <h1>Home</h1>
           <ul>
               <li><a href="{{route('propiedades.index')}}">Mi portal Inmobiliario</a></li>
               <li>Mis publicaciones</li>
           </ul>
       </div>

<div class="separator-breadcrumb border-top"></div>
@if(Session::has('success'))
    <div class="alert alert-card alert-success" role="alert">
    {{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
    </div>
@endif

      <!-- Alert Error -->
@if($errors->all())
   <div class="alert alert-card alert-danger" role="alert">
   @foreach ($errors->all() as $error)
{{ $error }}
@endforeach
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

@endif

<section class="ul-product-detail">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="ul-product-detail__image">

                                <div class="card-body">
                                    <!-- Carousel que muestra las fotografias de la publicacion -->
                                    <h4 class="card-title mb-3" style = "text-align:center"> Fotografias</h4>
                                    <div class="carousel_wrap">
                                        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">

                                            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CAracteristicas mas importantes de la vivienda -->
                        <div class="col-lg-6">
                            <div class="ul-product-detail__brand-name mb-4">
                                <h5 class="heading">{{$propiedad->titulo_propiedad}}</h5>
                                <!-- <span class="text-mute">Modern model 2019</span> -->
                            </div>

                            <div class="ul-product-detail__price-and-rating d-flex align-items-baseline">
                                <h3 class="font-weight-700 text-primary mb-0 mr-2">CLP: ${{$propiedad->valor_pesos}}</h3>
                                <h3 class="font-weight-700 text-primary mb-0 mr-2">UF:{{$propiedad->valor_uf}}</h3>
                            </div>


                            <div class="ul-product-detail__features mt-3">
                                <h6 class=" font-weight-700">Caracteristicas:</h6>
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

                            <!-- <div class="ul-product-detail__quantity d-flex align-items-center mt-3">
                                <input type="number" class="form-control col-2">
                                <button type="button" class="btn btn-primary m-1">
                                    <i class="i-Full-Cart text-15"> </i>
                                    Add To Cart</button>
                            </div> -->
                        </div>
                    </div>
                </div>
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
                                role="tab" aria-controls="nav-profile" aria-selected="false">Caracteristicas</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Metodos de pago</a>
                            <a class="nav-item nav-link" id="nav-brand-tab" data-toggle="tab" href="#nav-brand"
                                role="tab" aria-controls="nav-contact" aria-selected="false">About Brand</a>
                        </div>
                    </nav>
                    <div class="tab-content ul-tab__content p-5" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">

                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <h5 class="text-uppercase font-weight-700 text-muted mt-4 mb-2"> {{$propiedad->titulo_propiedad}}</h5>
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
                                <!-- Aqui deberia ir la informacion de contacto seun la reunion con Javier.... -->
























                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal que se muestra al administrador cuando rechazara una publicacion -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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


@endsection
