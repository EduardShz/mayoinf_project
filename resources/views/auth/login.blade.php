<!doctype html>
<html lang="en">
    <head>
        <title>.: Inicio de Sesión :.</title>
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
        
        <section class="vh-300 gradient-custom">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-light text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                      <form action="{{route('login')}}" method="post">
                        @csrf
                      <div class="mb-md-5 mt-md-4 pb-5">
                        {{--<img src="{{asset('images/LogoMayo.png')}}" alt="">--}}
                        <h2 class="fw-bold mb-2 text-uppercase">Inicio de Sesión</h2>
                        <p class="text-dark-50 mb-5">Introduzca su Correo Electrónico y su contraseña</p>
          
                        <div class="form-outline form-dark mb-4">
                          <label class="form-label" for="typeEmailX">Correo Electrónico</label>  
                          <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" placeholder="Ingresar Correo"/>
                        </div>
          
                        <div class="form-outline form-dark mb-4">
                          <label class="form-label" for="typePasswordX">Contraseña</label>
                          <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                        </div>
          
                        <p class="small mb-5 pb-lg-2"><a class="text-dark-50" href="#!">¿Olvidaste tu contraseña?</a></p>
                        
                        <button class="btn btn-outline-dark btn-lg px-5" type="submit">Iniciar Sesión</button>
          
                        <div class="d-flex justify-content-center text-center mt-4 pt-1">
                          <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                          <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                          <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                        </div>
          
                      </div>
          
                      <div>
                        <p class="mb-0">¿No tienes una cuenta? <a href="{{route('register')}}" class="text-dark-50 fw-bold">Crear Cuenta</a>
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
