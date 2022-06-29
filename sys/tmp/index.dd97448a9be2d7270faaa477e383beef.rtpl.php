<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang=es>
    <head>
        <meta charset="utf-8">
        <title><?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>: Haz amig@s, súmate a la diversión y date a conocer.</title>
        <meta name="description" content="<?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>: Haz amig@s, súmate a la diversión y date a conocer.">
        <meta name="keywords" content="<?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, drako, gratis, mundo, virtual, red social, gratis, comunidad, personaje, chat, online, adolescente, roleplaying, unirse, social, grupos, forums, seguro, jugar, juegos, amigos, adolescentes, raros, furni raros, coleccionable, crear, coleccionar, conectar, furni, muebles, mascotas, diseño de salas, compartir, expresión, placas, pasar el rato, música, celebridad, visitas de famosos, celebridades, juegos en línea, juegos multijugador, multijugador masivo">
        <link rel="shorcut icon" href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>img/favicon.gif">
        <link rel="stylesheet" href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>css/reset.css">
        <link rel="stylesheet" href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>css/frontpage.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        
        <script>
            var csrfToken = "<?php echo htmlspecialchars( $site["csrfToken"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
            var siteURL = "<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
        </script>
        <script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>js/jquery.min.1.9.1.js"></script>
        <script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>js/frontpage.js"></script>
        <script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>js/CSRF.js"></script>

    </head>
    <header>
        <div id="header_right">
            <?php echo htmlspecialchars( $site["online"], ENT_COMPAT, 'UTF-8', FALSE ); ?> online
            <a class="btn" id="showRegister" name="nonway" style="min-width: 120px; position: relative; top: 0px; margin-left: 5px;">¡ÚNETE YA!</a>
        </div>
        <div id="logo"></div>
    </header>

        <div class="ads" id="errorMessage" style="display: none; background: none repeat scroll 0 0 #FF0000; padding:10px; color:white; text-align:center;">
            
        </div>

    <body>
        <div id="body_right">
            
            <form id="login" action="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>habblet/ajax/login.php" method="post" autocomplete="off">
                <input type="text" name="ue" placeholder="usuario o correo electrónico" required>
                <input type="password" name="pass" placeholder="contraseña" required>
                <input type="submit" class="btn" style="width: 250px; text-transform:uppercase;" id="enter" value="ENTRAR A <?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <a id="forg_link">¿Contraseña olvidada?</a>
            </form>

            <form id="register" action="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>habblet/ajax/register.php" method="post" autocomplete="off" style="display:none;">
                <input type="email" name="email" placeholder="correo electrónico" required><br>
                <input type="text" name="username" placeholder="nombre de usuario" title="Ingresa un nombre de usuario" required><br>
                <input type="password" name="pass" placeholder="contraseña" title="Ingresa una contraseña" required><br>  

                <!--<input type="text" name="birth" placeholder="cumpleaños (aaaa-mm-dd)" required pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Ejemplo: 1996-07-28">-->
                
                <select name="gender" style="width: 252px; color: #999" id="choice" onchange="selectchange();" required>  
                  <option value="0">género</option>
                  <option value="m">chico</option>
                  <option value="f">chica</option>
                </select>

                <img id="captcha" src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>sys/lib/securimage/securimage_show.php" alt="CAPTCHA Image" />
                <input type="text" style="float:left; width: 100px; margin-right:10px;" name="captcha_code" size="10" maxlength="6" placeholder ="captcha" required/><br>
                <a id="forg_link" data-name="updateCaptcha">Nuevo captcha</a>

                <input type="submit" class="btn" style="width: 250px;" id="enter" value="REGISTRAREME">
              <!--<a href="javascript:doLogin();" class="btn" style="width: 250px;" id="enter">REGISTRARME</a><br>-->
              <a id="forg_link" name="hideRegister">Cancelar registro</a>
            </form>

            <div class="ads" name="ads_reg" style="float:right; position: relative; top: 82px;">
                <?php require $this->checkTemplate(".\ads/234_60");?>

            </div>
        </div>
        <div id="body_left">
            <div class="title">¡Bienvenido a <?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!</div>
            <div class="subtitle">Un lugar extraño con gente genial</div>
            <br>
            <br>
            <div class="subtitle">¿Qué es <?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?</div>
            <div class="text">
                <p><?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> es un mundo virtual para jugadores a partir de 13 años en el</p>
                <p>que puedes crear tu personaje y diseñar tu sala como quieras.</p>
                <br>
                <p>Harás amigos, chatearás, organizaras fiestas, cuidarás mascotas virtuales,</p>
                <p>cearás y jugarás a juegos y completarás retos. ¡Haz clic en "Únete ya" para</p>
                <p>empezar!.</p>
            </div>
            <div class="ads" style="position: relative; top: 30px;">
                <?php require $this->checkTemplate(".\ads/468_60_i");?>

            </div>
        </div>
    </body>
    <script>
        window.onload = loadEnvironment();
    </script>
    <footer>
        <div id="footer_right">
            Designed by <a href="http://jamiebla.de/" target="_blank">Jamiebla.de</a> Developed by <strong>iStocker</strong>
        </div>
        &copy; 2013 <?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Some images by Sulake Company Oy.
        <br><br>
        <div class="ads" style="padding:8px;">
            <center>
                <?php require $this->checkTemplate(".\ads/728_90");?>

            </center>
        </div>
    </footer>
</html>