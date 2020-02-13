

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gull - Laravel + Bootstrap 4 admin template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
</head>

<body>
    <div class="auth-layout-wrap" style="background-image: url({{asset('assets/images/photo-wide-4.jpg')}})">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">

                    <!-- <div class="col-md-6 text-center " style="background-size: cover;background-image: url({{asset('assets/images/photo-long-3.jpg')}})">
                        <div class="pl-3 auth-right">
                            <div class="auth-logo text-center mt-4">
                                <img src="{{asset('assets/images/logo.png')}}" alt="">
                            </div>
                            <div class="flex-grow-1"></div>
                            <div class="w-100 mb-4">
                                <a class="btn btn-outline-primary btn-outline-email btn-block btn-icon-text btn-rounded" href="signin.html">
                                    <i class="i-Mail-with-At-Sign"></i> Sign in with Email
                                </a>
                                <a class="btn btn-outline-primary btn-outline-google btn-block btn-icon-text btn-rounded">
                                    <i class="i-Google-Plus"></i> Sign in with Google
                                </a>
                                <a class="btn btn-outline-primary btn-outline-facebook btn-block btn-icon-text btn-rounded">
                                    <i class="i-Facebook-2"></i> Sign in with Facebook
                                </a>
                            </div>
                            <div class="flex-grow-1"></div>
                        </div>
                    </div> -->

                    <div class="col-12">
                        <div class="p-5">

                          <h1 class=" text-18">Registro</h1>
                          {{-- INICIO ALERTAS --}}
                                 <div id="errorDiv2"  class="alert alert-card alert-danger d-none" role="alert">
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                         <ul id="errorMsg2"></ul>
                                 </div>




                                 {{-- FIN ALERTAS --}}
                                            <div class="form-group">
                                              <div class="form-group">
                                                                 <input type="hidden" id="pasandocodigo2" name="" value="">
                                                                 <label for="email">Primer Nombre</label>
                                                                 <input id="name_modal2" type="text" class="form-control form-control-rounded" name="name" value="{{ old('name') }}">

                                                             </div>
                                                             <div class="form-group">
                                                                 <label for="email">Segundo Nombre</label>
                                                                 <input id="segundo_nombre_modal2" type="text" class="form-control form-control-rounded" name="segundo_nombre" value="{{ old('segundo_nombre') }}">
                                                             </div>
                                                             <div class="form-group">
                                                                 <label for="email">Primer apellido</label>
                                                                 <input id="apellido_paterno_modal2" type="text" class="form-control form-control-rounded" name="apellido_paterno" value="{{ old('apellido_paterno') }}">

                                                             </div>
                                                             <div class="form-group">
                                                                 <label for="email">Segundo apellido</label>
                                                                 <input id="apellido_materno_modal2" type="text" class="form-control form-control-rounded" name="apellido_materno" value="{{ old('apellido_materno') }}">

                                                             </div>
                                                             <div class="form-group">
                                                                 <label for="email">Email</label>
                                                                 <input id="email_modal2" type="email" class="form-control form-control-rounded" name="email" value="{{ old('email') }}">
                                                             </div>
                                                             <div class="form-group">
                                                                 <label for="password">Contraseña</label>
                                                                 <input id="password_modal2" type="password" class="form-control form-control-rounded" name="password">
                                                             </div>
                                                             <div class="form-group">

                                                                 <input id="usuario" type="number" class="" name="usuario_id" value="1" style="display:none">

                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="repassword">Confirmar contraseña</label>

                                                                 <input id="password-confirm_modal2" type="password" class="form-control form-control-rounded" name="password_confirmation" required autocomplete="new-password">

                                                             </div>

                                                             <div class="form-group row mb-0">
                                                                 <div class="col-md-6 offset-md-4">
                                                                     <button type="button" class="btn btn-primary" onclick="register()">
                                                                         {{ __('Registrarse') }}
                                                                     </button>
                                                                 </div>
                                                             </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/common-bundle-script.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>

    <script type="text/javascript">
    function register() {

      $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

        $.ajax({
            url: "{{ route('register.modal') }}",
            type: 'POST',
            data: {

              'name':document.getElementById('name_modal2').value,
              'segundo_nombre': document.getElementById('segundo_nombre_modal2').value,
              'apellido_paterno': document.getElementById('apellido_paterno_modal2').value,
               'apellido_materno': document.getElementById('apellido_materno_modal2').value,
               'email': document.getElementById('email_modal2').value,
               'usuario_id': document.getElementById('usuario').value,
               'password': document.getElementById('password_modal2').value,
               'password_confirmation': document.getElementById('password-confirm_modal2').value,
               '_token': $("meta[name='csrf-token']").attr("content")
            },
            dataType: 'JSON',
            success: function(response) {

              if (response.success==true) {

            window.location = response.url;

         }

        else {

          $('#errorDiv2').removeClass('d-none');
          $('#errorMsg2').html('');

          $.each(response.errors, function(key, value) {

             $('#errorMsg2').append('<li >' + value + '</li>');
          });
        }

            },
            error: function() {

            }
        });
    }
    </script>
</body>

</html>
