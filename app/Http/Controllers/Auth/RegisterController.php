<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Propiedad;
use Str;
use Mail;
use Storage;
use DB;
use Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'segundo_nombre' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
     protected function create(Request $request)
     {

         $rules = array(

              'name'              => 'required|string',
              'segundo_nombre'          =>'required|string',
              'apellido_paterno'              => 'required|string',
              'apellido_materno'          =>'required|string',
              'email'              => 'required|string',
              'password'          =>'required|string|min:8|confirmed'

      );
      $messages = array(
      'name.required'    => 'El campo primer nombre es obligatorio.',
      'segundo_nombre.required'      => 'El campo segundo nombre es obligatorio.',
      'apellido_paterno.required'      => 'El campo primer apellido es obligatorio.',
      'apellido_mateno.required'      => 'El campo segundo apellido es obligatorio.',
      'email.required'      => 'El campo email es obligatorio.',
      'password.required'  => 'El campo contraseña es obligatorio.',
      'password.min'  => 'El campo contraseña debe contener al menos 8 caracteres.',
      'password.confirmed'  => 'El campo confirmación de contraseña no coincide.'

     );

     $validator = Validator::make($request->all(), $rules, $messages);

     if ($validator->fails()){
     return response()->json(['success'=> false, 'errors' => $validator->errors()->all()]);
     }

         if($request->usuario_id=='1'){

           $retorno = User::create([
               'name' => $request->name,
               'segundo_nombre' => $request->segundo_nombre,
               'apellido_paterno' => $request->apellido_paterno,
               'apellido_materno' => $request->apellido_materno,
               'email' => $request->email,
               'password' => Hash::make($request->password),
               'roles_id' => 2,
           ]);

           Auth::loginUsingId($retorno->id);

           return response()->json(['success'=>true,'url'=>route('wea')]);

         }
         else{
           $retorno = User::create([
               'name' => $request->name,
               'segundo_nombre' => $request->segundo_nombre,
               'apellido_paterno' => $request->apellido_paterno,
               'apellido_materno' => $request->apellido_materno,
               'email' => $request->email,
               'password' => Hash::make($request->password),
               'roles_id' => 2,
           ]);

           Auth::loginUsingId($retorno->id);

            $consulta= DB::table('propiedadestemporal')->where('codigo','=', $request->codigo)->first();
          
            $insercion=DB::table('propiedades')->insert([
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

                   'usuario_id' => $retorno->id,

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
             //return $retorno;
         // }
     }
 }

}
