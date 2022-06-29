/**
 *	@author		iStocker
 *	@package	showResult
 *	@category	Ok / Error
 *	@version	1.2
 **/


/**
 * Mostrar diferentes resultados
 *
 * @param array|string 	data	>> En caso de ser array debe de ser bidimensional con el mensaje y si es un error o no.
 *								>> En caso de ser string debe de contener el mensaje del resultado.
 * @param bool 			error 	>> Si es un error o no.
 **/
function showResult(data, error)
 {
 	var response = document.getElementById('response');

 	if(data instanceof Array)
 	{
 		var box = new Array();
 		var error = new Array(); 	
 		
 		for(i = 0; i <= data.length; ++i)
 		{
 		    box[i] = document.createElement('div');
 		    
 		    if(data[i][1])
 		    {
 		        box[i].setAttribute('class', 'message error');
 		    }
 		    else
 		    {
 		        box[i].setAttribute('class', 'message ok');
 		    }
 		    error[i] = document.createTextNode(data[i][0]);

    	 	response.appendChild(box[i]);
    	 	box[i].appendChild(error[i]);
 		}
 	}
 	else
 	{
 		var box = document.createElement('div');
	 	
 		if(error)
	 	{
		 	box.setAttribute('class', 'message error');
	 	}
	 	else
	 	{
		 	box.setAttribute('class', 'message ok');
	 	}
	 	
	 	var error = document.createTextNode(data);

	 	response.appendChild(box);
	 	box.appendChild(error);
	}
}