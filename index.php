<?php
require_once 'Classes/bancoDeDados.php';

router_add('index', function () {
  ?>
  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sy Controler - Sistema de Gerenciamento de empresas</title>
    <link rel="stylesheet" href="dist/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="dist/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="dist/assets/css/style.css">
    <link rel="shortcut icon" href="dist/assets/images/favicon.ico" />

    <link rel="styleshet" href="css/alert.css">
    <script type="text/javascript" src="js/alert.js"></script>
    <script type="text/javascript" src="js/basics.js"></script>
    <script type="text/javascript" src="js/system.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-start py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="dist/assets/images/logo-dark.svg" alt="logo">
                </div>
                <h4>Olá, vamos começar</h4>
                <h6 class="fw-light">Faça login para continuar.</h6>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" placeholder="Senha">
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <a class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" href="#">ENTRAR NO SISTEMA</a>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Mantenha-me conectado
                      </label>
                    </div>
                    <a href="#" class="auth-link text-black">Esqueceu a senha?</a>
                  </div>
                  <div class="text-center mt-4 fw-light">
                    Não tenho uma conta? <a href="index.php?router=register" class="text-primary">Criar</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="dist/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="dist/assets/js/off-canvas.js"></script>
    <script src="dist/assets/js/hoverable-collapse.js"></script>
    <script src="dist/assets/js/template.js"></script>
    <script src="dist/assets/js/settings.js"></script>
    <script src="dist/assets/js/todolist.js"></script>
  </body>

  </html>
  <?php
  exit;
});

router_add('register', function () {
  ?>
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sy Controller - sistema de controle de empresa</title>
    <link rel="stylesheet" href="dist/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="dist/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="dist/assets/css/style.css">
    <link rel="shortcut icon" href="dist/assets/images/favicon.ico" />

    <link rel="styleshet" href="css/alert.css">
    <script type="text/javascript" src="js/alert.js"></script>
    <script type="text/javascript" src="js/basics.js"></script>
    <script type="text/javascript" src="js/system.js"></script>
  </head>
  <script>
    function save_data(){
      
    }
  </script>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-start py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="dist/assets/images/logo-dark.svg" alt="logo">
                </div>
                <h4>Novo por aqui?</h4>
                <h6 class="fw-light">Increver-se é fácil, basta apenas alguns passos</h6>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="user_namae"
                      placeholder="Nome de usuário">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="cnpj" placeholder="CNPJ" system-mask="cpf-cnpj">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password"
                      placeholder="Senha de usário">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Eu aceito os termos e condições
                      </label>
                    </div>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <a class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" href="#">CADASTRAR</a>
                  </div>
                  <div class="text-center mt-4 fw-light">
                    Já tem uma conta? <a href="inde.php" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="dist/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="dist/assets/js/off-canvas.js"></script>
    <script src="dist/assets/js/hoverable-collapse.js"></script>
    <script src="dist/assets/js/template.js"></script>
    <script src="dist/assets/js/settings.js"></script>
    <script src="dist/assets/js/todolist.js"></script>
  </body>
  </html>
  <?php
});
?>