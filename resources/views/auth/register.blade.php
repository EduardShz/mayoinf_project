<!doctype html>
<html lang="en">
    <head>
        <title>.: Registro :.</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="{{asset('assets/estilos.css')}}">
    </head>

    <body>
        
        <section class="vh-100 gradient-custom">
            <div class="container py-4 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-7">
                  <div class="card bg-light text-dark" style="border-radius: 2rem;">
                    <div class="card-body p-5 text-center">
                      <form action="{{route('register')}}" method="post">
                        @csrf
                      <div class="mb-md-5 mt-md-4 pb-5">
                        {{--<img src="{{asset('images/LogoMayo.png')}}" alt="">--}}
                        <h2 class="fw-bold mb-2 text-uppercase">Registro</h2>
          
                        <div class="form-outline form-white mb-4 d-flex justify-content-between">
                            <div class="form-outline form-white mb-4  ">
                                <br>
                                <label class="fw-bold form-label d-flex justify-content-left" for="name">Nombre</label>  
                                <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Ingresar Nombre"/>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <br>
                                <label class="fw-bold form-label d-flex justify-content-left" for="paterno">Apelido Paterno</label>  
                                <input type="text" name="paterno" id="paterno" class="form-control form-control-lg" placeholder="Ingresar Apellido Paterno"/>
                            </div>
                        </div>

                        <div class="form-outline form-white mb-4 d-flex justify-content-between">
                            <div class="form-outline form-white mb-4">
                                <label class="fw-bold form-label d-flex justify-content-left" for="materno">Apelido Materno</label>  
                                <input type="text" name="materno" id="materno" class="form-control form-control-lg" placeholder="Ingresar Apellido Materno"/>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <label class="fw-bold form-label d-flex justify-content-left" for="email">Correo Electrónico</label>  
                                <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Ingresar Correo"/>
                            </div>
                        </div>
          
                        <div class="form-outline form-white mb-4">
                                <label class="fw-bold form-label d-flex justify-content-left" for="typePasswordX">Contraseña</label>
                                <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                <br><br>
                                <label class="fw-bold form-label d-flex justify-content-left" for="password_confirmation">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg" />
                        </div>
                        
                        <br>
                        <button class="btn btn-outline-dark btn-lg px-5" type="submit">Registrarse</button>
          
                      </div>
          
                      <div>
                        <p class="mb-0">¿Ya tienes una cuenta? <a href="{{route('login')}}" class="text-dark-50 fw-bold" type="submit">Inicia Sesión</a>
                        </p>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
