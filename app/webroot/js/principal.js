var scroll = new Object();

scroll.inicializar = function (botonSubir,botonBajar,idElemScrollable,contenedor,tinicial,velocidad){	
	this.botonSubir = document.getElementById(botonSubir);
	this.botonBajar = document.getElementById(botonBajar);
	this.idElemScrollable =	idElemScrollable;
	this.elemScrollable = document.getElementById(idElemScrollable);
	this.contenedor = contenedor;
	this.tinicial = tinicial;
	this.velocidad = velocidad;
	this.alturaContenedor = 0;
	this.alturaElemScrollable = 0;
	this.t;
	this.eventos();
}
scroll.inicializar.prototype = {
	//Entra una vez se produce un evento onmousedown en los botones de scroll
	procesar: function (accion) {
		this.elemScrollable =document.getElementById(this.idElemScrollable);//necesario ya que el elemento puede ser 																				 eliminado y creado dinamicamente
		this.alturaElemScrollable = parseInt(window.getComputedStyle(this.elemScrollable,null).getPropertyValue("height"));
		this.alturaContenedor = parseInt(window.getComputedStyle(document.getElementById(this.contenedor),null).getPropertyValue("height"));
		if(this.alturaElemScrollable > this.alturaContenedor){
			if(accion == 'scrollUp')
				this.scrollUp();
			else
				this.scrollDown();		
		}
	},	
	scrollUp: function(){
		var elemMarginTop = parseInt(window.getComputedStyle(this.elemScrollable,null).getPropertyValue("margin-top"));
		if(elemMarginTop > (this.alturaContenedor - this.alturaElemScrollable)){
			var c = elemMarginTop - 10;
			this.elemScrollable.style.marginTop = c +"px";			
		}	
		var varT= this				
		this.t = setTimeout(function (){ varT.scrollUp();}, this.tinicial);
		this.tinicial = this.tinicial / this.velocidad;
	},
	scrollDown: function(){
		var elemMarginTop = parseInt(window.getComputedStyle(this.elemScrollable,null).getPropertyValue("margin-top"));
		if(elemMarginTop < 0){
			var c = elemMarginTop + 10;
			this.elemScrollable.style.marginTop= c + "px";		
		}
		var varT= this				
		this.t = setTimeout(function (){ varT.scrollDown();}, this.tinicial);
		this.tinicial = this.tinicial / this.velocidad;
	},
	eventos: function() {
		var varThis = this;
		this.botonSubir.onmousedown = function() {
			varThis.procesar("scrollUp");
		}
		this.botonBajar.onmousedown = function() {
			varThis.procesar("scrollDown");	
		}
		this.botonSubir.onmouseup = function() {
		    clearTimeout(varThis.t);
		}
		this.botonSubir.onmouseout = function() {
		    clearTimeout(varThis.t);
		}
		this.botonBajar.onmouseup = function() {
		    clearTimeout(varThis.t);
		}
		this.botonBajar.onmouseout = function() {
		    clearTimeout(varThis.t);
		}
	}
}

