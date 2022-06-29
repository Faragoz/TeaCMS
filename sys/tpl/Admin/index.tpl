
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Panel &raquo; Login</title>
  <link rel="stylesheet" href="{$site.url}{$site.sub}{$admin.path}{$site.path}css/base.css" type="text/css" media="screen" />
  <link rel="stylesheet" id="current-theme" href="{$site.url}{$site.sub}{$admin.path}{$site.path}css/index.css" type="text/css" media="screen" />

  <script>
      var csrfToken = "{$site.csrfToken}";
      var siteURL = "{$site.url}{$site.sub}{$site.admin}";
  </script>

  <script src="{$site.url}{$site.sub}{$admin.path}{$site.path}js/jquery.min.1.9.1.js"></script>
  <script src="{$site.url}{$site.sub}{$admin.path}{$site.path}js/showResult.js"></script>
  <script src="{$site.url}{$site.sub}{$admin.path}{$site.path}js/frontpage.js"></script>
  <script src="{$site.url}{$site.sub}{$admin.path}{$site.path}js/CSRF.js"></script>
</head>
<body>
  <div id="container">
    
    <div id="wrapper" class="wat-cf">
      <div id="main">
    <div id="box">
      <div class="block" id="block-login">
        <h2>Iniciar sesión</h2>
        <div class="content login">
          <div class="flash">
            <div class="message notice">
              <p>No podrás ingresar si no tienes los permisos necesarios</p>
            </div>
            <div id="response">
            </div>
          </div>
          <form action="ajax/login.php" id="login" class="form login">
            <div class="group wat-cf">
              <div class="left">
                <label class="label right">Nombre de usuario</label>
              </div>
              <div class="right">
                <input type="text" name="ue" class="text_field" required/>
              </div>
            </div>
            <div class="group wat-cf">
              <div class="left">
                <label class="label right">Contraseña</label>
              </div>
              <div class="right">
                <input type="password" name="pass" class="text_field" required/>
              </div>
            </div>
            <div class="group navform wat-cf">
              <div class="right">
                <button class="button" type="submit">
                  <img src="{$site.url}{$site.sub}{$admin.path}{$site.path}img/icons/key.png" alt="Save" /> Entrar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</body>
<script>
  window.onload = loadEnvironment();
</script>
</html>

