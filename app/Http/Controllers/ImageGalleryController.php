<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imagenes;
use DB;
use App\Propiedad;
use Illuminate\Support\Facades\Auth;
use Validator;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function subir(Request $request)
   {
     $rules = array(
        'file.*'             => 'required',
      );

      $messages = array(
        'file.*.required'    => 'El campo imagen es obligatorio.'
      );

      $validator = Validator::make($request->all(), $rules, $messages);

       if ($validator->fails()){
         return response()->json(['success'=> false, 'errors' => $validator->errors()->all()]);
       }





        $propiedad = DB::table('propiedades')->where('codigo', '=', $request->codigo)->first();

        $regiones = DB::table('regiones')->select('*')->where('id','=',11)->get();
        $comunas = DB::table('comunas')->select('*')->where('region_id','=',11)->get();
        $tipopropiedades = DB::table('tipo_propiedades')->select('*')->get();
        $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
        $tipopisos = DB::table('tipo_pisos')->select('*')->get();
        $tipofinanciamientos = DB::table('tipo_financiamientos')->select('*')->get();
        // Recuperamos los financiamientos aceptados anteriores
        $contadoaux = DB::table('financiamientos')->where([
            ['propiedades_id', '=', $propiedad->id],
            ['tipofinanciamientos_id','=',1],
        ])->get();
        if($contadoaux->count() == 0)$contado=0;
        else $contado=1;
        $subsidioaux = DB::table('financiamientos')->where([
            ['propiedades_id', '=', $propiedad->id],
            ['tipofinanciamientos_id','=',2],
        ])->get();
        if($subsidioaux->count() == 0)$subsidio=0;
        else $subsidio=1;
        $leasingaux = DB::table('financiamientos')->where([
            ['propiedades_id', '=', $propiedad->id],
            ['tipofinanciamientos_id','=',3],
        ])->get();
        if($leasingaux->count() == 0)$leasing=0;
        else $leasing=1;
        $creditoaux = DB::table('financiamientos')->where([
            ['propiedades_id', '=', $propiedad->id],
            ['tipofinanciamientos_id','=',4],
        ])->get();
        if($creditoaux->count() == 0)$credito=0;
        else $credito=1;
        //Para recuperar el valor de la UF en la variable $UF
        $apiUrl = 'https://mindicador.cl/api';
        if ( ini_get('allow_url_fopen') ) {
            $json = file_get_contents($apiUrl);
        } else {
            //De otra forma utilizamos cURL
            $curl = curl_init($apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($curl);
            curl_close($curl);
        }

        if(Auth::check()){
            $mispropiedades = DB::table('propiedades')->select('*')->where('usuario_id',Auth::user()->id)->get();
        }else{
            $mispropiedades = null;
        }
        $dailyIndicators = json_decode($json);
        $UF = intval($dailyIndicators->uf->valor);
          $fotos = DB::table('imagenes')->where('codigo', '=', $propiedad->codigo)->get();
        $active_tab="edicion_imagenes";

        $image_code = '';
        $images = $request->file('file');

        foreach($images as $image){
          $new_name = rand() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('images'), $new_name);
          $image_code .= '<div class="col-md-3" style="margin-bottom:24px;"><img src="/images/'.$new_name.'" class="img-thumbnail" /></div>';

          DB::table('imagenes')->insert(
             ['codigo' => $request->codigo, 'img' => $new_name]
          );
        }

        return response()->json(['success'=> true, 'message' => 'La propiedad se agregó correctamente.','image'=>$image_code]);


   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $imagen = DB::table('imagenes')->where('id','=',$id)->first();
      $propiedad = DB::table('propiedades')->where('codigo', '=', $imagen->codigo)->first();

      $regiones = DB::table('regiones')->select('*')->where('id','=',11)->get();
      $comunas = DB::table('comunas')->select('*')->where('region_id','=',11)->get();
      $tipopropiedades = DB::table('tipo_propiedades')->select('*')->get();
      $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
      $tipopisos = DB::table('tipo_pisos')->select('*')->get();
      $tipofinanciamientos = DB::table('tipo_financiamientos')->select('*')->get();
      // Recuperamos los financiamientos aceptados anteriores
      $contadoaux = DB::table('financiamientos')->where([
          ['propiedades_id', '=', $propiedad->id],
          ['tipofinanciamientos_id','=',1],
      ])->get();
      if($contadoaux->count() == 0)$contado=0;
      else $contado=1;
      $subsidioaux = DB::table('financiamientos')->where([
          ['propiedades_id', '=', $propiedad->id],
          ['tipofinanciamientos_id','=',2],
      ])->get();
      if($subsidioaux->count() == 0)$subsidio=0;
      else $subsidio=1;
      $leasingaux = DB::table('financiamientos')->where([
          ['propiedades_id', '=', $propiedad->id],
          ['tipofinanciamientos_id','=',3],
      ])->get();
      if($leasingaux->count() == 0)$leasing=0;
      else $leasing=1;
      $creditoaux = DB::table('financiamientos')->where([
          ['propiedades_id', '=', $propiedad->id],
          ['tipofinanciamientos_id','=',4],
      ])->get();
      if($creditoaux->count() == 0)$credito=0;
      else $credito=1;
      //Para recuperar el valor de la UF en la variable $UF
      $apiUrl = 'https://mindicador.cl/api';
      if ( ini_get('allow_url_fopen') ) {
          $json = file_get_contents($apiUrl);
      } else {
          //De otra forma utilizamos cURL
          $curl = curl_init($apiUrl);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $json = curl_exec($curl);
          curl_close($curl);
      }

      if(Auth::check()){
          $mispropiedades = DB::table('propiedades')->select('*')->where('usuario_id',Auth::user()->id)->get();
      }else{
          $mispropiedades = null;
      }
      $dailyIndicators = json_decode($json);
      $UF = intval($dailyIndicators->uf->valor);

      imagenes::find($id)->delete();
        $fotos = DB::table('imagenes')->where('codigo', '=', $propiedad->codigo)->get();
          $active_tab="edicion_imagenes";
        return view('propiedades.form',compact('mispropiedades','UF','contado','leasing','credito','subsidio','propiedad','regiones','comunas','tipopropiedades','tipoamoblados','tipopisos','tipofinanciamientos','fotos','active_tab'));
    }
}
