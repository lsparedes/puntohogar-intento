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
        // Verifica si el registro viene desde el formulario publica gratis
        // if($data['usuario_id']==null){
        //     // crea e usuario en la BD
        //     $retorno = User::create([
        //         'name' => $data['name'],
        //         'segundo_nombre' => $data['segundo_nombre'],
        //         'apellido_paterno' => $data['apellido_paterno'],
        //         'apellido_materno' => $data['apellido_materno'],
        //         'email' => $data['email'],
        //         'password' => Hash::make($data['password']),
        //         'roles_id' => 2,
        //     ]);
        //
        //     $id_user = DB::table('users')->select('*')->where('email','=',$data['email'])->get();
        //     $result = json_decode($id_user, true);
        //     // Crea la propiedad en la BD
        //     DB::table('propiedades')->insert(
        //         ['titulo_propiedad' => $data['titulo_propiedad'],
        //         'descripcion_propiedad' => $data['descripcion_propiedad'],
        //         'valor_uf' => $data['valor_uf'],
        //         'valor_pesos' => $data['valor_pesos'],
        //         'nro_habitaciones' => $data['nro_habitaciones'],
        //         'nro_banos' => $data['nro_banos'],
        //         'estado' => $data['estado'],
        //         'sup_construida' => $data['sup_construida'],
        //         'sup_terreno' => $data['sup_terreno'],
        //         'estado_publicacion' => $data['estado_publicacion'],
        //         'tipopropiedades_id' => $data['tipopropiedades_id'],
        //         'tipoamoblados_id' => $data['tipoamoblados_id'],
        //         'tipopisos_id' => $data['tipopisos_id'],
        //         'comunas_id' => $data['comunas_id'],
        //         'usuario_id' => $result[0]['id'],
        //         'tipo_comercio' => $data['tipo_comercio'],
        //         'nro_estacionamientos' => $data['nro_estacionamientos'],
        //         'direccion' => $data['direccion'],]
        //     );
        //     // Recupera informacion para enviar a la vista y hacer enlace con imagenes y financiamientos
        //     $propiedades = DB::table('propiedades')->select('*')->get();
        //     $id_propiedad = DB::table('propiedades')->where('usuario_id',$result[0]['id'])->orderBy('id', 'desc')->first()->id;
        //     // Guarda las imagenes en el storage y en la BD
        //     $image = $data['fotos'];
        //     $extensiones = array("data:image/jpeg;base64","data:image/jpg;base64", "data:image/png;base64");
        //     // dd($id_propiedad);
        //     $directory = '/public/viviendas/'.$id_propiedad;
        //     Storage::makeDirectory($directory);
        //
        //     for ($i=0; $i < count($image); $i++) {
        //         $image[$i] = str_replace($extensiones,'',$image[$i]);
        //         $image[$i] = str_replace(' ', '+', $image[$i]);
        //         $imageName = $i.'.'.'png';
        //         Storage::put($directory.'/'.$imageName, base64_decode($image[$i]));
        //         DB::table('imagenes')->insert(
        //             ['propiedades_id' => $id_propiedad, 'img' => $imageName]
        //         );
        //     }
        //     // Agrega cada uno de los financiamientos a la propiedad
        //     if(isset($data['contado']))
        //     if ($data['contado'] == "1"){
        //     DB::table('financiamientos')->insert(
        //             ['propiedades_id' => $id_propiedad,'tipofinanciamientos_id' => 1]
        //         );
        //     }
        //     if(isset($data['subsidio']))
        //     if ($data['subsidio'] == "1"){
        //         DB::table('financiamientos')->insert(
        //             ['propiedades_id' => $id_propiedad,'tipofinanciamientos_id' => 2]
        //         );
        //     }
        //     if(isset($data['leasing']))
        //     if ($data['leasing'] == "1"){
        //         DB::table('financiamientos')->insert(
        //             ['propiedades_id' => $id_propiedad,'tipofinanciamientos_id' => 3]
        //         );
        //     }
        //     if(isset($data['credito']))
        //     if ($data['credito'] == "1"){
        //         DB::table('financiamientos')->insert(
        //             ['propiedades_id' => $id_propiedad,'tipofinanciamientos_id' => 4]
        //         );
        //     }
        //     // Envia el email de que la publicacion se encuentra en estado de espera
        //     Mail::send('emails.waitState', $data, function ($message) use ($data){
        //         $message->to($data['email'])->subject('Notificación');
        //
        //     });
        //         return $retorno; //Retorna el usuario creado
        // }
        // if($data['usuario_id']=='1'){

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
              if ($request->contado == "contado"){
                  DB::table('financiamientos')->insert(

                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 1]
                  );
              }
            if ($request->subsidio == "subsidio"){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 2]
                 );
             }

             if ($request->leasing == "leasing"){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 3]
                 );
             }
             if ($request->credito == "credito"){
                 DB::table('financiamientos')->insert(
                     ['propiedades_id' => $propiedad->id,'tipofinanciamientos_id' => 4]
                 );
             }
              return response()->json(['success'=>true,'url'=>route('propiedadeshow',$request->codigo)]);
            //return $retorno;
        // }
    }

}
