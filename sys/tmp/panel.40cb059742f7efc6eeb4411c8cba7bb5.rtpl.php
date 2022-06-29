<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box greenishblue">
<div class="top" data-title='0'> Introducción </div>
<div data-role="tool-box">
    <section data-id="0">
        <img src="http://habboemotion.com/resources/images/frank/frank_16.gif" style="float:right; padding:5px;"></img>
        <p style="text-align:justify;">Dentro del panel de configuración de tu cuenta podrás encontrar diversos contenidos que te ayuden a configurar tu cuenta a tu gusto personal.</p> 
        <br>
        <p style="text-align:justify;">Las herramientas que puedes encontrar en este panel son las que vez al lado derecho en el contenedor con el título "<strong>Menú</strong>".</p>
        <br>
        <p style="text-align:justify;">Al momento de dar click sobre alguna opción éste diálogo cambiará y te dará nuevas opciones según el panel que hayas elegido.</p>
        <br>
        <p style="text-align:right;"><b>¡Suerte!</b></p>
    </section>

    <section data-id="1" style="display:none;">
        <div class="settings">
            <form method="POST" data-name="basic" action="habblet/ajax/settings.php">
                <p><b>ESTADO</b></p>
                <p>Recuerda que tu estado podrá ser visto por todos, ¡piénsalo bien!...</p>
                <input type="text" name="motto" value="<?php echo htmlspecialchars( $user["motto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="width: 90%;" maxlength="32"> <br> 
                <hr>
                <p><b>PETICIONES DE AMISTAD</b></p>
                <select name="friends" style="background-color:white; width: 95%;">
                    <option value="0">Activadas</option>
                    <option value="1">Desactivadas</option>
                </select>
                <br><br> 
                <input type="submit" value="Enviar">
            </form>
            <p></p>
        </div>
    </section>
    <section data-id="2" style="display:none;">
                                
    </section>
    <section data-id="3" style="display:none;">
        <div class="settings">
            <form method="POST" data-name="passwd" action="habblet/ajax/settings.php">
                <p><b>INSTRUCCIONES</b></p>
                <p>Para cambiar tu contraseña necesitas ingresar tu contraseña actual y dos veces la nueva contraseña. Una vez hecho esto se te enviará un correo electrónico a tu cuenta con un enlace en el cual podrás cambiar la contraseña.</p>
                <hr>
                <p><b>CONTRASEÑA ACTUAL</b></p>
                <input type="password" name="passwd" style="width: 90%;" maxlength="35" required> <br> 
                <hr>
                <p><b>CONTRASEÑA NUEVA</b></p>
                <input type="password" name="newpasswd" style="width: 90%;" maxlength="35" required> <br> 
                <hr>
                <p><b>CONFIRMAR CONTRASEÑA NUEVA</b></p>
                <input type="password" name="new2passwd" style="width: 90%;" maxlength="35" required> <br> 

                <br><br> <input type="submit" value="Enviar">
            </form>
            <p></p>
            </div>
    </section>
</div>