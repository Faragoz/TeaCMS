<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box darkblue">
    <div class="top">
        Radio
    </div>
    <div data-role="radio">
         <center>
         <script type="text/javascript">
            new WHMSonic({
            source : "http://<?php echo htmlspecialchars( $radio["ip"], ENT_COMPAT, 'UTF-8', FALSE ); ?>:<?php echo htmlspecialchars( $radio["port"], ENT_COMPAT, 'UTF-8', FALSE ); ?>",
            volume : 0,
            autoplay : false,
            width: 272,
            height: 50,
            twitter : "https://twitter.com/<?php echo htmlspecialchars( $twitter["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>",
            facebook : "https://www.facebook.com/pages/<?php echo htmlspecialchars( $facebook["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?>",
            logo : "",
            });
            </script>

        <a href="#">¡Puedes pedir tu canción! Pulsa aquí<a>
    </div>
</div>
