<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box">
    <div class="top">
        Colaboradores
        </div>
    <div data-role="messages">
        <?php if( $colab["1"] ){ ?>

            <?php $counter1=-1;  if( isset($colab["0"]) && ( is_array($colab["0"]) || $colab["0"] instanceof Traversable ) && sizeof($colab["0"]) ) foreach( $colab["0"] as $key1 => $value1 ){ $counter1++; ?>

                <div>
                    <div>
                        <img src="http://www.habbo.fr/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars( $value1["look"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&direction=2&head_direction=3&gesture=sml&action=&size=l">
                    </div>

                    <div><?php echo htmlspecialchars( $value1["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?></div>

                    Mision: <?php if( $value1["motto"] ){ ?><?php echo htmlspecialchars( $value1["motto"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>¡No tiene misión!...<?php } ?><br>
                    <div>Tarea: <?php if( $value1["workin"] ){ ?><?php echo htmlspecialchars( $value1["workin"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>¡No tiene una tarea definida!...<?php } ?></div>
                </div>
            <?php } ?>

            <p style="text-align:right;"><?php echo htmlspecialchars( $colab["1"], ENT_COMPAT, 'UTF-8', FALSE ); ?> miembro(s)</p>
        <?php }else{ ?>

            <div>
                <div>
                <img src="http://www.habbohotel.es/habbo-imaging/avatarimage?figure=ca-1807-62.ea-3168-64.lg-3078-82.sh-3016-110.hd-180-1.ch-3059-110.hr-3163-61&direction=2&head_direction=3&gesture=sml&action=&size=l">
                </div>
                <div>¡Nadie!</div>
                ¿Qué esperas para ocuparlo tú?...<br>
            </div>
        <?php } ?>

    </div>
</div>

