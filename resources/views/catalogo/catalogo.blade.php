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
                   <a href="{{route('wea')}}"> Home </a>
               </li>
               <li> <b>Catálogo</b> </li>
           </ul>
       </div>
   </div>
   <div class="card-body">
       <ul class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">


           <li class="nav-item">
               <a class=" nav-link active" id="profile-basic-tab" data-toggle="tab" href="#profileBasic" role="tab" aria-controls="profileBasic" aria-selected="false"> <b>Catálogo</b> </a>
           </li>


       </ul>
       <div class="tab-content ul-tab__content" id="nav-tabContent">


           <div class="tab-pane fade show active" id="profileBasic" role="tabpanel" aria-labelledby="profile-basic-tab">


           <section class="product-cart">
             <div class="row">


              <div class="col-3">
                <h4> <b>Filtros</b> </h4>
                <p>Ajusta los siguientes parámetros para realizar tu búsqueda.</p>
                <div class="card ">
                    <div class="card-body">
                        <form>

                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-form-label col-5 pt-0">Tipo</div>
                                    <div class="col-7">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                Casa
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Departamento
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-5">Estado</div>
                                <div class="col-7">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Nueva
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Usada
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Reacondicionada
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-form-label col-5 pt-0">Acción</div>
                                    <div class="col-7">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios2" id="gridRadios3" value="option1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                Comprar
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios2" id="gridRadios4" value="option2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Arrendar
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-form-label col-5 pt-0">Región</div>
                                    <div class="col-7">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios3" id="gridRadios5" value="option1" checked disabled>
                                            <label class="form-check-label" for="gridRadios1">
                                                Región del BioBio
                                            </label>
                                        </div>


                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-form-label col-5 pt-0">Comuna</div>
                                    <div class="col-7">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios5" id="gridRadios8" value="option1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                Chiguayante
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios5" id="gridRadios9" value="option1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                Concepción
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios5" id="gridRadios10" value="option1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                Hualpén
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios5" id="gridRadios11" value="option1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                San Pedro de la Paz
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios5" id="gridRadios12" value="option1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                Talcahuano
                                            </label>
                                        </div>


                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-form-label col-5 pt-0">Amoblado</div>
                                    <div class="col-7">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios4" id="gridRadios6" value="option1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                Sí
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios4" id="gridRadios7" value="option1" checked >
                                            <label class="form-check-label" for="gridRadios1">
                                                No
                                            </label>
                                        </div>


                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-5">Pago</div>
                                <div class="col-7">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck2">
                                        <label class="form-check-label" for="gridCheck1">
                                            Contado
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck2">
                                        <label class="form-check-label" for="gridCheck1">
                                            Subsidio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck2">
                                        <label class="form-check-label" for="gridCheck1">
                                            Crédito Hipotecario
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck2">
                                        <label class="form-check-label" for="gridCheck1">
                                            Leasing
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-5">Dormitorios</div>
                                <div class="col-7">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck3">
                                        <label class="form-check-label" for="gridCheck1">
                                            1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck3">
                                        <label class="form-check-label" for="gridCheck1">
                                            2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck3">
                                        <label class="form-check-label" for="gridCheck1">
                                            3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck3">
                                        <label class="form-check-label" for="gridCheck1">
                                            4 o más
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-5">Baños</div>
                                <div class="col-7">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck4">
                                        <label class="form-check-label" for="gridCheck1">
                                            1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck4">
                                        <label class="form-check-label" for="gridCheck1">
                                            2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck4">
                                        <label class="form-check-label" for="gridCheck1">
                                            3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck4">
                                        <label class="form-check-label" for="gridCheck1">
                                            4 o más
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-5">Superficie</div>
                                <div class="col-7">
                                    <div>
                                      <label for="formControlRange">Terreno (hasta X m<sup>2</sup>) </label>
                                      <input type="range" class="form-control-range" id="formControlRange">
                                    </div>
                                    <div>
                                      <label for="formControlRange">Construida (hasta x m<sup>2</sup>) </label>
                                      <input type="range" class="form-control-range" id="formControlRange">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-5">Valor</div>
                                <div class="col-7">
                                    <div>
                                      <label for="formControlRange">Hasta: (UF/CLP/USD)</label>
                                      <input type="range" class="form-control-range" id="formControlRange">
                                    </div>
                                </div>
                            </div>
                            <br>


                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block" style="background-color:rgb(242, 121, 15);color:white;border-style:none">Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
              <div class="col-9">
                <div class="row list-grid p-3">
                     @if($mispropiedades)

                    @foreach($mispropiedades as $propiedad)

                     <a href="{{ route('catalogoshow',$propiedad->id) }}">
                        <div class="list-item col-4">
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
                                                <h6>{{$propiedad->comuna}}, {{$propiedad->region}}</h6>
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
                                            <span class="badge " style="background-color:rgb(242, 121, 15);color:white;">{{$propiedad->valor_uf}}UF</span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                       @endif
                </div>
              </div>
               </div>
           </section>


       </div>

       </div>
   </div>
</div>







@endsection @section('page-js')

<script src="http://malsup.github.com/jquery.form.js"></script>



@endsection
