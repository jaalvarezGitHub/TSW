var net = new Object();

net.READY_STATE_UNINITIALIZED=0;
net.READY_STATE_LOADING=1;
net.READY_STATE_LOADED=2;
net.READY_STATE_INTERACTIVE=3;
net.READY_STATE_COMPLETE=4;
 
// Constructor
net.CargadorContenidos = function(url, funcion, funcionError) {
  this.url = url;
  this.req = null;
  this.onload = funcion;
  this.onerror = (funcionError) ? funcionError : this.defaultError;
  this.cargaContenidoXML(url);
	 
}
 
net.CargadorContenidos.prototype = {
  cargaContenidoXML: function(url) {
    if(window.XMLHttpRequest) {
      this.req = new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
      this.req = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if(this.req) {
      try {
        var loader = this;
        this.req.onreadystatechange = function() {
        	loader.onReadyState.call(loader);
        }
        this.req.open('GET',url, true);

        this.req.send(null);
      } catch(err) {
        	this.onerror.call(this);
      }
    }
  },
  onReadyState: function() {
    var req = this.req;
    var ready = req.readyState;
    if(ready == net.READY_STATE_COMPLETE) {
      var httpStatus = req.status;
      if(httpStatus == 200 || httpStatus == 0) {
        this.onload.call(this);
      }
      else {
        this.onerror.call(this);
      }
    }
  },
  defaultError: function() {
    alert("Se ha producido un error al obtener los datos"
      + "\n\nreadyState:" + this.req.readyState
      + "\nstatus: " + this.req.status 
      + "\nheaders: " + this.req.getAllResponseHeaders());
  }
}
function muestraContenido() { 
	var ul = document.getElementById("ul_links_izq");
	ul.parentNode.removeChild(ul);
	var lista_izq = document.getElementById("div_lista_url_izq");
	
	var new_ul = document.createElement("ul");
	new_ul.setAttribute("id","ul_links_izq");
	lista_izq.appendChild(new_ul);

	var request = JSON.parse(this.req.responseText);
	
	for(var i in request){
		var new_li = document.createElement("li");
		new_ul.appendChild(new_li);
		var new_link = document.createElement("a");
		new_link.setAttribute("class","url_div_izq");
		new_link.setAttribute("id",request[i].Url.id);
		new_li.appendChild(new_link);
		new_link.appendChild(document.createTextNode(request[i].Url.url));
	}

}
function muestraContenidoMini() {
  
	var ul = document.getElementById("ul_links_der");
	ul.parentNode.removeChild(ul);
	var lista_izq = document.getElementById("div_lista_url_der");
	
	var new_ul = document.createElement("ul");
	new_ul.setAttribute("id","ul_links_der");
	lista_izq.appendChild(new_ul);
	var request = JSON.parse(this.req.responseText);
	for(var i in request){
		var new_li = document.createElement("li");
		new_ul.appendChild(new_li);
		var new_link = document.createElement("a");
		new_link.setAttribute("class","url_div_izq");
		new_link.setAttribute("id",request[i].Link.id);
		new_li.appendChild(new_link);
		new_link.appendChild(document.createTextNode(request[i].Link.urlMini));
	}
	
}


function showEst(){ console.log("aqui");

	var request = JSON.parse(this.req.responseText); 	console.log(request);
	var divEst = document.getElementById("estadisticas_tiempo");

	var canvas = document.createElement("canvas");
	canvas.setAttribute("id","canvas_mes");
	canvas.setAttribute("width","600");
	canvas.setAttribute("height","300");
	canvas.style.position ="absolute";
	divEst.appendChild(canvas); 
	var a = new Array();
	var visitas = new Array();

	for(var i in request.mes){
			a[i]=request.mes[i][0].semana;
			visitas[i]= request.mes[i][0].num_visitas; console.log(visitas);

	}
	var data = {
	labels : a,
	datasets : [
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			data : visitas
		}
	]
}
			var ctx = document.getElementById("canvas_mes").getContext("2d");
			var myNewChart = new Chart(ctx).Bar(data);

/**********************canvas_ano*/

	canvas = document.createElement("canvas");
	canvas.setAttribute("id","canvas_ano");
	canvas.setAttribute("width","600");
	canvas.setAttribute("height","300");
	canvas.style.position ="absolute";
	divEst.appendChild(canvas); 
	a = new Array();
	visitas = new Array();

	for(var i in request.ano){
			a[i]=request.ano[i][0].mes;
			visitas[i]= request.ano[i][0].num_visitas; console.log(visitas);

	}
	data = {
	labels : a,
	datasets : [
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			data : visitas
		}
	]
}
			ctx = document.getElementById("canvas_ano").getContext("2d");
			myNewChart = new Chart(ctx).Bar(data);

/***************canvas web*************************/

	var divWnp = document.getElementById("estadisticas_wnp"); 
	canvas = document.createElement("canvas");
	canvas.setAttribute("id","canvas_web");
	canvas.setAttribute("width","200");
	canvas.setAttribute("height","200");
	divWnp.appendChild(canvas); 
	a = new Array();
	b = new Array();
	visitas = new Array();

	for(var i in request.web){ 
			b['value'] = request.web[i][0].num_visitas;
			b['color'] = 0;
			a[i] = b;
}

	ctx = document.getElementById("canvas_web").getContext("2d");
	myNewChart = new Chart(ctx).Doughnut(a);

/*************************pais************************/

	divWnp = document.getElementById("estadisticas_wnp"); 
	canvas = document.createElement("canvas");
	canvas.setAttribute("id","canvas_pais");
	canvas.setAttribute("width","200");
	canvas.setAttribute("height","200");
	divWnp.appendChild(canvas); 
	a = new Array();
	b = new Array();
	visitas = new Array();

	for(var i in request.pais){ 
			b['value'] = request.pais[i][0].num_visitas;
			b['color'] = 0;
			a[i] = b;
	}

	ctx = document.getElementById("canvas_pais").getContext("2d");
	myNewChart = new Chart(ctx).Doughnut(a);

/*************************navegador*******************/

	divWnp = document.getElementById("estadisticas_wnp"); 
	canvas = document.createElement("canvas");
	canvas.setAttribute("id","canvas_navegador");
	canvas.setAttribute("width","200");
	canvas.setAttribute("height","200");
	divWnp.appendChild(canvas); 
	a = new Array();
	b = new Array();
	visitas = new Array();

	for(var i in request.navegador){ 
			b['value'] = request.navegador[i][0].num_visitas;
			console.log(request.navegador[i][0].num_visitas);
			b['color'] = 0;
			a[i] = b;
	}

	ctx = document.getElementById("canvas_navegador").getContext("2d");
	myNewChart = new Chart(ctx).Doughnut(a);

}




function cargaContenidosUrls(idI, idF,tipo) {
 
  if(tipo == 'url'){
 	 var cargador = new net.CargadorContenidos('http://www.corto.es/Urls/recuperar?idI='+idI+'&idF='+idF, muestraContenido);
  }else
	 var cargador = new net.CargadorContenidos('http://www.corto.es/Links/recuperar?idI='+idI+'&idF='+idF, muestraContenidoMini);
  //return false;
}

function cargarEstadisticas(id){
	var cargador = new net.CargadorContenidos('http://www.corto.es/Visitas/estadisticas/1',showEst); 
}



