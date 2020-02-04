<!-- Vista que se muestra al editar completamente una publicacion -->
@extends('layouts.master')


@section('main-content')



<div class="row">
  <div class="col-md-12">
    <!-- SmartWizard html -->
    <form enctype="multipart/form-data" method="POST" action="{{ route('editAll', $propiedad->id)}}" role="form" id="smartwizard">
      {{ csrf_field() }}
      
      <div>
        <div id="step-1" class="">
          <h3 class="border-bottom border-gray pb-2">Vivienda</h3>
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

                <div class="dropzone dropzone-file-area" id="fileUpload">
                  <div class="dz-default dz-message">

                    <h3 class="sbold">Arrastra o selecciona las fotos</h3>
                    <span>La primera foto que arrastres quedara por defecto en el catalogo</span>
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
