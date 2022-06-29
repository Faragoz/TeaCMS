<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html> 
<html lang="en" dir="ltr"> 
<head> 
<title><?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ~ <?php echo htmlspecialchars( $site["sname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></title> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script> 
<style type="text/css"> 
* { margin: 0; padding: 0; }
html, #client { height: 100%; text-align: left; background-color: black; }
#client { position: absolute; overflow: hidden; left: 0; top: 0; right: 0; bottom: 0; }
</style> 
<script type="text/javascript">
    var flashvars =
	{
            "client.allow.cross.domain" : "0", 
            "client.notify.cross.domain" : "1", 
            "connection.info.host" : "game-us.habbo.com", 
            "connection.info.port" : "30000", 
            "site.url" : "<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>", 
            "url.prefix" : "<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>", 
            "client.reload.url" : "<?php echo htmlspecialchars( $site["client"], ENT_COMPAT, 'UTF-8', FALSE ); ?>", 
            "client.fatal.error.url" : "http://drakohotel.net/flash_client_error", 
            "client.connection.failed.url" : "http://drakohotel.net/client_connection_failed", 
            "external.variables.txt" : "http://drakohotel.net/gamedata/external_variables/1.txt", 
            "external.texts.txt" : "http://drakohotel.net/gamedata/external_flash_texts/1.txt", 
            "safechat.list.txt" : "http://drakohotel.net/gamedata/safechat/1.txt", 
            "external.override.texts.txt" : "http://drakohotel.net/gamedata/override/external_flash_override_texts/1.txt", 
            "external.override.variables.txt" : "http://drakohotel.net/gamedata/override/external_override_variables/1.txt", 
            "productdata.load.url" : "http://drakohotel.net/gamedata/productdata/1.txt", 
            "furnidata.load.url" : "http://drakohotel.net/gamedata/furnidata/1.txt", 
            "sso.ticket" : "<?php echo htmlspecialchars( $user["auth_ticket"], ENT_COMPAT, 'UTF-8', FALSE ); ?>", 
            "processlog.enabled" : "1", 
            "account_id" : "<?php echo htmlspecialchars( $user["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>", 
            "client.starting" : "<?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> >...< Loading", 
            "flash.client.url" : "http://drakohotel.net/gordon/RELEASE63-201304022308-412969117/", 
            "user.hash" : "1", 
            "has.identity" : "1", 
            "flash.client.origin" : "popup" 
    };
 
   var params = {
        "base" : "http://drakohotel.net/gordon/RELEASE63-201304022308-412969117/",
        "allowScriptAccess" : "always",
        "menu" : "false"                
    };
	
    swfobject.embedSWF("http://drakohotel.net/gordon/RELEASE63-201304022308-412969117/Habbo.swf", "client", "100%", "100%", "10.0.0", "http://cdn.uber.meth0d.org/expressInstall.swf", flashvars, params, null);	
 
</script>
</head> 
<body> 
<div id="client"></div> 
</body> 
</html>