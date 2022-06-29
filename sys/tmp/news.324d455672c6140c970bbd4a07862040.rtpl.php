<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box">
    <?php if( $news["id"] ){ ?>

        <div class="top" new-title>
            <?php echo htmlspecialchars( $news["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

        </div>
        <div data-role="news">
            <div>
                <div>
                    <img author-look src="http://www.habbohotel.es/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars( $news["look"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&direction=2&head_direction=3&gesture=sml&action=&size=m">
                </div>
                <div>
                    <!--<b>Título</b> <br> <?php echo htmlspecialchars( $news["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>-->
                    <b>Autor</b> <p author-name><?php echo htmlspecialchars( $news["author"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    <b>Publicada el</b> <p published><?php echo htmlspecialchars( $news["published"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                </div>
            </div>
            <div new-body>
                <?php echo htmlspecialchars( $news["body"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

            </div>
        </div>
        
    <?php }else{ ?>

        <div class="top">
            ¡No existe!
        </div>
        <div data-role="news">
            <div data-author>
                <div data-user>
                    <img src="http://www.habbohotel.es/habbo-imaging/avatarimage?figure=ca-1807-62.ea-3168-64.lg-3078-82.sh-3016-110.hd-180-1.ch-3059-110.hr-3163-61&direction=2&head_direction=3&gesture=sml&action=&size=m">
                </div>
                <center>
                    <p>Así es querido amigo... aunque no lo creas, aunque no te lo imagines, la noticia que buscas...</p>
                    <div>¡NO EXISTE!... ¡CHAN, CHAN, CHAAAAN!</div>
                    Por favor, revisa que haz ingresado correctamente a la noticia o elige otra en nuestro apartado a la derecha.
                </center>
            </div>
        </div>
    <?php } ?>

</div>