var opcionesTablas = new Object();

	opcionesTablas.inicializar = function(idSelect,idPrimeraPag,idPagAnterior,idPagActual,idNumTotalPag,idPagSiguiente,idUltPag,idNumTotalItems,tipo){
		this.select = document.getElementById(idSelect);
		this.primeraPag = document.getElementById(idPrimeraPag);
		this.pagAnterior = document.getElementById(idPagAnterior);
		this.pagActual = document.getElementById(idPagActual);
		this.numTotalPag = document.getElementById(idNumTotalPag);
		this.pagSiguiente = document.getElementById(idPagSiguiente);
		this.ultPag = document.getElementById(idUltPag);
		this.numTotalItems = document.getElementById(idNumTotalItems);
		this.tipo = tipo;
		this.cargarEventos();
};
opcionesTablas.inicializar.prototype = {
	cambiosSelect: function() {
			var numUrlsPag = parseInt(this.select.options[this.select.selectedIndex].value); 
			var numTotalItems = parseInt(this.numTotalItems.innerHTML);
			cargaContenidosUrls(0,numUrlsPag,this.tipo);
			this.numTotalPag.innerHTML = Math.ceil(numTotalItems/numUrlsPag);
	},
	irPrimeraPag: function(){
		var numUrls = this.select.options[this.select.selectedIndex].value;
		cargaContenidosUrls(0,numUrls,this.tipo);
		this.pagActual.innerHTML = '1';
	},
	irPaginaAnterior: function(){
		var pagActual = parseInt(this.pagActual.innerHTML);
		var numUrlsPag = parseInt(this.select.options[this.select.selectedIndex].value);
		if(pagActual > 1){
			var ultElem = (pagActual-1)*numUrlsPag;
			cargaContenidosUrls(ultElem-numUrlsPag,ultElem,this.tipo);
			this.pagActual.innerHTML = pagActual -1 ;
		}	
	},
	irPaginaSiguiente: function() {
		var numUltpag = parseInt(this.numTotalPag.innerHTML);
		var pagActual = parseInt(this.pagActual.innerHTML);
		var numUrlsPag = parseInt(this.select.options[this.select.selectedIndex].value);

		if(numUltpag > pagActual){
			var ultElem = numUrlsPag*(pagActual+1);
			cargaContenidosUrls((ultElem-numUrlsPag),ultElem,this.tipo);	
			this.pagActual.innerHTML = pagActual + 1;
		}
	},
	irUltimaPagina: function (){
		var numUltpag = parseInt(this.numTotalPag.innerHTML);
		var pagActual = parseInt(this.pagActual.innerHTML);
		var numUrlsPag = parseInt(this.select.options[this.select.selectedIndex].value);
		if(numUltpag > pagActual){
			var ultElem = numUrlsPag*(pagActual+1);
			cargaContenidosUrls((ultElem-numUrlsPag),ultElem,this.tipo);	
			this.pagActual.innerHTML = pagActual + 1;
		}
	},
	cargarEventos: function (){
		var varThis = this;
		this.select.onchange = function() {
			varThis.cambiosSelect();
		}
		this.primeraPag.onclick = function() {
			varThis.irPrimeraPag();
		}
		this.pagAnterior.onclick = function() {
			varThis.irPaginaAnterior();
		}
		this.pagSiguiente.onclick = function() {
			varThis.irPaginaSiguiente();
		}
		this.ultPag.onclick = function() {
			varThis.irUltimaPagina();	
		}
	}	
}

function expand() {
    $("#data1").slideDown('slow');
}
function collapse() {
    $("#data1").slideUp('slow');
}

function enviarFormulario(ruta){
		document.getElementById("LinksAddForm").action = ruta; 
		document.getElementById("LinksAddForm").submit();
} 

