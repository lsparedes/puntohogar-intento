
@extends('layouts.app')

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">

@section('content')

  <div style="width: 60px;height: 60px;position: fixed;z-index:998;right:15px;bottom:15px;border-radius:50%">
    <center><a href="https://api.whatsapp.com/send?phone=56999430772" target="_blank" ><img src="{{asset('assets/img/nuevos/whatsapp.png')}}" alt="" width="100%"></a></center>
  </div>

  <div style="width: 60px;height: 60px;position: fixed;z-index:998;right:15px;bottom:80px;border-radius:50%">
    <center><img src="{{asset('assets/img/nuevos/hangouts.png')}}" alt="" width="100%"></center>
  </div>



  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom" style="z-index:1000">
      <div class="container">

        <a class="navbar-brand mr-lg-5" href="/">
          <img src="{{asset('assets/img/nuevos/logonnuevo.png')}}" alt="brand"  style="height:62px;margin-bottom:12px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbar_global">

          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="#">
                  <img src="{{asset('assets/img/brand/blue.png')}}" alt="brand">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>

          <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item ">
              <a href="#nosotros" class="nav-link"  role="button">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Nosotros</span>
              </a>
            </li>
            <li class="nav-item ">
              <a href="#catalogo" class="nav-link"  role="button">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Catálogo</span>
              </a>
            </li>
            <li class="nav-item ">
              <a href="#servicios" class="nav-link"  role="button">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Servicios</span>
              </a>
            </li>
            <li class="nav-item ">
              <a href="#noticias" class="nav-link"  role="button">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Noticias</span>
              </a>
            </li>
            <li class="nav-item ">
              <a href="#contacto" class="nav-link"  role="button">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Contacto</span>
              </a>
            </li>
          </ul>

          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" title="Traducir al Español">
                <span style="font-size:14px">ES</span>
                <span class="nav-link-inner--text d-lg-none">Español</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" title="Traducir al Inglés">
                <span style="font-size:14px">EN</span>
                <span class="nav-link-inner--text d-lg-none">Inglés</span>
              </a>
            </li>

            <li class="nav-item d-none d-lg-block ml-lg-4">
              <a href="{{ route('propiedades.index')}}"  class="btn btn-neutral btn-icon btn-sm" style="background-color:rgb(242, 121, 15);color:white;border-style:none">
                <span class="nav-link-inner--text">Publica Gratis</span>
              </a>
            </li>
          </ul>


            @if(Auth::check())

            <li class="nav-item d-none d-lg-block ">
              <a href="{{ route('logout') }}"  class="btn btn-danger btn-icon btn-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:white;border-style:none">
                <span class="nav-link-inner--text">Cerrar Sesión</span>
              </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

                    </li>

                          @else
                          <li class="nav-item d-none d-lg-block ">
                            <a  class="btn btn-neutral btn-icon btn-sm" style="background-color:rgb(27, 140, 129);color:white;border-style:none" href="{{ route('login') }}">
                              <!-- <span class="btn-inner--icon">
                                <i class="fa fa-cloud-download mr-2"></i>
                              </span> -->
                              <span class="nav-link-inner--text">Iniciar Sesión</span>
                            </a>
                          </li>
                          @endif



        </div>
      </div>
    </nav>
  </header>




  <main>
  <!-- Aqui empieza el invento -->
  <div class="slider" style="background-color: #002D80">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
      </ol>

      <div class="carousel-inner" >
      <!-- Primer slide del carousel -->

        <div class="carousel-item active" style="height: 100vh;background-image: linear-gradient(rgba(51, 15, 14, 0.5), rgba(0, 45, 128, 0.8)), url('{{asset('assets/img/nuevos/slide3.png')}}');background-size: cover;">


            <div class="carousel-caption" style="z-index:999 !important;top: calc(50% - 150px) !important;">
              <div class="row " >
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="text-align: center">

                      <h1 style="color:white"><b> Todo para ti y tu hogar.</b></h1>
                      <h2  class="d-none d-md-block" style="color:white;">En un mismo lugar</h2>
                      <br><br>
                      <h4 style="color:white">¡Bienvenido! ¿Qué deseas hacer?</h4>

                    <a href="">
                      <button type="button" class="btn btn-icon m-1" style="background-color:rgb(242, 121, 15) !important;color:white">
                        <span class="ul-btn__text">Comprar</span>
                      </button>
                    </a>

                    <a href="" >
                      <button type="button" class="btn btn-icon m-1" style="background-color:rgb(242, 121, 15) !important;color:white">
                        <span class="ul-btn__text">Arrendar</span>
                      </button>
                    </a>

                  </div>

                  <div class="d-none d-sm-block d-sm-none d-md-block col-lg-4 col-md-6 col-xl-4" >
                    <img  src="{{asset('assets/img/nuevos/logonnuevo.png')}}" alt="" width="100%;">
                  </div>

              </div>


            </div>

        </div>



        <div class="carousel-item w-100" style="height: 100vh;background-image: linear-gradient(rgba(51, 15, 14, 0.5), rgba(0, 45, 128, 0.8)), url('{{asset('assets/img/nuevos/slide1.png')}}');background-size: cover;">
          <div class="" style="top: calc(40% - 150px) !important;">
            <div class="container">
              <div class="col-12">
                <div class="row" style="height: 100vh">
                  <div class="col-6 my-auto ">

                  </div>
                  <div class="col-6 my-auto ">

                  </div>
                </div>
                <div class="carousel-caption" style="z-index:999 !important;width:100%;right:0% !important;left:0% !important;top: calc(40% - 150px) !important;">
                  <div class="col-12" style="">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="">
                        <div class="row">
                          <div class="ccol-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row">
                                  <div class="container" style="">
                                    <a href="#">
                                      <div class="our-team-main d-none d-md-block">
                                        <div class="team-front">
                                          <img src="{{asset('assets/img/nuevos/PINTURA.png')}}" class="img-fluid" >
                                          <div style="writing-mode: vertical-lr;transform: rotate(180deg);" >
                                            <h2 style="color:white !important;text-align:left;visibility:hidden" class="mx-auto">Traslado y mudanzaa</h2>
                                            <h2 style="color:black !important;text-align:left;padding-top:15px !important" class="mx-auto">Pinta tu hogar</h2>
                                          </div>
                                        </div>
                                        <div class="team-back" style="height:70vh;background-image: url('{{asset('assets/img/nuevos/brocha.jpg')}}'); background-size:inherit;background-position: 53% 30%">

                                          <span style="visibility:hidden">

                                          Especialistas en mano de obra residencial e industrial, materiales de pintura, trabajo garantizado en calidad y eficiencia.
                                          </span>
                                        </div>
                                      </div>

                                      <div class=" d-md-none">
                                        <div class="slide2-movil d-flex content-align-left ">
                                          <img src="{{asset('assets/img/nuevos/PINTURA.png')}}" class="" >
                                          <h5 class="my-auto ml-2">Pinta tu hogar</h5>
                                        </div>
                                      </div>


                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row">
                                  <div class="container">
                                    <a href="#">
                                      <div class="our-team-main d-none d-md-block">
                                        <div class="team-front">
                                          <img src="{{asset('assets/img/nuevos/LIMPIEZA.png')}}" class="img-fluid" />
                                          <div style="writing-mode: vertical-lr;transform: rotate(180deg);">
                                            <h2 style="color:white !important;text-align:left;visibility:hidden" class="mx-auto">Traslado y mudanzaa</h2>
                                            <h2 style="color:black !important;text-align:left;padding-top:15px !important" class="mx-auto">Limpia tu hogar</h2>
                                          </div>
                                        </div>
                                        <div class="team-back" style="height:70vh;background-image: url('{{asset('assets/img/nuevos/insumos.jpg')}}'); background-size:cover;background-position: 36% 30%">
                                          <span style="visibility:hidden">
                                          Limpieza residencial e industrial, minuciosas técnicas de limpieza desarrolladas para lograr un espacio limpio y brillante
                                          </span>
                                        </div>
                                      </div>

                                      <div class=" d-md-none">
                                        <div class="slide2-movil d-flex content-align-left ">
                                          <img src="{{asset('assets/img/nuevos/limpieza.png')}}" class="" >
                                          <h5 class="my-auto ml-2">Limpia tu hogar</h5>
                                        </div>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row">
                                  <div class="container">
                                    <a href="#">
                                      <div class="our-team-main d-none d-md-block">
                                        <div class="team-front">
                                          <img src="{{asset('assets/img/nuevos/Mudanza.png')}}" class="img-fluid" />
                                          <div style="writing-mode: vertical-lr;transform: rotate(180deg);">
                                            <h2 style="color:white !important;text-align:left;visibility:hidden" class="mx-auto">Traslado y mudanza</h2>
                                            <h2 style="color:black !important;text-align:left;padding-top:15px !important" class="mx-auto">Traslado y mudanza</h2>

                                          </div>
                                        </div>
                                        <div class="team-back" style="height:70vh;background-image: url('{{asset('assets/img/nuevos/transp.jpg')}}'); background-size:cover;background-position: 55% 0%">
                                          <span style="visibility:hidden">
                                          Te ayudamos con tu mudanza, cargamos y descargamos, y si lo crees necesario, te ayudamos con la instalación de tus pertenencias.
                                          </span>
                                        </div>
                                      </div>

                                      <div class=" d-md-none">
                                        <div class="slide2-movil d-flex content-align-left ">
                                          <img src="{{asset('assets/img/nuevos/mudanza.png')}}" class="" >
                                          <h5 class="my-auto ml-2">Traslado y mudanza</h5>
                                        </div>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row">
                                  <div class="container">
                                    <a href="#">
                                      <div class="our-team-main d-none d-md-block">
                                        <div class="team-front">
                                          <img src="{{asset('assets/img/nuevos/JARDINERIA.png')}}" class="img-fluid" />
                                          <div style="writing-mode: vertical-lr;transform: rotate(180deg);">
                                            <h2 style="color:white !important;text-align:left;visibility:hidden" class="mx-auto">Traslado y mudanzaa</h2>
                                            <h2 style="color:black !important;text-align:left;padding-top:15px !important" class="mx-auto">Jardineria</h2>
                                          </div>
                                        </div>
                                        <div class="team-back" style="height:70vh;background-image: url('{{asset('assets/img/nuevos/jardin.jpg')}}'); background-size:cover;background-position: 50% 25%">
                                          <span style="visibility:hidden">
                                          Un equipo de profesionales de la jardineria se encargara de quitar toda la maleza y adornar tu jardin a tu gusto.
                                          </span>
                                        </div>
                                      </div>

                                      <div class=" d-md-none">
                                        <div class="slide2-movil d-flex content-align-left ">
                                          <img src="{{asset('assets/img/nuevos/jardineria.png')}}" class="" >
                                          <h5 class="my-auto ml-2">Jardineria</h5>
                                        </div>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row">
                                  <div class="container">
                                    <a href="#">
                                      <div class="our-team-main d-none d-md-block">
                                        <div class="team-front">
                                          <img src="{{asset('assets/img/nuevos/SEGURIDAD.png')}}" class="img-fluid" />
                                          <div style="writing-mode: vertical-lr;transform: rotate(180deg);">
                                            <h2 style="color:white !important;text-align:left;visibility:hidden" class="mx-auto">Traslado y mudanzaa</h2>
                                            <h2 style="color:black !important;text-align:left;padding-top:15px !important" class="mx-auto">Seguridad</h2>
                                          </div>
                                        </div>
                                        <div class="team-back" style="height:70vh;background-image: url('{{asset('assets/img/nuevos/camara.jpg')}}'); background-size:cover;background-position: 8% 5%">
                                          <span style="visibility:hidden">
                                          Profesionales especializados en seguridad, instalación de camaras y cercos electricos.
                                          </span>
                                        </div>
                                      </div>

                                      <div class=" d-md-none">
                                        <div class="slide2-movil d-flex content-align-left ">
                                          <img src="{{asset('assets/img/nuevos/seguridad.png')}}" class="" >
                                          <h5 class="my-auto ml-2">Seguridad</h5>
                                        </div>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row">
                                  <div class="container">
                                    <a href="#">
                                      <div class="our-team-main d-none d-md-block">
                                        <div class="team-front">
                                          <img src="{{asset('assets/img/nuevos/REParaciones.png')}}" class="img-fluid" />
                                          <div style="writing-mode: vertical-lr;transform: rotate(180deg);">
                                            <h2 style="color:white !important;text-align:left;visibility:hidden" class="mx-auto">Traslado y mudanzaa</h2>
                                            <h2 style="color:black !important;text-align:left;padding-top:15px !important" class="mx-auto">Reparaciones</h2>
                                          </div>
                                        </div>
                                        <div class="team-back" style="height:70vh;background-image: url('{{asset('assets/img/nuevos/herramientas.jpg')}}'); background-size:cover;background-position: 39% 45%">
                                          <span style="visibility:hidden">
                                            Reparamos completamente tu hogar, grietas, daños menores y mayores, todo realizado por verdaderos profesionales.
                                          </span>
                                        </div>
                                      </div>

                                      <div class=" d-md-none">
                                        <div class="slide2-movil d-flex content-align-left ">
                                          <img src="{{asset('assets/img/nuevos/Reparaciones.png')}}" class="" >
                                          <h5 class="my-auto ml-2">Reparaciones</h5>
                                        </div>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row">
                                  <div class="container">
                                    <a href="#">
                                      <div class="our-team-main d-none d-md-block">
                                        <div class="team-front">
                                          <img src="{{asset('assets/img/nuevos/elec.png')}}" class="img-fluid" />
                                          <div style="writing-mode: vertical-lr;transform: rotate(180deg);">
                                            <h2 style="color:white !important;text-align:left;visibility:hidden" class="mx-auto">Traslado y mudanzaa</h2>
                                            <h2 style="color:black !important;text-align:left;padding-top:15px !important" class="mx-auto">Electricidad</h2>
                                          </div>
                                        </div>
                                        <div class="team-back" style="height:70vh;background-image: url('{{asset('assets/img/nuevos/electricidad.jpg')}}'); background-size:cover;background-position: 70% 20%">
                                          <span style="visibility:hidden">
                                            Nuestros electricistas realizaran todo lo necesario para que no tengas problemas electricos en tu hogar.
                                          </span>
                                        </div>
                                      </div>

                                      <div class=" d-md-none">
                                        <div class="slide2-movil d-flex content-align-left ">
                                          <img src="{{asset('assets/img/nuevos/elec.png')}}" class="" >
                                          <h5 class="my-auto ml-2">Electricidad</h5>
                                        </div>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row">
                                  <div class="container">
                                    <a href="#">
                                      <div class="our-team-main d-none d-md-block">
                                        <div class="team-front">
                                          <img src="{{asset('assets/img/nuevos/Gasfiteria.png')}}" class="img-fluid" />
                                          <div style="writing-mode: vertical-lr;transform: rotate(180deg);">
                                            <h2 style="color:white !important;text-align:left;visibility:hidden" class="mx-auto">Traslado y mudanzaa</h2>
                                            <h2 style="color:black !important;text-align:left;padding-top:15px !important" class="mx-auto">Gasfiteria</h2>
                                          </div>
                                        </div>
                                        <div class="team-back" style="height:70vh;background-image: url('{{asset('assets/img/nuevos/gasfiter.jpg')}}'); background-size:cover;background-position: 70% 20%">
                                          <span style="visibility:hidden">
                                            Todo el alcantarillado sera reparado o reemplazado, de manera que no tengas ninguna filtración.
                                          </span>
                                        </div>
                                      </div>

                                      <div class=" d-md-none">
                                        <div class="slide2-movil d-flex content-align-left ">
                                          <img src="{{asset('assets/img/nuevos/Gasfiteria.png')}}" class="" >
                                          <h5 class="my-auto ml-2">Gasfiteria</h5>
                                        </div>
                                      </div>
                                    </a>
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
              </div>
            </div>
          </div>
        </div>
      <!-- Aqui termina el tercer slide del carousel -->


      </div>

      <div class="carousel-caption" style="top: calc(40% - 150px)">
        <div class="wow fadeInUp animated" data-wow-offset="0" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
        </div>
      </div>





      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </div>






