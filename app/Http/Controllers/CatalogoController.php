<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = DB::table('imagenes')->join('propiedades','propiedades.codigo','=','imagenes.codigo')->get();
        $mispropiedades = DB::table('propiedades')->select('propiedades.id','propiedades.codigo','propiedades.titulo_propiedad','comunas.nombre as comuna','regiones.nombre as region','propiedades.nro_banos','propiedades.nro_habitaciones','propiedades.nro_estacionamientos','propiedades.valor_uf')
                            ->leftJoin('comunas','propiedades.comunas_id','=','comunas.id')
                            ->leftJoin('regiones','comunas.region_id','=','regiones.id')
                            ->get();

        return view('catalogo.catalogo', compact('mispropiedades', 'fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $propiedad = DB::table('propiedades')->where('id', '=', $id)->first();

      $fotos = DB::table('imagenes')->where('codigo', '=', $propiedad->codigo)->get();
      $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
      $inmueble = DB::table('tipo_propiedades')->find($propiedad->tipopropiedades_id);
      $amoblado = DB::table('tipo_amoblados')->find($propiedad->tipoamoblados_id);
      $piso = DB::table('tipo_pisos')->find($propiedad->tipopisos_id);
      $financiamientos = DB::table('tipo_financiamientos')->select('tipo_financiamientos.financiamientos as nombre')->join('financiamientos','tipo_financiamientos.id','=','financiamientos.tipofinanciamientos_id')->where('financiamientos.propiedades_id', '=', $id)->get();

      $contado=0;
      $leasing=0;
      $credito=0;
      $subsidio=0;
      foreach ($financiamientos as $fin) {
        if($fin->nombre=="Contado"){
          $contado=1;
        }
        if($fin->nombre=="Leasing"){
          $leasing=1;
        }
        if($fin->nombre=="Credito Hipotecario"){
          $credito=1;
        }
        if($fin->nombre=="Subsidio"){
          $subsidio=1;
        }


      }
      $asesores=DB::table('asesores')->select('asesores.nombre','asesores.correo','asesores.whatsapp')->leftJoin('poseen','asesores.id','=','poseen.asesores_id')->leftJoin('propiedades','propiedades.id','=','poseen.propiedades_id')->where('propiedades.id','=',$id)->first();

      //dd($asesores);

      return view('catalogo.show',compact('piso','propiedad','inmueble','amoblado','tipoamoblados','fotos','contado','leasing','credito','subsidio','asesores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
