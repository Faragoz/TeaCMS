<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box redeemcredits">
    <div><strong><?php echo htmlspecialchars( $user["credits"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong><br>créditos</div>
    <div id="pixels"><strong><?php echo htmlspecialchars( $user["activity_points"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong><br>píxeles</div>
    <div id="points"><strong><?php echo htmlspecialchars( $user["vip_points"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong><br>puntos vip</div>
                    
    <p>Introduce el código para canjear<p>
    <form name="voucher" action="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>habblet/ajax/voucher.php" method="post">
        <input type="text" name="voucher" required>
        <input type="submit" class="fp_btn" value="Canjear créditos">
    </form>
</div>