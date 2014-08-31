(function($) {

//localStorage.clear();

 $('.candidata').click(function(){
 	
 	// Id candidata
 	var nuevaCandidata = $(this).attr('data-id');

 	// Si existe entre las candidatas, la eliminamos de candidatas
 		// Primero comprobamos que tenga candidatas
 		if(localStorage.getItem("rechazadas"))
 		{
	 		var rechArray = localStorage['rechazadas'].split(",");
	 		//Reseteamos, porque vamos a generarla de nuevo
	 		localStorage.removeItem('rechazadas');

	 		for (index = 0; index < rechArray.length; ++index) {
			    
	 			// Regeneramos de nuevo las candidatas y si encontramos la rechazada no la agregamos
			    if(rechArray[index] != nuevaCandidata)
			    {
			    	// Generar candidatas
			    	if(localStorage.getItem("rechazadas"))
 					{
 						localStorage['rechazadas'] = localStorage['rechazadas']+','+rechArray[index];
 					}
 					else
 					{
 						localStorage.setItem("rechazadas", rechArray[index]);
 					}
			    }	
			}
		}

 	// Ya se ha guardado alguna candidata?
 	if(localStorage.getItem("candidatas"))
 	{
 		var candArray = localStorage['candidatas'].split(",");
 		//console.log(candArray);

 		// Buscar si existe ya
 		var index;
 		var existe = false;

 		for (index = 0; index < candArray.length; ++index) {
		    //console.log(candArray[index]);

		    if(candArray[index] == nuevaCandidata)
		    	existe = true;
		}

		// No existe todavia, la guardamos
		if(!existe)
 			localStorage['candidatas'] = localStorage['candidatas']+','+nuevaCandidata;
 	}
 	else
 	{
 		localStorage.setItem("candidatas", nuevaCandidata);
 	}

 	alert("Rechazadas: "+localStorage['rechazadas']+" Candidatas:"+localStorage['candidatas']);
 });

$('.rechazar').click(function(){
 	
 	// Id candidata
 	var rechazada = $(this).attr('data-id');

 	// Si existe entre las candidatas, la eliminamos de candidatas
 		// Primero comprobamos que tenga candidatas
 		if(localStorage.getItem("candidatas"))
 		{
	 		var candArray = localStorage['candidatas'].split(",");
	 		//Reseteamos, porque vamos a generarla de nuevo
	 		localStorage.removeItem('candidatas');

	 		for (index = 0; index < candArray.length; ++index) {
			    
	 			// Regeneramos de nuevo las candidatas y si encontramos la rechazada no la agregamos
			    if(candArray[index] != rechazada)
			    {
			    	// Generar candidatas
			    	if(localStorage.getItem("candidatas"))
 					{
 						localStorage['candidatas'] = localStorage['candidatas']+','+candArray[index];
 					}
 					else
 					{
 						localStorage.setItem("candidatas", candArray[index]);
 					}
			    }	
			}
		}

 	// Ya se ha guardado alguna candidata?
 	if(localStorage.getItem("rechazadas"))
 	{
 		var rechArray = localStorage['rechazadas'].split(",");
 		//console.log(candArray);

 		// Buscar si existe ya
 		var index;
 		var existe = false;

 		for (index = 0; index < rechArray.length; ++index) {
		    //console.log(candArray[index]);

		    if(rechArray[index] == rechazada)
		    	existe = true;
		}

		// No existe todavia, la guardamos
		if(!existe)
 			localStorage['rechazadas'] = localStorage['rechazadas']+','+rechazada;

 		
 	}
 	else
 	{
 		localStorage.setItem("rechazadas", rechazada);
 	}

 	alert("Rechazadas: "+localStorage['rechazadas']+" Candidatas:"+localStorage['candidatas']);
 });


})(jQuery);