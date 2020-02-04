<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;

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

        return redirect()->back();
    }

    public function loginModal(Request $request){


      if($request->email){
          if (Auth::attempt(['email' => $request->email , 'password' => $request->password])) {

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
               //  $propiedad = DB::table('propiedades')->where('codigo',$request->codigo)->first();
               //
               //  if ($request->has('contado')){
               //      DB::table('financiamientos')->insert(
               //
               //         ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 1]
               //      );
               //  }
               //  if ($request->has('subsidio')){
               //     DB::table('financiamientos')->insert(
               //         ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 2]
               //     );
               // }
               //
               //   if ($request->has('leasing')){
               //     DB::table('financiamientos')->insert(
               //         ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 3]
               //     );
               // }
               //   if ($request->has('credito')){
               //     DB::table('financiamientos')->insert(
               //         ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 4]
               //     );
               // }
            return response()->json(['success'=>true,'url'=>route('propiedadeshow',$request->codigo)]);
          }
            return response()->json(['success'=>false,'message'=>'no se encuentra al usuario']);
      }else{
        return response()->json(['success'=>false,'message'=>'no hay mail']);
      }
    }
}
