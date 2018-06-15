<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <link rel="stylesheet" href="{{ asset('assets/css/material-kit.css?v=2.0.3') }}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/design-portal.css') }}">
    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>

    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"></script>

    <script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/material-kit.js?v=2.0.3') }}"></script>

    <script src="https://cdn.ckeditor.com/4.9.2/standard-all/ckeditor.js"></script>


    <title>Portal de Noticias ESAMC</title> 
  </head>
  <body>

    <div class="central">
        <ul class="nav nav-pills nav-pills-icons nav-pills-info" role="tablist" style="justify-content: space-between;">
            <li class="nav-item">
                <img src="/assets/img/esamc.png" align="center">
            </li>
           
                <!-- Verificando se o usuário está logado,
                    caso esteja irá verificar o nível de acesso para definir o menu -->
            <?php if (Auth::Guest()): ?>
                  <li class="nav-item">
                <a class="nav-link" href="/login">
                    <i class="material-icons">account_circle</i>
                    Login
                </a>
            </li>
            <?php endif ?>
            <?php if (Auth::Check()):
                $id = Auth()->user()->id_acess_level;?>
                <?php if ($id == 1): ?>
                      <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Seja bem-vindo, <?php $name = auth()->user()->name ?> {{$name}} !
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="/categorias">Categorias</a></li>
                            <li><a href="/minhas-noticias">Noticias</a></li>
                            <li><a href="/register">Criar Usuário</a></li>
                            <li><a href="/noticias/pendentes">Notícias Pendentes</a></li>
                            <li><a href="/logout">Sair</a></li> 
                        </ul
                    </div>
                <?php endif ?>
                <?php if ($id == 2): ?>
                        <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Seja bem-vindo, <?php $name = auth()->user()->name ?> {{$name}} !
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="/noticias">Criar Notícia</a></li>
                            <li><a href="/noticias/pendentes">Notícias Pendentes</a></li>
                            <li><a href="/logout">Sair</a></li> 
                        </ul
                    </div>
                <?php endif ?>
            <?php endif ?>
                  
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
                    <li class="nav-item dropdown">
                        <?php 
                            $category = DB::select('select * from category'); ?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                            <div class="dropdown-menu">
                            @foreach($category as $c)
                              <a class="dropdown-item" href="/noticias-categoria/{{$c->id}}">{{ $c->name }}</a>
                            @endforeach
                            </div>
                    </li>
                      <li class="nav-item">
                        <a href="{{action('NewsController@MostAcessed')}}" class="nav-link">Mais Acessadas</a>
                    </li>
                     </li>
                      <li class="nav-item">
                        <a href="{{action('ContactController@Form')}}" class="nav-link">Fale Conosco</a>
                    </li>
                </ul>                       
                </ul>                      

                <div class="collapse navbar-collapse">
                    <form action="/noticias/buscar/{txt}" class="form-inline ml-auto">
                        <div class="form-group has-white">
                            <input type="post" name= 'txt' class="form-control" placeholder="Buscar">
                        </div>
                            <button type="submit" class="btn btn-white btn-raised btn-fab btn-fab-mini btn-round">
                            <i class="material-icons">search</i>
                            </button>   
                    </form>
                </div>
            </div>
        </nav>
    </div>

<div class="central">
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
  </body>
</html>