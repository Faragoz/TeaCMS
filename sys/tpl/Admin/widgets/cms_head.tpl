<meta charset="utf-8"/>
	<title>Administración &raquo; {$site.sec}</title>
	
	<link rel="stylesheet" href="{$site.url}{$site.sub}{$site.path}css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="{$site.url}{$site.sub}{$site.path}js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="{$site.url}{$site.sub}{$site.path}js/hideshow.js" type="text/javascript"></script>
	<script src="{$site.url}{$site.sub}{$site.path}js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script src="{$site.url}{$site.sub}{$site.path}js/CSRF.js" type="text/javascript"></script>
	<script src="{$site.url}{$site.sub}{$site.path}js/bbcodeParser.js" type="text/javascript"></script>
	<script type="text/javascript" src="{$site.url}{$site.sub}{$admin.path}{$site.path}js/jquery.equalHeight.js"></script>
	<script>
      var csrfToken = "{$site.csrfToken}";
      var siteURL = "{$site.url}{$site.sub}{$site.admin}";
  	</script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
