/*
    Made by LittleJ
    novoproject.net
*/
window.onload = loadEnvironment;

function loadEnvironment()
{
    var forms, index;
    forms = document.getElementsByTagName('form');

    for (index = 0; index <= forms.length-1; ++index) 
    {
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");  
        input.setAttribute("id", "csrfToken");
        input.setAttribute("name", "csrfToken");
        input.setAttribute("value", csrfToken); 
        forms[index].appendChild(input);
    }
}