<!-- Aqui pa abajo lo que tenia antes -->

    <!-- <div class="position-relative">

      <video autoplay muted loop id="myVideo" width="100%" style="position:absolute;opacity:0.05">
        <source src="casas.mp4" type="video/mp4" >
        Your browser does not support HTML5 video.
      </video>

    </div> -->

    <section class="section section-lg" id="nosotros">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6 order-md-2">
            <img src="{{asset('assets/img/nuevos/agente.png')}}" class="img-fluid floating" alt="image">

          </div>
          <div class="col-md-6 order-md-1">
            <div class="pr-md-5">
              <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle mb-5" style="background-color:rgb(242, 121, 15);color:white">
                <i class="material-icons">
                people
                </i>
              </div>
              <h3><b>Nosotros</b></h3>
              <p>Somos un equipo de profesionales que ha logrado unificar todas las especialidades necesarias para el hogar en un solo lugar.</p>
              <ul class="list-unstyled mt-5">
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3" style="background-color:rgb(27, 140, 129);color:white">
                        <i class="ni ni-settings-gear-65"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">Generamos comodidad en nuestros clientes</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3" style="background-color:rgb(27, 140, 129);color:white">
                        <i class="ni ni-html5"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">Calidad de gestión y servicio</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3" style="background-color:rgb(27, 140, 129);color:white">
                        <i class="ni ni-satisfied"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">Nos acomodamos a tus necesidades</h6>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="section bg-gradient-warning section-lg" id="catalogo">
      <div class="container">
        <div class="row align-items-center">


          <div class="col-md-12">
            <div class="d-flex px-3 mb-4">
              <div>
                <div class="icon icon-lg icon-shape  shadow rounded-circle " style="background-color:white;color:rgb(242, 121, 15)">
                  <i class="material-icons">
                  list_alt
                  </i>
                </div>
              </div>
              <div class="pl-4" >
                <h4 class="display-3" style="color:white">Catálogo</h4>
                <p class="text-white">Aquí podrás encontrar un listado de los inmuebles que tenemos disponibles para tí.</p>
                <a href="{{ route('catalogo')}}"  class="btn btn-icon btn-sm" style="background-color:rgb(27, 140, 129);color:white">
                  <span class="nav-link-inner--text">Ir al Catálogo</span>
                </a>
                <!-- <p >Aquí va la descripción de todos los servicios que buscatucasa ofrece. </p> -->
              </div>
            </div>



          </div>
            </div>
      </div>
    </section>

    <section class="section bg-secondary" id="servicios">
      <div class="container">
        <div class="row align-items-center">


          <div class="col-md-12">
            <div class="d-flex px-3 mb-4">
              <div>
                <div class="icon icon-lg icon-shape  shadow rounded-circle " style="background-color:rgb(242, 121, 15);color:white">
                  <i class="ni ni-shop "></i>
                </div>
              </div>
              <div class="pl-4" >
                <h4 class="display-3 ">Servicios</h4>
                <!-- <p >Aquí va la descripción de todos los servicios que buscatucasa ofrece. </p> -->
              </div>
            </div>



          </div>
            </div>

        <div class="row row-grid align-items-center">


            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
              <a href="#contacto">
              <div class="hovereffect rounded shadow">
                <img class="img-responsive" src="{{asset('assets/img/nuevos/a.jpg')}}" alt="" >
                <div class="overlay">
                  <br>
                  <span style="color:white;font-size:17px"><b>PintaHogar</b></span>
                  <p>
                    <!-- <a style="font-size:12px">Solicitud de búsqueda casa/depto/terreno</a>
                    <br>
                    <a style="font-size:12px">Solicitud de búsqueda proyecto blanco/verde</a>
                    <br>
                    <a style="font-size:12px">Solicitud de búsqueda inmueble</a> -->
                  </p>
                </div>
              </div>
              </a>
            </div>


          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/b.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>LimpiaHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Arrendar mi casa o departamento</a>
               <br>
               <a style="font-size:12px">Arrendar una casa o departamento</a>
               <br>
               <a style="font-size:12px">Limpieza, reparación, seguridad o traslado</a> -->
              </p>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/c.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>ReparacionesHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Rentabilizar mi dinero</a>
               <br>
               <a style="font-size:12px">Invertir en un inmueble</a> -->

              </p>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/d.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>MudanzaHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Viabilidad de un terreno</a>
               <br>
               <a style="font-size:12px">Solicitud y tramitación de documentos</a>
               <br>
               <a style="font-size:12px">Estudio de un proyecto</a>
               <br>
               <a style="font-size:12px">Desarrollo de ante-proyecto</a> -->

              </p>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/e.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>SeguridadHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Lavado y abrillantado de pisos</a>
               <br>
               <a style="font-size:12px">Tratamiento de pisos flotantes</a>
               <br>
               <a style="font-size:12px">Limpieza de vidrios</a>
               <br>
               <a style="font-size:12px">Aseos generales</a>
               <br>
               <a style="font-size:12px">Solicitar cotización</a> -->

              </p>
              </div>
            </div>
            </a>
          </div>



          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/f.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>JardineríaHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Preparación de superficies y desmanchado</a>
               <br>
               <a style="font-size:12px">Pintura interior de paredes y cielo raso</a>
               <br>
               <a style="font-size:12px">Limpieza, reparación, seguridad o traslado</a> -->


              </p>
              </div>
            </div>
            </a>
          </div>



          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/g.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>ElectricidadHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Solicitar una cotización</a> -->


              </p>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/h.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>GasfiteríaHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Asesoría legal y financiera</a>
               <br>
               <a style="font-size:12px">Gestión financiera para créditos hipotecarios</a> -->


              </p>
              </div>
            </div>
            </a>
          </div>




          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/i.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>FinanciaHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Pre evaluación financiera</a>
               <br>
               <a style="font-size:12px">Asesoría financiera</a>
               <br>
               <a style="font-size:12px">Gestionar crédito hipotecario</a>
               <br>
               <a style="font-size:12px">Gestion financiera</a>
               <br>
               <a style="font-size:12px">Leasing</a>
               <br>
               <a style="font-size:12px">Lease - Back</a> -->


              </p>
              </div>
            </div>
            </a>
          </div>

          </div>
          <br>
          <hr>
          <br>
          <br>
          <div class="row row-grid align-items-center">





          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/j.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>BuscaHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Vender mi casa o departamento</a> -->



              </p>
              </div>
            </div>
            </a>
          </div>



          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/k.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>ArriendaHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Solicitar una cotización</a> -->
              </p>
              </div>
            </div>
            </a>
          </div>


          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-4 ">
            <a href="#contacto">
            <div class="hovereffect rounded shadow">
              <img class="img-responsive" src="{{asset('assets/img/nuevos/l.jpg')}}" alt="" >
              <div class="overlay">
                <br>
                <span style="color:white;font-size:17px"><b>VendeHogar</b></span>
              <p>
               <!-- <a style="font-size:12px">Solicitar una cotización</a> -->
              </p>
              </div>
            </div>
            </a>
          </div>



        </div>
      </div>
    </section>

    <section class="section pb-100 bg-gradient-warning" id="noticias">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6 order-lg-2 ml-lg-auto">
            <div class="position-relative pl-md-5">
              <img src="{{asset('assets/img/ill/ill-2.svg')}}" class="img-center img-fluid" alt="image" width="70%">

              <div class="card shadow shadow-lg--hover mt-5">
                <div class="card-body">
                <iframe src="https://open.spotify.com/embed/playlist/27Y8vFRT5z10VQ4OjJoHXb" width="100%" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media" style="z-index:999;position:relative"></iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="d-flex px-3">
              <div>
                <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                  <i class="ni ni-notification-70" style="color:rgb(27, 140, 129)"></i>
                </div>
              </div>
              <div class="pl-4">
                <h4 class="display-3 text-white">Noticias</h4>
                <p class="text-white">Vea como se mueve el mercado de las inmobiliarias, nosotros informamos y asesoramos con un nuevo hogar.</p>
              </div>
            </div>
            <div class="card shadow shadow-lg--hover mt-5">
              <div class="card-body">
                <div class="d-flex px-3">
                  <div>
                    <div class="icon icon-shape  rounded-circle text-white" style="background-color:rgb(27, 140, 129)">
                      <i class="ni ni-active-40"></i>
                    </div>
                  </div>
                  <div class="pl-4">
                    <h5 class="title" style="color:rgb(27, 140, 129)">Hacia dónde va el mercado inmobiliario en Chile</h5>
                      <div id="cuerponoticia" style="overflow: hidden;text-overflow: ellipsis;max-height: 13ch;">
                        En una reciente entrevista publicada por el diario El Mercurio, el gerente general de Reistock.com (empresa de asesoría en inversión inmobiliaria), Sergio Arcos, abordó las transformaciones que está teniendo el mercado inmobiliario chileno. De acuerdo al análisis de la empresa, en los últimos cinco años los valores de las propiedades han aumentado casi en 30% en el Gran Santiago, lo que ha traído como consecuencia un cambio en el perfil de los compradores y un aumento de los llamados multifamily, edificios completos de una empresa que se destinan al arriendo.
                      </div>
                      <div class="row">
                        <div class="col-5">
                          <a href="https://www.coproch.cl/2019/12/19/hacia-donde-va-el-mercado-inmobiliario-en-chile"  style="color:rgb(27, 140, 129)">Saber más</a>
                        </div>
                        <div class="col-7">
                          <span style="color:rgb(27, 140, 129)">Fuente: El mostrador</span>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow shadow-lg--hover mt-5">
              <div class="card-body">
                <div class="d-flex px-3">
                  <div>
                    <div class="icon icon-shape  rounded-circle text-white" style="background-color:rgb(27, 140, 129)">
                      <i class="ni ni-active-40"></i>
                    </div>
                  </div>
                  <div class="pl-4">
                    <h5 class="title " style="color:rgb(27, 140, 129)">Los factores para aprovechar al máximo la luz natural en un departamento</h5>
                      <div id="cuerponoticia" style="overflow: hidden;text-overflow: ellipsis;max-height: 13ch;">
                      Un factor cada vez más importante a la hora de comprar un departamento, tiene relación con el valor de la luz natural y cómo ésta le imprime carácter a los espacios, aportando a la percepción de calidez y amplitud.
                      </div>
                    <div class="row">

                      <div class="col-5">
                        <a href="https://www.elmostrador.cl/generacion-m/2019/12/17/los-factores-para-aprovechar-al-maximo-la-luz-natural-en-un-departamento/"  style="color:rgb(27, 140, 129)">Saber más</a>
                      </div>
                      <div class="col-7">
                      <span style="color:rgb(27, 140, 129)">Fuente: El mostrador</span>
                      </div>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>

    <section class="section section-lg">
      <div class="container">

        <br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
    </section>



    <section class="section section-lg pt-lg-0 section-contact-us" id="contacto">
      <div class="container">
        <div class="row justify-content-center mt--300">
          <div class="col-lg-6">
            <div class="card bg-gradient-secondary shadow">

              <div class="card-body p-lg-5">

                <div class="row">
                  <div class="col-9">
                    <h4 class="mb-1">¿Qué necesitas?</h4>
                    <p class="mt-0 mb-4">Estamos aquí para ayudarte.</p>
                  </div>
                  <div class="col-3">
                    <img src="{{asset('assets/images/Recurso 1.png')}}" alt="" width="90%">
                  </div>
                </div>

                <div class="form-group">

                 <select class="form-control shadow-sm" style="border:none">
                   <option>Selecciona un departamento...</option>
                   <option>PintaHogar</option>
                   <option>LimpiaHogar</option>
                   <option>ReparacionesHogar</option>
                   <option>MudanzaHogar</option>
                   <option>SeguridadHogar</option>
                   <option>JardineriaHogar</option>
                   <option>ElectricidadHogar</option>
                   <option>GasfiteriaHogar</option>
                   <option>FinanciaHogar</option>
                   <option>BuscaHogar</option>
                   <option>ArriendaHogar</option>
                   <option>VendeHogar</option>
                   <option></option>
                 </select>
               </div>
                <div class="form-group mt-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                    </div>
                    <input class="form-control" placeholder="Tu nombre" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Tu Email" type="email">
                  </div>
                </div>
                <div class="form-group mb-4">
                  <textarea class="form-control form-control-alternative" name="name" rows="4" cols="80" placeholder="Escríbenos un mensaje..."></textarea>
                </div>
                <div>
                  <button type="button" class="btn btn-round btn-block btn-lg" style="background-color:#F2790F;color:white">Enviar Mensaje</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">

          <iframe class="shadow" style="border-radius:5px;border:.0625rem solid rgba(0, 0, 0, .05)" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.9741195813485!2d-73.05491638470957!3d-36.819140079944674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9669b5c60425782f%3A0xba66d7b2bf209cd1!2zQ29sbyBDb2xvIDExNjAsIENvbmNlcGNpw7NuLCBCw61vIELDrW8!5e0!3m2!1ses!2scl!4v1577124688115!5m2!1ses!2scl" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>



          </div>
        </div>
      </div>
    </section>


  </main>

  <footer class="footer has-cards">
    <div class="container container-lg">

    </div>
    <div class="container">
      <div class="row row-grid align-items-center my-md">
        <div class="col-lg-6">
          <img src="{{asset('assets/img/nuevos/logonnuevo.png')}}" alt="" width="80%">
          <br><br>
          <h4 class="mb-0 font-weight-light">Todo para tí y tu hogar en un mismo lugar.</h4>
        </div>
        <div class="col-lg-6 text-lg-center btn-wrapper">
          <a target="_blank" href="https://twitter.com/puntohogar.cl" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Síguenos" style="border-radius:50%">
            <i class="fa fa-twitter " style="margin-top:30%"></i>
          </a>
          <a target="_blank" href="https://www.facebook.com/puntohogar.cl" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Síguenos" style="border-radius:50%">
            <i class="fa fa-facebook-square" style="margin-top:30%"></i>
          </a>
          <a target="_blank" href="https://www.instagram.com/puntohogar.cl/" class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round" data-toggle="tooltip" data-original-title="Síguenos" style="border-radius:50%">
            <i class="fa fa-instagram" style="margin-top:30%"></i>
          </a>

        </div>
      </div>
      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; 2019 <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
        <div class="col-md-6">
          <ul class="nav nav-footer justify-content-end">
            <li class="nav-item">
              <a href="https://www.drup.cl" class="nav-link" target="_blank">Drup</a>
            </li>
            <li class="nav-item">
              <a href="https://www.drup.cl/nosotros" class="nav-link" target="_blank">Nosotros</a>
            </li>
            <li class="nav-item">
              <a href="https://www.drup.cl/servicios" class="nav-link" target="_blank">Servicios</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <b>¡Bienvenido de nuevo! </b> </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4 ">
                            <button type="submit" class="btn btn-sm" style="background:#F2790F;color:white">
                                {{ __('Iniciar sesión') }}
                            </button>

                            @if (Route::has('password.request'))
                            <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Recuperar contraseña?') }}
                            </a>  -->
                            @endif
                            <br>
                            <br> Si no tienes cuenta, registrate <a href="{{route('register')}}">aquí.</a>
                        </div>
                    </div>
                </form>
              </div>

          </div>
      </div>
  </div>
<!-- cuerponoticia -->
@endsection
