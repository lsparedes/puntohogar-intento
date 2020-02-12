<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propiedad;
use Illuminate\Support\Facades\Auth;
use Mail;
use Str;
use DB;
use Storage;
use Validator;

class PropiedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





    public function index()
    {
      $regiones = DB::table('regiones')->select('*')->where('id','=',11)->get();
      $comunas = DB::table('comunas')->select('*')->where('region_id','=',11)->get();
      $tipopropiedades = DB::table('tipo_propiedades')->select('*')->get();
      $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
      $tipopisos = DB::table('tipo_pisos')->select('*')->get();
      $tipofinanciamientos = DB::table('tipo_financiamientos')->select('*')->get();

      if(Auth::check()){


          $mispropiedades = DB::table('propiedades')->select('*')->where('usuario_id',Auth::user()->id)->get();

          $fotos = DB::table('imagenes')->join('propiedades','propiedades.codigo','=','imagenes.codigo')->where('propiedades.usuario_id','=',Auth::user()->id)->get();

      }else{
          $mispropiedades = null;
          $fotos= null;
      }
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
        $dailyIndicators = json_decode($json);
        $UF = $dailyIndicators->uf->valor;

        $propiedadesespera = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"espera")->get();
        $fotos2 = DB::table('imagenes')->join('propiedades','propiedades.codigo','=','imagenes.codigo')->where('propiedades.estado_publicacion','=',"espera")->get();
        return view('propiedades.index',compact('UF','regiones','comunas','tipopropiedades','tipoamoblados','tipopisos','tipofinanciamientos','mispropiedades','propiedadesespera','fotos','fotos2'));
      // Recupera las propiedades que han sido aceptadas por un administrador
      //$propiedades = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"aceptada")->get();
      // Si hay un usuario activo, retorna sus publicaciones
      //$user = Auth::user();
      //if(Auth::check()){

          //$mispropiedades = DB::table('propiedades')->select('*')->where('usuario_id',Auth::user()->id)->get();
      //}else{
          //$mispropiedades = null;
      //}
      // Recupera las solicitudes que aun se ecuentran en espera (Solo se muestran en la vista si el usuario es un administrador)
      //$propiedadesespera = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"espera")->get();
      //return view('propiedades.index',compact('propiedades','user','mispropiedades','propiedadesespera'));
      //return view('propiedades.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //Para crear el formulario de publica gratis se recuperan los datos para los select
      $regiones = DB::table('regiones')->select('*')->where('id','=',11)->get();
      $comunas = DB::table('comunas')->select('*')->where('region_id','=',11)->get();
      $tipopropiedades = DB::table('tipopropiedades')->select('*')->get();
      $tipoamoblados = DB::table('tipoamoblados')->select('*')->get();
      $tipopisos = DB::table('tipopisos')->select('*')->get();
      $tipofinanciamientos = DB::table('tipofinanciamientos')->select('*')->get();
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
        $dailyIndicators = json_decode($json);
        $UF = $dailyIndicators->uf->valor;
        return view('propiedades.create',compact('UF','regiones','comunas','tipopropiedades','tipoamoblados','tipopisos','tipofinanciamientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     function upload(Request $request)
    {
      $rules = array(
         'tipopropiedad'         => 'required|not_in:0',
         'estado'                => 'required|not_in:0',
         'tipo_comercio'         => 'required|not_in:0',
         'region'                => 'required|not_in:0',
         'comunas'               => 'required|not_in:0',
         'direccion'             => 'required|string|max:70',
         'nro_habitaciones'      => 'required|string|max:70',
         'nro_banos'             => 'required|string|max:70',
         'nro_estacionamientos'  => 'required|string|max:70',
         'sup_terreno'           => 'required|string|max:70',
         'sup_construida'        => 'required|string|max:70',
         'tipopisos'             => 'required|not_in:0',
         'amoblado'              => 'required|not_in:0',
         'titulo_propiedad'      => 'required|string|max:70',
         'descripcion_propiedad' => 'required|string|max:70',
         'file.*'                  => 'required',
         // 'contado'               => 'required|string|max:70',
         // 'subsidio'              => 'required|string|max:70',
         // 'credito'               => 'required|string|max:70',
         // 'leasing'               => 'required|string|max:70',
         'valor_pesos'           => 'required|string|max:70',
         'valor_uf'              => 'required|string|max:70'
       );
       $messages = array(

         'tipopropiedad.required'         => 'El campo tipo de propiedad es obligatorio.',
         'estado.required'                => 'El campo estado es obligatorio.',
         'tipo_comercio.required'         => 'El campo opción es obligatorio.',
         'region.required'                => 'El campo región es obligatorio.',
         'comunas.required'               => 'El campo comuna es obligatorio.',
         'direccion.required'             => 'El campo dirección es obligatorio.',
         'nro_habitaciones.required'      => 'El campo número habitaciones es obligatorio.',
         'nro_banos.required'             => 'El campo número baños es obligatorio.',
         'nro_estacionamientos.required'  => 'El campo numero estacionamientos es obligatorio.',
         'sup_terreno.required'           => 'El campo superficie de terreno es obligatorio.',
         'sup_construida.required'        => 'El campo superficie construida es obligatorio.',
         'tipopisos.required'             => 'El campo tipo pisos es obligatorio.',
         'amoblado.required'              => 'El campo amoblados es obligatorio.',
         'titulo_propiedad.required'      => 'El campo título propiedad es obligatorio.',
         'descripcion_propiedad.required' => 'El campo descripción propiedad es obligatorio.',
         'file.*.required'                  => 'El campo imagen es obligatorio.',
         'valor_pesos.required'           => 'El campo valor en pesos es obligatorio.',
         'valor_uf.required'              => 'El campo valor en UF es obligatorio.',

         'direccion.max'                  =>  'El campo direccion debe tener como máximo 70 caracteres.',
         'nro_habitaciones.max'           =>  'El campo número habitaciones debe tener como máximo 2 dígitos.',
         'nro_banos.max'                  =>  'El campo número de baños debe tener como máximo 2 dígitos.',
         'nro_estacionamientos.max'       =>  'El campo número de estacionamientos debe tener como máximo 2 dígitos.',
         'sup_terreno.max'                =>  'El campo superficie de terreno debe tener como máximo 6 dígitos.',
         'sup_construida.max'             =>  'El campo superficie construida debe tener como máximo 6 dígitos.'

       );

       $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
          return response()->json(['success'=> false, 'errors' => $validator->errors()->all()]);
        }
      //Aqui inserta la propiedad a la base de datos
        if(Auth::check()){



          //Aqui inserta la propiedad a la base de datos
          DB::table('propiedades')->insert([
                  'codigo' => $request->codigo,
                  'titulo_propiedad' => $request->titulo_propiedad,
                  'descripcion_propiedad' => $request->descripcion_propiedad,
                  'valor_uf' => $request->valor_uf,
                  'valor_pesos' => $request->valor_pesos,
                  'nro_habitaciones' => $request->nro_habitaciones,
                  'nro_banos' => $request->nro_banos,
                  'estado' => $request->estado,
                  'sup_construida' => $request->sup_construida,
                  'sup_terreno' => $request->sup_terreno,
                  'estado_publicacion' => $request->estado_publicacion,
                  'tipopropiedades_id' => $request->tipopropiedad,
                  'tipoamoblados_id' => $request->amoblado,
                  'tipopisos_id' => $request->tipopisos,
                  'comunas_id' => $request->comunas,
                  'usuario_id' => Auth::user()->id,
                  'tipo_comercio' => $request->tipo_comercio,
                  'nro_estacionamientos' => $request->nro_estacionamientos,
                  'direccion' => $request->direccion,]
              );
              $propiedad = DB::table('propiedades')->where('codigo',$request->codigo)->first();

              if ($request->contado==1){
                  DB::table('financiamientos')->insert(

                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 1]
                  );
              }
              if ($request->subsidio==1){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 2]
                 );
              }

               if ($request->leasing==1){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 3]
                 );
              }
              if ($request->credito==1){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 4]
                 );
              }
              $image_code = '';
     $images = $request->file('file');
     foreach($images as $image)
     {
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $new_name);
      $image_code .= '<div class="col-md-3" style="margin-bottom:24px;"><img src="/images/'.$new_name.'" class="img-thumbnail" /></div>';
      DB::table('imagenes')->insert(
          ['codigo' => $request->codigo, 'img' => $new_name]
      );
     }


        return response()->json(['success'=> true, 'message' => 'La propiedad se agregó correctamente a la tabla propiedades.','modal'=>false,'image'=>$image_code,'url'=>route('propiedadeshow',$request->codigo)]);
        }else{
          //no logeado
          DB::table('propiedadestemporal')->insert([
                  'codigo' => $request->codigo,
                  'titulo_propiedad' => $request->titulo_propiedad,
                  'descripcion_propiedad' => $request->descripcion_propiedad,
                  'valor_uf' => $request->valor_uf,
                  'valor_pesos' => $request->valor_pesos,
                  'nro_habitaciones' => $request->nro_habitaciones,
                  'nro_banos' => $request->nro_banos,
                  'estado' => $request->estado,
                  'sup_construida' => $request->sup_construida,
                  'sup_terreno' => $request->sup_terreno,
                  'estado_publicacion' => $request->estado_publicacion,
                  'tipopropiedades_id' => $request->tipopropiedad,
                  'tipoamoblados_id' => $request->amoblado,
                  'tipopisos_id' => $request->tipopisos,
                  'comunas_id' => $request->comunas,
                  //'usuario_id' => $request->usuario_id,
                  'tipo_comercio' => $request->tipo_comercio,
                  'nro_estacionamientos' => $request->nro_estacionamientos,
                  'direccion' => $request->direccion,]
              );
              $propiedad = DB::table('propiedades')->where('codigo',$request->codigo)->first();

              if ($request->contado==1){
                  DB::table('financiamientos')->insert(

                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 1]
                  );
              }
              if ($request->subsidio==1){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 2]
                 );
              }

               if ($request->leasing==1){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 3]
                 );
              }
              if ($request->credito==1){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 4]
                 );
              }
              $image_code = '';
     $images = $request->file('file');
     foreach($images as $image)
     {
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $new_name);
      $image_code .= '<div class="col-md-3" style="margin-bottom:24px;"><img src="/images/'.$new_name.'" class="img-thumbnail" /></div>';
      DB::table('imagenes')->insert(
          ['codigo' => $request->codigo, 'img' => $new_name]
      );
     }




                return response()->json(['success'=> true, 'message' => 'La propiedad se agregó correctamente.','modal'=>true,'image'=>$image_code]);

        }//fin else no logueado


    }




    public function store(Request $request)
    {
      //Aqui inserta la propiedad a la base de datos
        if(Auth::check()){
          //Aqui inserta la propiedad a la base de datos
          DB::table('propiedades')->insert([
                  'codigo' => $request->codigo,
                  'titulo_propiedad' => $request->titulo_propiedad,
                  'descripcion_propiedad' => $request->descripcion_propiedad,
                  'valor_uf' => $request->valor_uf,
                  'valor_pesos' => $request->valor_pesos,
                  'nro_habitaciones' => $request->nro_habitaciones,
                  'nro_banos' => $request->nro_banos,
                  'estado' => $request->estado,
                  'sup_construida' => $request->sup_construida,
                  'sup_terreno' => $request->sup_terreno,
                  'estado_publicacion' => $request->estado_publicacion,
                  'tipopropiedades_id' => $request->tipopropiedad,
                  'tipoamoblados_id' => $request->amoblado,
                  'tipopisos_id' => $request->tipopiso,
                  'comunas_id' => $request->comunas,
                  'usuario_id' => Auth::user()->id,
                  'tipo_comercio' => $request->tipo_comercio,
                  'nro_estacionamientos' => $request->nro_estacionamientos,
                  'direccion' => $request->direccion,]
              );

              $propiedad = DB::table('propiedades')->where('codigo',$request->codigo)->first();

              if ($request->contado==1){
                  DB::table('financiamientos')->insert(

                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 1]
                  );
              }
              if ($request->subsidio==1){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 2]
                 );
              }

               if ($request->leasing==1){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 3]
                 );
              }
              if ($request->credito==1){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 4]
                 );
              }
            return response()->json(['success'=> true, 'message' => 'La propiedad se agregó correctamente a la tabla propiedades.','modal'=>false,'url'=>route('propiedadeshow',$request->codigo)]);
        }else{

          DB::table('propiedadestemporal')->insert([
                  'codigo' => $request->codigo,
                  'titulo_propiedad' => $request->titulo_propiedad,
                  'descripcion_propiedad' => $request->descripcion_propiedad,
                  'valor_uf' => $request->valor_uf,
                  'valor_pesos' => $request->valor_pesos,
                  'nro_habitaciones' => $request->nro_habitaciones,
                  'nro_banos' => $request->nro_banos,
                  'estado' => $request->estado,
                  'sup_construida' => $request->sup_construida,
                  'sup_terreno' => $request->sup_terreno,
                  'estado_publicacion' => $request->estado_publicacion,
                  'tipopropiedades_id' => $request->tipopropiedad,
                  'tipoamoblados_id' => $request->amoblado,
                  'tipopisos_id' => $request->tipopiso,
                  'comunas_id' => $request->comunas,
                  //'usuario_id' => $request->usuario_id,
                  'tipo_comercio' => $request->tipo_comercio,
                  'nro_estacionamientos' => $request->nro_estacionamientos,
                  'direccion' => $request->direccion,]
              );
                return response()->json(['success'=> true, 'message' => 'La propiedad se agregó correctamente.','modal'=>true]);

        }

        //$propiedades = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"aceptada")->get();


        // Desde aqui se guarda cada una de las imagenes en el storage y en la base de datos
        //$image = $request->fotos;
        //$extensiones = array("data:image/jpeg;base64","data:image/jpg;base64", "data:image/png;base64");
        //$directory = '/public/viviendas/'.$id_propiedad;
        //Storage::makeDirectory($directory);

        //for ($i=0; $i < count($request->fotos); $i++) {
        //   for ($i=0; $i < 1; $i++) {
        //     $image[$i] = str_replace($extensiones,'',$image[$i]);
        //     $image[$i] = str_replace(' ', '+', $image[$i]);
        //     $imageName = $i.'.'.'png';
        //     Storage::put($directory.'/'.$imageName, base64_decode($image[$i]));
        //     DB::table('imagenes')->insert(
        //         ['propiedades_id' => $id_propiedad, 'img' => $imageName]
        //     );
        // }
        //Esto permite insertar a la DB cada uno de los financiamientos que acepta quien publica la vivienda



        //Retorna las publicaciones que el usuario ha realizado
        // $user = Auth::user();
        // if(Auth::check()){
        //
        //     $mispropiedades = DB::table('propiedades')->select('*')->where('usuario_id',Auth::user()->id)->get();
        // }else{
        //     $mispropiedades = null;
        // }
        // Retorna las solicitudes que aun se ecuentran en espera (Solo se muestran en la vista si el usuario es un administrador)
         //$propiedadesespera = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"espera")->get();
        //  Envia el email notificando que su publicacion esta en espera
        //$email_user = DB::table('users')->select('email')->where('id', $request->usuario_id)->get();

        //  Mail::send('emails.waitState', [$email_user], function ($message) use ($email_user){
        //     $message->to($email_user[0]->email)->subject('Notificación');
        //
        // });

        // $regiones = DB::table('regiones')->select('*')->where('id','=',11)->get();
        // $comunas = DB::table('comunas')->select('*')->where('region_id','=',11)->get();
        // $tipopropiedades = DB::table('tipo_propiedades')->select('*')->get();
        // $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
        // $tipopisos = DB::table('tipo_pisos')->select('*')->get();
        // $tipofinanciamientos = DB::table('tipo_financiamientos')->select('*')->get();
        // $apiUrl = 'https://mindicador.cl/api';
        //   if ( ini_get('allow_url_fopen') ) {
        //       $json = file_get_contents($apiUrl);
        //   } else {
        //       //De otra forma utilizamos cURL
        //       $curl = curl_init($apiUrl);
        //       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //       $json = curl_exec($curl);
        //       curl_close($curl);
        //   }
        //   $dailyIndicators = json_decode($json);
        //   $UF = $dailyIndicators->uf->valor;
        // return view('propiedades.index',compact('propiedades','user','mispropiedades','propiedadesespera','tipopropiedades','tipoamoblados','tipopisos','tipofinanciamientos','regiones','comunas','UF'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // Recupera las fotos que corresponden a dicha vivienda
      // $directory = 'public/viviendas/'.$id.'/';
      // $fotos = Storage::files($directory);
      // for ($i=0; $i < count($fotos); $i++) {
      //     $fotos[$i] = str_replace('public','storage',$fotos[$i]);
      // }
      // Recupera los datos de la propiedad
      $propiedad = DB::table('propiedades')->where('id', '=', $id)->first();
      // dd($propiedad);
      $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
      $inmueble = DB::table('tipo_propiedades')->find($propiedad->tipopropiedades_id);
      $amoblado = DB::table('tipo_amoblados')->find($propiedad->tipoamoblados_id);
      $piso = DB::table('tipo_pisos')->find($propiedad->tipopisos_id);



      return view('propiedades.show',compact('piso','propiedad','inmueble','amoblado','tipoamoblados'));
    }

    // public function show($id)
    // {
    //   // Recupera las fotos que corresponden a dicha vivienda
    //   // $directory = 'public/viviendas/'.$id.'/';
    //   // $fotos = Storage::files($directory);
    //   // for ($i=0; $i < count($fotos); $i++) {
    //   //     $fotos[$i] = str_replace('public','storage',$fotos[$i]);
    //   // }
    //   // Recupera los datos de la propiedad
    //   $propiedad = DB::table('propiedades')->where('id', '=', $id)->first();
    //   // dd($propiedad);
    //   $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
    //   $inmueble = DB::table('tipo_propiedades')->find($propiedad->tipopropiedades_id);
    //   $amoblado = DB::table('tipo_amoblados')->find($propiedad->tipoamoblados_id);
    //   $piso = DB::table('tipo_pisos')->find($propiedad->tipopisos_id);
    //
    //   return view('propiedades.show',compact('piso','propiedad','inmueble','amoblado','tipoamoblados'));
    // }


    public function vermas($codigo)
    {
      // Recupera las fotos que corresponden a dicha vivienda
      // $directory = 'public/viviendas/'.$id.'/';
      // $fotos = Storage::files($directory);
      // for ($i=0; $i < count($fotos); $i++) {
      //     $fotos[$i] = str_replace('public','storage',$fotos[$i]);
      // }
      // Recupera los datos de la propiedad
      $propiedad = DB::table('propiedades')->where('codigo', '=', $codigo)->first();
        $fotos = DB::table('imagenes')->where('codigo', '=', $codigo)->get();
      // dd($propiedad);
      $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
      $inmueble = DB::table('tipo_propiedades')->find($propiedad->tipopropiedades_id);
      $amoblado = DB::table('tipo_amoblados')->find($propiedad->tipoamoblados_id);
      $piso = DB::table('tipo_pisos')->find($propiedad->tipopisos_id);
      $financiamientos = DB::table('tipo_financiamientos')->select('tipo_financiamientos.financiamientos as nombre')->join('financiamientos','tipo_financiamientos.id','=','financiamientos.tipofinanciamientos_id')->where('financiamientos.propiedades_id', '=', $propiedad->id)->get();

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
      $asesores = DB::table('asesores')->get();

      return view('propiedades.show',compact('piso','propiedad','inmueble','amoblado','tipoamoblados','fotos','contado','leasing','credito','subsidio','asesores'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Actualiza los datos de la tabla propiedades
        DB::table('propiedades')->where('id',$id)->update(['valor_pesos' => $request->valor_pesos,'valor_uf' => $request->valor_uf,'tipoamoblados_id' => $request->tipoamoblados_id]);
        // desde aqui se actualizan los financiamientos, eliminando los anteriores y agregando los actuales
        DB::table('financiamientos')->where('propiedades_id',$id)->delete();
        if ($request->contado == "1"){
            DB::table('financiamientos')->insert(
                ['propiedades_id' => $id,'tipofinanciamientos_id' => 1]
            );
        }
        if ($request->subsidio == "1"){
            DB::table('financiamientos')->insert(
                ['propiedades_id' => $id,'tipofinanciamientos_id' => 2]
            );
        }
        if ($request->leasing == "1"){
            DB::table('financiamientos')->insert(
                ['propiedades_id' => $id,'tipofinanciamientos_id' => 3]
            );
        }
        if ($request->credito == "1"){
            DB::table('financiamientos')->insert(
                ['propiedades_id' => $id,'tipofinanciamientos_id' => 4]
            );
        }

        return back()->withInput();
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

    public function callFormEdit($id){
      // Recuperamos los datos de la propiedad y necesarios para el formulario
      // $imagen = Storage::get('/public/viviendas/1/0.png');
      // $imagen = str_replace('+', ' ', $imagen);
      // $imagen = base64_encode($imagen);
      // $imagen = "data:image/png;base64".$imagen;

      $propiedad = DB::table('propiedades')->where('id', '=', $id)->get()->first();
      $regiones = DB::table('regiones')->select('*')->where('id','=',11)->get();
      $comunas = DB::table('comunas')->select('*')->where('region_id','=',11)->get();
      $tipopropiedades = DB::table('tipo_propiedades')->select('*')->get();
      $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
      $tipopisos = DB::table('tipo_pisos')->select('*')->get();
      $tipofinanciamientos = DB::table('tipo_financiamientos')->select('*')->get();
      // Recuperamos los financiamientos aceptados anteriores
      $contadoaux = DB::table('financiamientos')->where([
          ['propiedades_id', '=', $id],
          ['tipofinanciamientos_id','=',1],
      ])->get();
      if($contadoaux->count() == 0)$contado=0;
      else $contado=1;
      $subsidioaux = DB::table('financiamientos')->where([
          ['propiedades_id', '=', $id],
          ['tipofinanciamientos_id','=',2],
      ])->get();
      if($subsidioaux->count() == 0)$subsidio=0;
      else $subsidio=1;
      $leasingaux = DB::table('financiamientos')->where([
          ['propiedades_id', '=', $id],
          ['tipofinanciamientos_id','=',3],
      ])->get();
      if($leasingaux->count() == 0)$leasing=0;
      else $leasing=1;
      $creditoaux = DB::table('financiamientos')->where([
          ['propiedades_id', '=', $id],
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
        $active_tab="edicion_datos";
      return view('propiedades.form',compact('mispropiedades','UF','contado','leasing','credito','subsidio','propiedad','regiones','comunas','tipopropiedades','tipoamoblados','tipopisos','tipofinanciamientos','fotos','active_tab'));
  }



  // Esta funcion es llamada al subir el form de edicion cuando una publicacion fue rechazada
  // Se encarga de actualiar los datos de la publicacion
  public function editAll(Request $request, $id){

      DB::table('propiedades')->where('id',$id)->update(
              ['titulo_propiedad' => $request->titulo_propiedad,
              'descripcion_propiedad' => $request->descripcion_propiedad,
              'valor_uf' => $request->valor_uf,
              'valor_pesos' => $request->valor_pesos,
              'nro_habitaciones' => $request->nro_habitaciones,
              'nro_banos' => $request->nro_banos,
              'estado' => $request->estado,
              'sup_construida' => $request->sup_construida,
              'sup_terreno' => $request->sup_terreno,
              'estado_publicacion' => $request->estado_publicacion,
              'tipopropiedades_id' => $request->tipopropiedades_id,
              'tipoamoblados_id' => $request->tipoamoblados_id,
              'tipopisos_id' => $request->tipopisos_id,
              'comunas_id' => $request->comunas_id,
              'usuario_id' => $request->usuario_id,
              'tipo_comercio' => $request->tipo_comercio,
              'nro_estacionamientos' => $request->nro_estacionamientos,
              'direccion' => $request->direccion,]
          );
      // Resetea los tipos de financiamientos aeptados eliminandolos y agregandolos de nuevo
      DB::table('financiamientos')->where('propiedades_id',$id)->delete();
      if ($request->contado == "1"){
          DB::table('financiamientos')->insert(
              ['propiedades_id' => $id,'tipofinanciamientos_id' => 1]
          );
      }
      if ($request->subsidio == "1"){
          DB::table('financiamientos')->insert(
              ['propiedades_id' => $id,'tipofinanciamientos_id' => 2]
          );
      }
      if ($request->leasing == "1"){
          DB::table('financiamientos')->insert(
              ['propiedades_id' => $id,'tipofinanciamientos_id' => 3]
          );
      }
      if ($request->credito == "1"){
          DB::table('financiamientos')->insert(
              ['propiedades_id' => $id,'tipofinanciamientos_id' => 4]
          );
      }
      // Como hubo una modificacion, la propiedad pasa a estado de espera
      //  hasta que un administrador la acepte o rechae nuevamente
      DB::table('propiedades')
      ->where('id', $id)
      ->update(['estado_publicacion' => 'espera']);
      // Envia el correo al usuario de que su publicacion se encuentra en espera
      $email_user = DB::table('users')->select('email')->where('id', $request->usuario_id)->get();
       Mail::send('emails.waitState', [$email_user], function ($message) use ($email_user) {
         $message->to($email_user[0]->email)->subject('Notificación');
       });
      // Datos para retornar a la vista del catalogo

      $propiedades = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"aceptada")->get();
      $user = Auth::user();
      $propiedadesespera = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"espera")->get();
      // Aqui no hay verificacion del usuario, debido a que para  llegar esto ya el usuario debe haber estado logeado anteriormente
      $mispropiedades = DB::table('propiedades')->select('*')->where('usuario_id',Auth::user()->id)->get();
      $propiedad = DB::table('propiedades')->where('id', '=', $id)->first();

      $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
      $inmueble = DB::table('tipo_propiedades')->find($propiedad->tipopropiedades_id);
          $fotos = DB::table('imagenes')->where('codigo', '=', $propiedad->codigo)->get();
             //dd($fotos);
      $amoblado = DB::table('tipo_amoblados')->find($propiedad->tipoamoblados_id);
      $piso = DB::table('tipo_pisos')->find($propiedad->tipopisos_id);
      return view('propiedades.show',compact('propiedades','user','mispropiedades','propiedadesespera','piso','propiedad','inmueble','amoblado','tipoamoblados','fotos'));
  }

  // Funcion encargada de aprobar una solicitud
  public function updateState(Request $request, $id){
      DB::table('propiedades')
      ->where('id', $id)
      ->update(['estado_publicacion' => 'aceptada']);

      DB::table('poseen')->insert(
    ['propiedades_id' => $id, 'asesores_id' => $request->asesor]);

      $propiedades = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"aceptada")->get();
      $regiones = DB::table('regiones')->select('*')->where('id','=',11)->get();
      $comunas = DB::table('comunas')->select('*')->where('region_id','=',11)->get();
      $tipopropiedades = DB::table('tipo_propiedades')->select('*')->get();
      $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
      $tipopisos = DB::table('tipo_pisos')->select('*')->get();
      $tipofinanciamientos = DB::table('tipo_financiamientos')->select('*')->get();
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
        $dailyIndicators = json_decode($json);
        $UF = $dailyIndicators->uf->valor;
      // Aqui se le envia el correo de que su publicacion ha sido aceptada
      $user_id = DB::table('propiedades')->select('usuario_id')->where('id',$id)->get()[0]->usuario_id;
      $user_email = DB::table('users')->select('email')->where('id',$user_id)->get();
      // $user = DB::table('users')->select('')
      Mail::send('emails.updateState', [$user_email], function ($message) use($user_email){
          $message->to($user_email['0']->email)->subject('Notificación Punto Hogar');
      });
      // Si hay un usuario activo, retorna sus publicaciones
      if(Auth::check()){
          $mispropiedades = DB::table('propiedades')->select('*')->where('usuario_id',Auth::user()->id)->get();
      }else{
          $mispropiedades = null;
      }
      // Retorna las solicitudes que aun se ecuentran en espera (Solo se muestran en la vista si el usuario es un administrador)
      $propiedadesespera = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"espera")->get();

      $user = Auth::user(); //Informacion del admin para enviarla a la vista
        $fotos2 = DB::table('imagenes')->join('propiedades','propiedades.codigo','=','imagenes.codigo')->where('propiedades.estado_publicacion','=',"espera")->get();
      return view('propiedades.index',compact('UF','propiedades','user','mispropiedades','propiedadesespera','tipopropiedades','comunas','regiones','tipoamoblados','tipopisos','tipofinanciamientos','fotos2'));
  }

  // Funcion encargada de rechazar una solicitud
  public function downState(Request $request,$id){
      DB::table('propiedades')
      ->where('id', $id)
      ->update(['estado_publicacion' => 'rechazada']);
      $propiedades = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"aceptada")->get();
       // Aqui se le envia el correo de que su publicacion ha sido rechazada
      $user = Auth::user();
      $user_id = DB::table('propiedades')->select('usuario_id')->where('id',$id)->get()[0]->usuario_id;
      $user_email = DB::table('users')->select('email')->where('id',$user_id)->get();
      Mail::send('emails.downState', ['detalle' => $request->query("detalle")], function ($message) use($user_email) {
          $message->to($user_email['0']->email)->subject('Notificación');
      });
      // Si hay un usuario activo, retorna sus publicaciones
      if(Auth::check()){

          $mispropiedades = DB::table('propiedades')->select('*')->where('usuario_id',Auth::user()->id)->get();
      }else{
          $mispropiedades = null;
      }
      $regiones = DB::table('regiones')->select('*')->where('id','=',11)->get();
      $comunas = DB::table('comunas')->select('*')->where('region_id','=',11)->get();
      $tipopropiedades = DB::table('tipo_propiedades')->select('*')->get();
      $tipoamoblados = DB::table('tipo_amoblados')->select('*')->get();
      $tipopisos = DB::table('tipo_pisos')->select('*')->get();
      $tipofinanciamientos = DB::table('tipo_financiamientos')->select('*')->get();
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
        $dailyIndicators = json_decode($json);
        $UF = $dailyIndicators->uf->valor;
      // Retorna las solicitudes que aun se ecuentran en espera (Solo se muestran en la vista si el usuario es un administrador)
      $propiedadesespera = DB::table('propiedades')->select('*')->where('estado_publicacion','=',"espera")->get();
        $fotos2 = DB::table('imagenes')->join('propiedades','propiedades.codigo','=','imagenes.codigo')->where('propiedades.estado_publicacion','=',"espera")->get();
      return view('propiedades.index',compact('propiedades','user','mispropiedades','propiedadesespera','tipopropiedades','comunas','regiones','tipoamoblados','tipopisos','tipofinanciamientos','UF','fotos2'));
  }
}
