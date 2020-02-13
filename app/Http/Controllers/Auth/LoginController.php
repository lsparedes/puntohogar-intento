<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;
use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {


         return view('landing');
    }
    public function loginModal(Request $request){

      $rules = array(

           'email'              => 'required|string',
           'password'          =>'required|string',

   );
   $messages = array(
   'email.required'    => 'El campo email es obligatorio.',
   'password.required'      => 'El campo contraseña es obligatorio.'

);

$validator = Validator::make($request->all(), $rules, $messages);

if ($validator->fails()){
  return response()->json(['success'=> false, 'errors' => $validator->errors()->all()]);
}

    if(Auth::attempt(['email' => $request->email , 'password' => $request->password])){
        $cantidad = DB::table('propiedades')->where('usuario_id','=',auth()->id())->where('estado_publicacion','=','aceptada')->get();
        if($cantidad->count()<5){
          $consulta= DB::table('propiedadestemporal')->where('codigo','=', $request->codigo)->first();
          $insercion= DB::table('propiedades')->insert([
                  'codigo'  => $request->codigo,
                  'titulo_propiedad' => $consulta->titulo_propiedad,
                  'tipo_comercio' => $consulta->tipo_comercio,
                  'direccion' => $consulta->direccion,
                  'descripcion_propiedad' => $consulta->descripcion_propiedad,
                  'valor_uf' => $consulta->valor_uf,
                  'valor_pesos' => $consulta->valor_pesos,
                  'nro_habitaciones' => $consulta->nro_habitaciones,
                  'nro_banos' => $consulta->nro_banos,
                  'estado' => $consulta->estado,
                  'sup_construida' => $consulta->sup_construida,
                  'sup_terreno' => $consulta->sup_terreno,
                  'estado_publicacion' => $consulta->estado_publicacion,
                  'tipopropiedades_id' => $consulta->tipopropiedades_id,
                  'tipoamoblados_id' => $consulta->tipoamoblados_id,
                  'tipopisos_id' => $consulta->tipopisos_id,
                  'comunas_id' => $consulta->comunas_id,
                  'usuario_id' => auth()->id(),

                  'nro_estacionamientos' => $consulta->nro_estacionamientos,
                  ]
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
          return response()->json(['success'=>true,'url'=>route('propiedadeshow',$request->codigo)]);
        }
        else{
            return response()->json(['success'=>"mal",'message'=>"No podemos aceptar su solicitud, ya posee 5 publicaciones activas."]);
        }

}
else{
    return response()->json(['success'=>"mal",'message'=>"El usuario no existe, porfavor asegura que tus credenciales esten correctas."]);
}

    }
//     public function loginModal(Request $request){
//
//       $rules = array(
//
//            'email'              => 'required|string',
//            'password'          =>'required|string',
//
//    );
//    $messages = array(
//    'email.required'    => 'El campo email es obligatorio.',
//    'password.required'      => 'El campo contraseña es obligatorio.'
//
// );
//
// $validator = Validator::make($request->all(), $rules, $messages);
//
// if ($validator->fails()){
//   return response()->json(['success'=> false, 'errors' => $validator->errors()->all()]);
// }
//
//     if(Auth::attempt(['email' => $request->email , 'password' => $request->password])){
//             $consulta= DB::table('propiedadestemporal')->where('codigo','=', $request->codigo)->first();
//             $insercion= DB::table('propiedades')->insert([
//                     'codigo'  => $request->codigo,
//                     'titulo_propiedad' => $consulta->titulo_propiedad,
//                     'tipo_comercio' => $consulta->tipo_comercio,
//                     'direccion' => $consulta->direccion,
//                     'descripcion_propiedad' => $consulta->descripcion_propiedad,
//                     'valor_uf' => $consulta->valor_uf,
//                     'valor_pesos' => $consulta->valor_pesos,
//                     'nro_habitaciones' => $consulta->nro_habitaciones,
//                     'nro_banos' => $consulta->nro_banos,
//                     'estado' => $consulta->estado,
//                     'sup_construida' => $consulta->sup_construida,
//                     'sup_terreno' => $consulta->sup_terreno,
//                     'estado_publicacion' => $consulta->estado_publicacion,
//                     'tipopropiedades_id' => $consulta->tipopropiedades_id,
//                     'tipoamoblados_id' => $consulta->tipoamoblados_id,
//                     'tipopisos_id' => $consulta->tipopisos_id,
//                     'comunas_id' => $consulta->comunas_id,
//                     'usuario_id' => auth()->id(),
//
//                     'nro_estacionamientos' => $consulta->nro_estacionamientos,
//                     ]
//                 );
//                 $propiedad = DB::table('propiedades')->where('codigo',$request->codigo)->first();
//
//                 if ($request->contado==1){
//                     DB::table('financiamientos')->insert(
//
//                        ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 1]
//                     );
//                 }
//                 if ($request->subsidio==1){
//                    DB::table('financiamientos')->insert(
//                        ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 2]
//                    );
//                }
//
//                  if ($request->leasing==1){
//                    DB::table('financiamientos')->insert(
//                        ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 3]
//                    );
//                }
//                 if ($request->credito==1){
//                    DB::table('financiamientos')->insert(
//                        ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 4]
//                    );
//                }
//             return response()->json(['success'=>true,'url'=>route('propiedadeshow',$request->codigo)]);
// }
// else{
//     return response()->json(['success'=>"mal",'message'=>"El usuario no existe, porfavor asegura que tus credenciales esten correctas."]);
// }
//
//     }
}
