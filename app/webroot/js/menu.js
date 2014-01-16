$(document).ready(function(){
             var resultado = "Resultado: ";
            //Ocultamos el menú al cargar la página
            $("#menu_der").hide();
             
            /* mostramos el menú si hacemos click derecho
            con el ratón */
            $('a').bind("contextmenu", function(e){
																		           
																		
																		resultado=$(this).attr("id");
																		var padre= $(this).parent().parent().offset();
																		if( $(this).parent().parent().attr("id")=="ul_links_der"){
                  $("#menu_der").css({'display':'block', 'left':e.pageX - padre.left, 'top':e.pageY - padre.top});}
																		else{
																								if( $(this).parent().parent().attr("id")=="ul_links_izq"){
 $("#menu").css({'display':'block', 'left':e.pageX - padre.left, 'top':e.pageY - padre.top});


																		           }
}
                  return false;// esto e para anular o menu por defecto das pag
            });
             
             
            //cuando hagamos click, el menú desaparecerá
            $(document).click(function(e){
                  if(e.button == 0){
                        $("#menu").css("display", "none");
																								$("#menu_der").css("display", "none");
                  }
            });
             
            //si pulsamos escape, el menú desaparecerá
            $(document).keydown(function(e){
                  if(e.keyCode == 27){
                        $("#menu").css("display", "none");
																								$("#menu_der").css("display", "none");
                  }
            });
  
            //controlamos los botones del menú
            $("#menu_der").click(function(e){
                 
            					window.location.replace("/links/eliminar/"+resultado);

                   
            });

												$("#menu").click(function(e){
                   
                  // El switch utiliza los IDs de los <li> del menú
                  switch(e.target.id){
                        case "eliminar":
                              window.location.replace("/urls/eliminar/"+resultado)
                              break;      
                        case "modoSeguro":
                              window.location.replace("/links/recortar/"+resultado)
                              break;
                  }
                   
            });
             
                         
      }); 
