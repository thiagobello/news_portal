<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/css/material-kit.css">
    <link rel="stylesheet" href="/assets/css/design-portal.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

    <title>Portal de Noticias ESAMC</title>
  </head>
  <body>

    <div>
        <ul class="nav nav-pills nav-pills-icons nav-pills-info" role="tablist" style="justify-content: space-between;">
            <li class="nav-item">
                <img src="/assets/img/esamc.png" align="center">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Login" role="tab" data-toggle="tab">
                    <i class="material-icons">account_circle</i>
                    Login
                </a>
            </li>            
        </ul>

    </div>

    <div>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{action('NewsController@home')}}">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
             <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{action('CategoryController@list')}}" class="nav-link">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{action('NewsController@list')}}" class="nav-link">Criar Noticia</a>
                    </li>
                </ul>                       


                <div class="collapse navbar-collapse">
                    <form class="form-inline ml-auto">
                        <div class="form-group has-white">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-white btn-raised btn-fab btn-fab-mini btn-round">
                            <i class="material-icons">search</i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

<div class="">
    @yield('text')
</div>

    <footer class="footer footer-black">
        <div class="container">
            <a class="footer-brand" href="#home"> Portal</a>
            <ul class="pull-center">
                <li>
                    <a href="#home" >Test</a>
                </li>
            </ul>
            <ul class="social-butons pull-right">
                <li>
                    <a href="" class="btn btn-just-icon btn-simple">
                        <i class="fa fa-twitter">
                            
                        </i>
                    </a>
                </li>
            </ul>
        </div>
    </footer>

    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/bootstrap-material-design.js"></script>
    <script src="/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <script src="/assets/js/plugins/nouislider.min.js"></script>
    <script src="/assets/js/material-kit.js?v=2.0.0"></script>

  </body>
</html>