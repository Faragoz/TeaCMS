$(document).ready(function()
{
    $('form').submit(function (event)
    {	
    	event.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function(result)
        {
            if(result.error)
			{
				$('div#response').hide("slow");
			    $('div.message').remove();
			    showResult(result.message, true);
			    $('div#response').show("slow");
			}
			else
			{
			    $(location).attr('href', siteURL + 'panel');
			}
        });
    });
});