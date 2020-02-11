<!-- Vista que muestra el detalle de cada publicacion -->
@extends('layouts.master') @section('page-css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style media="screen">
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
                    <a href="{{route('wea')}}"> Home </a>
                </li>
                <li>
                    <a href="{{route('catalogo')}}"> Catálogo </a>
                </li>
                <li> <b> {{$propiedad->titulo_propiedad}}</b></li>
            </ul>

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
                                    <img src="{{ asset('images/'.$foto->img)}}" class="d-block w-100 rounded" alt="...">
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
                <div class="col-6">
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="ul-product-detail__brand-name ">
                                <h6>Inmueble a {{$propiedad->tipo_comercio}}</h6>
                                <h2 class="heading">{{$propiedad->titulo_propiedad}}</h2>
                                <h6>Comuna, Región</h6>
                                <h6>Publicado el 12/12/12</h6>
                                <!-- <p>{{$propiedad->estado_publicacion}}</p> -->
                                <!-- <span class="text-mute">Modern model 2019</span> -->
                            </div>
                            <hr>

                            <table class="text-primary table-responsive" style="font-size:36px;">
                                <tr>
                                    <th>UF</th>
                                    <th>&nbsp; {{$propiedad->valor_uf}}</th>
                                </tr>
                                <tr style="font-size:26px;">
                                    <td>CLP</td>
                                    <td>&nbsp; ${{number_format($propiedad->valor_pesos, 0)}} </td>
                                </tr>
                            </table>


                        </div>
                        <div class="col-6">
                            <div class="ul-product-detail__features">
                                <div class="card card-profile-1">
                                    <div class="card-body text-center">
                                        <div class="avatar box-shadow-2 mb-3">
                                            <img src="{{asset('assets/images/faces/3.jpg')}}" alt="">
                                        </div>
                                        <h5 class="m-0">Javier Leiva</h5>
                                        <p class="mt-0">Asesor Encargado</p>

                                        <button class="btn btn-primary btn-rounded mb-2">Contactar por correo</button>
                                        <button class="btn btn-primary btn-rounded">Contactar por WhatsApp</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4 mt-4 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <div class="ul-product-detail__border-box">
                                        <div class="ul-product-detail--icon mb-2">
                                            <i class="material-icons text-danger" style="font-size:40px">local_hotel</i>
                                        </div>

                                        <h6 class="text-muted">{{$propiedad->nro_habitaciones}}</h6>
                                        <h5 class="heading">Habitaciones</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-4 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <div class="ul-product-detail__border-box">
                                        <div class="ul-product-detail--icon mb-2">
                                            <i class="material-icons text-danger" style="font-size:40px">bathtub</i>
                                        </div>
                                        <h6 class="text-muted">{{$propiedad->nro_banos}}</h6>

                                        <h5 class="heading">Baños</h5>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 mt-4 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <div class="ul-product-detail__border-box">
                                        <div class="ul-product-detail--icon mb-2">
                                            <i class="material-icons text-danger" style="font-size:40px">directions_car</i>
                                        </div>
                                        <h6 class="text-muted">{{$propiedad->nro_estacionamientos}}</h6>

                                        <h5 class="heading">Estacionamientos</h5>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>



        <section >
            <div class="row">
                <div class="col-12 ">
                  <br>


                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> <b>Descripción</b> </a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <b>Características</b> </a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <b>Métodos de pago</b> </a>

                                </div>
                            </nav>
                            <div class="tab-content ul-tab__content " id="nav-tabContent">
                                <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                                            <p>
                                                {{$propiedad->descripcion_propiedad}}
                                            </p>

                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        <div class="col-12">
                                          <table>
                                            <tr>
                                              <td>Tipo:</td>
                                              <th>&nbsp;{{$inmueble->propiedades}}</th>
                                            </tr>
                                            <tr>
                                              <td>Estado:</td>
                                              <th>&nbsp;{{$propiedad->estado}}</th>
                                            </tr>

                                            <tr>
                                              <td>Amoblado:</td>
                                              <th>&nbsp;{{$amoblado->amoblados}}</th>
                                            </tr>
                                            <tr>
                                              <td>Terreno:</td>
                                              <th>&nbsp;{{$propiedad->sup_terreno}} m<sup>2</sup></th>
                                            </tr>
                                            <tr>
                                              <td>Construcción:</td>
                                              <th>&nbsp;{{$propiedad->sup_construida}} m<sup>2</sup></th>
                                            </tr>
                                            <tr>
                                              <td>Piso:</td>
                                              <th>&nbsp;{{$piso->pisos}}</th>
                                            </tr>

                                          </table>



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
                                                          <div class="ul-product-detail--icon mb-2">
                                                              @if($contado==1)
                                                              <i class="material-icons text-success" style="font-size:40px">check_circle</i>
                                                              @else
                                                                <i class="material-icons text-danger" style="font-size:40px">cancel</i>
                                                              @endif

                                                          </div>

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
                                                          <div class="ul-product-detail--icon mb-2">
                                                              @if($credito==1)
                                                              <i class="material-icons text-success" style="font-size:40px">check_circle</i>
                                                              @else
                                                                <i class="material-icons text-danger" style="font-size:40px">cancel</i>
                                                              @endif

                                                          </div>

                                                            <h5 class="heading">Credito</h5>
                                                            <p class="text-muted text-12">Breve descripción de que significa al contado</p>
                                                        </div>
                                                    </div>
                                                </div>





                                            </div>
                                            <div class="col-lg-3 col-sm-12 mb-2">


                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="ul-product-detail__border-box">
                                                          <div class="ul-product-detail--icon mb-2">
                                                              @if($subsidio==1)
                                                              <i class="material-icons text-success" style="font-size:40px">check_circle</i>
                                                              @else
                                                                <i class="material-icons text-danger" style="font-size:40px">cancel</i>
                                                              @endif

                                                          </div>

                                                            <h5 class="heading">Subsidio</h5>
                                                            <p class="text-muted text-12">Breve descripción de que significa al contado</p>
                                                        </div>
                                                    </div>
                                                </div>





                                            </div>
                                            <div class="col-lg-3 col-sm-12 mb-2">


                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="ul-product-detail__border-box">
                                                          <div class="ul-product-detail--icon mb-2">
                                                              @if($credito==1)
                                                              <i class="material-icons text-success" style="font-size:40px">check_circle</i>
                                                              @else
                                                                <i class="material-icons text-danger" style="font-size:40px">cancel</i>
                                                              @endif

                                                          </div>

                                                            <h5 class="heading">Credito Hipotecario</h5>
                                                            <p class="text-muted text-12">Breve descripción de que significa al contado</p>
                                                        </div>
                                                    </div>
                                                </div>





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

@endsection @section('page-js')
<script src="{{asset('assets/js/carousel.script.js')}}"></script>

@endsection
