<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="{{asset("site/bootstrap.min.css")}}">
    <style>
        .gradient-custom {
        /* fallback for old browsers */
        background: #6a11cb;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
</head>
<body>
    @include("sweetalert::alert")
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-4">
                  <div class="mt-md-4 ">
                    <h3 class="fw-bold  text-uppercase text-center">Login</h3>
      
                   <form action="{{route("plataform.product.login")}}" method="post">
                        @csrf
                        <div class="form-outline form-white mb-4">
                          <label class="form-label" for="typeEmailX">Email</label>
                            <input name="email" type="email" id="typeEmailX" class="form-control" required/>
                        </div>
        
                        <div class="form-outline form-white mb-4">
                          <label class="form-label" for="typePasswordX">Password</label>
                            <input name="password" type="password" id="typePasswordX" class="form-control" required/>
                        </div>
                        
                        <button class="btn btn-outline-light px-5 btn-sm" type="submit">Login</button>  

                   </form>
                  </div>
                </div>

                <div class="card-footer text-center ">
                  <a href="{{route("auth.reset.password")}}" class="text-white" >Recuperar senha</a> <br>
                  <a href="{{route('site.subscription')}}" class="text-white">Criar Website</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>