/*Funcion encargada de mostrar las estadisticas*/
var mostar_estadisticas = function (id_link){ 
		cargarEstadisticas(id_link);
		document.getElementById('front').style.display='none';
		document.getElementById('front_estadisticas').style.display='block';
		document.getElementById('vista_dia').style.backgroundColor='#CD5C5C';
		document.getElementById('vista_dia').style.color='#FFF'; 
		document.getElementById('vista_mes').style.backgroundColor='#fff';
		document.getElementById('vista_mes').style.color='#aaa';
		document.getElementById('vista_ano').style.backgroundColor='#fff';
		document.getElementById('vista_ano').style.color='#aaa';

}
//Durante la carga de la pagina asignamos las funciones que manejaran los eventos utilizados
window.onload = function() {
	//Efecto oscurecer al pasar por encima de los elementos de la cabecera
//	var liTags = document.getElementById("cabecera").getElementsByTagName("li");
//	for (var i = 0; i < liTags.length; i++) {
//    	liTags[i].onmouseover = function (){
//									this.style.backgroundImage="url('/img/overcabecera.png')";
//           						 }
//		liTags[i].onmouseout = function (){
//									this.style.backgroundImage="url('/img/fondo_barra_navegacion.png')";
//           						 }
//	}
	

	document.getElementById("vista_dia").onmousedown = function (){ 
			document.getElementById('front_estadisticas').style.display='block';
			document.getElementById('vista_dia').style.backgroundColor='#CD5C5C';
			document.getElementById('vista_dia').style.color='#FFF';
			document.getElementById('vista_mes').style.backgroundColor='#fff';
			document.getElementById('vista_mes').style.color='#aaa';
			document.getElementById('vista_ano').style.backgroundColor='#fff';
			document.getElementById('vista_ano').style.color='#aaa';
			document.getElementById('canvas_mes').style.display='none';
			document.getElementById('canvas_ano').style.display='none';	
			document.getElementById('canvas_dia').style.display='inline';		
		
		}
	document.getElementById("vista_mes").onmousedown = function (){ 
			document.getElementById('front_estadisticas').style.display='block';
			document.getElementById('vista_mes').style.backgroundColor='#CD5C5C';
			document.getElementById('vista_mes').style.color='#FFF';
			document.getElementById('vista_dia').style.backgroundColor='#fff';
			document.getElementById('vista_dia').style.color='#aaa';
			document.getElementById('vista_ano').style.backgroundColor='#fff';
			document.getElementById('vista_ano').style.color='#aaa';
			document.getElementById('canvas_mes').style.display='inline';
			document.getElementById('canvas_dia').style.display='none';	
			document.getElementById('canvas_ano').style.display='none';			
		
		}
		
	document.getElementById("vista_ano").onmousedown = function (){ 
			document.getElementById('front_estadisticas').style.display='block';
			document.getElementById('vista_ano').style.backgroundColor='#CD5C5C';
			document.getElementById('vista_ano').style.color='#FFF';
			document.getElementById('vista_dia').style.backgroundColor='#fff';
			document.getElementById('vista_dia').style.color='#aaa';
			document.getElementById('vista_mes').style.backgroundColor='#fff';
			document.getElementById('vista_mes').style.color='#aaa';
			document.getElementById('canvas_dia').style.display='none';
			document.getElementById('canvas_mes').style.display='none';
			document.getElementById('canvas_ano').style.display='inline';			
		
		}

	var elemScrollSupIzq = document.getElementById("scroll_superior_izq");
	var elemScrollSupDer = document.getElementById("scroll_superior_der");
	var elemScrollInfIzq = document.getElementById("scroll_inferior_izq");
	var elemScrollInfDer = document.getElementById("scroll_inferior_der");
	var elemUlIzq = document.getElementById("ul_links_izq"); 
	var elemUlDer = document.getElementById("ul_links_der"); 
	var elemListUrlIzq = document.getElementById("div_lista_url_izq"); 
	var elemListUrlDer = document.getElementById("div_lista_url_der"); 
		
	var opcionesUrls = new opcionesTablas.inicializar("select_num_url","boton_primera_pag_url","boton_pag_anterior_url","pag_actual_url","ultima_pag_url","boton_pag_siguiente_url","boton_ultima_pag_url","num_items_urls","url");

	var opcionesMini = new opcionesTablas.inicializar("select_num_mini","boton_primera_pag_mini","boton_pag_anterior_mini","pag_actual_mini","ultima_pag_mini","boton_pag_siguiente_mini","boton_ultima_pag_mini","num_items_mini","mini");
	
	var scrollIzq = new scroll.inicializar("scroll_superior_izq","scroll_inferior_izq","ul_links_izq", "div_lista_url_izq",100,1);
	var scrollDer = new scroll.inicializar("scroll_superior_der","scroll_inferior_der","ul_links_der", "div_lista_url_der",100,1);

	collapse();
}



