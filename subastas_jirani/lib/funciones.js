function validarlog()
{
   var f=document.form;
   if(f.nom.value == 0)
   {
      alert("Por favor ingrese su usuario");
      f.nom.focus();
      return false;
	
   }
   if(f.clave.value == 0)
   {
      alert("Por favor ingrese su contraseña");
      f.clave.focus();
      return false;
   }
  
}

function limpiar()
{
   document.form.reset();
   document.form.nom.focus();
}

function valida_cadena(texto)
{
   var RegExPattern = "[1-9]";
   if (texto.match(RegExPattern))
   {
      return false;
   }
   else
   {
      return true;
   }
}

function valida_correo(correo)
{
   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo))
   {		
      return true;
   }
   else
   {
      return false;
   }
}

function validarReg()
   {
	   var f = document.registro;
	   if(f.nombre.value == 0)
       {
	     document.getElementById("div_name").innerHTML="<div style=\"font-size:13px; color:red\">El campo Nombre está vacío</div>";
         f.nombre.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_name").innerHTML="";
	   }
	   
	   if(!valida_cadena(f.nombre.value))
	   {
	   
	     document.getElementById("div_name").innerHTML="<div style=\"font-size:13px; color:red\">Por favor ingrese solo letras para su nombre</div>";
         f.nombre.value="";
	     f.nombre.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_name").innerHTML="";
	   }
	   
	   if(f.apellido.value == 0)
       {
	     document.getElementById("div_apellido").innerHTML="<div style=\"font-size:13px; color:red\">El campo Apellido está vacío</div>";
         f.apellido.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_apellido").innerHTML="";
	   }
	   
	   if(!valida_cadena(f.apellido.value))
	   {	   
	     document.getElementById("div_apellido").innerHTML="<div style=\"font-size:13px; color:red\">Por favor ingrese solo letras para su apellido</div>";
         f.apellido.value="";
	     f.apellido.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_apellido").innerHTML="";
	   }	
	   
	   if(f.email.value == 0)
       {
	     document.getElementById("div_mail").innerHTML="<div style=\"font-size:13px; color:red\">Por favor ingrese su E-mail</div>";
         f.email.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_mail").innerHTML="";
	   }
	   if(!valida_correo(f.email.value))
	   {
	     document.getElementById("div_mail").innerHTML="<div style=\"font-size:13px; color:red\">Por favor ingrese un correo válido</div>";
	     f.email.value="";
	     f.email.focus();
         return false;   
	   }
	   else
	   {
		   document.getElementById("div_mail").innerHTML="";
	   }
	     
	   if(f.user.value == 0)
       {
	     document.getElementById("div_user").innerHTML="<div style=\"font-size:13px; color:red\">El campo Usuario está vacío</div>";
         f.user.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_user").innerHTML="";
	   }
	   if(f.clave.value == 0)
       {
	     document.getElementById("div_clave").innerHTML="<div style=\"font-size:13px; color:red\">El campo Clave está vacío</div>";
         f.clave.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_clave").innerHTML="";
	   }
	   f.submit();
   }

function eliminarSubasta(id)
{
   if (confirm("Realmente desea eliminar la subasta?"))
   {
      window.location="eliminarSubasta.php?idSubasta="+id;
   }
}

function sumar_dias(d, fecha) {
	var Fecha = new Date();
	var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
	var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
	var aFecha = sFecha.split(sep);
	var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
	fecha= new Date(fecha);
	fecha.setDate(fecha.getDate()+parseInt(d));
	var anno=fecha.getFullYear();
	var mes= fecha.getMonth()+1;
	var dia= fecha.getDate();
	mes = (mes < 10) ? ("0" + mes) : mes;
	dia = (dia < 10) ? ("0" + dia) : dia;
	var fechaFinal = anno+sep+mes+sep+dia;
	return (fechaFinal);
}

function valida_fecha(fecha) {
	var fec = new Date(Date.parse(fecha.replace(/-/g, "/")));
	var fec_min = sumar_dias(15);
	fec_min = Date.parse(fec_min);
	var fec_max = sumar_dias(30);
	fec_max = Date.parse(fec_max);
	if ((fec >= fec_min) && (fec <= fec_max)) return true;
	else return false;
}

function verificarSubasta() {
	var f = document.subasta;
	var v = true;
	
	/* valida campo nombre */
	if (f.nombre.value == 0) {
		document.getElementById("div_nombre").innerHTML="<div style=\"font-size:13px; color:red\">El campo Nombre está vacío</div>";
		f.nombre.focus();
		v = false;
	}
	else document.getElementById("div_nombre").innerHTML="";
	
	/* valida campo descripcion */
	if (f.descripcion.value == 0) {
		document.getElementById("div_descripcion").innerHTML="<div style=\"font-size:13px; color:red\">El campo Descripción está vacío</div>";
		f.descripcion.focus();
		v = false;
	}
	else document.getElementById("div_descripcion").innerHTML="";
	
	/* valida campo categoria */
	if (f.categoria.value == "0") {
		document.getElementById("div_categoria").innerHTML="<div style=\"font-size:13px; color:red\">Debe seleccionar una categoría, seleccione \"Otros\" si no encuentra la categoría adecuada</div>";
		f.categoria.focus();
		v = false;
	}
	else document.getElementById("div_categoria").innerHTML="";
	
	/* valida campo imagen */
	if ((f.imagen.value == 0) && (f.imagen.getAttribute("modificar") != "true" )) {
		document.getElementById("div_imagen").innerHTML="<div style=\"font-size:13px; color:red\">Debe seleccionar una imagen del producto</div>";
		f.imagen.focus();
		v = false;
	}
	else document.getElementById("div_imagen").innerHTML="";
	
	/* valida fecha y hora */
	if (!valida_fecha(f.fecha_fin.value)) {
		document.getElementById("div_fecha").innerHTML="<div style=\"font-size:13px; color:red\">La fecha de fin debe situarse entre 15 a 30 días a partir de la fecha</div>";
		f.fecha_fin.focus();
		v = false;
	}
	else document.getElementById("div_fecha").innerHTML="";
	if (v) f.submit();
	else return false;
}

function cuenta() {
	document.getElementById("chars").innerHTML = "Caracteres restantes: " + (255 - document.oferta.descripcion.value.length);
}
function cuentaCom() {
	document.getElementById("chars").innerHTML = "Caracteres restantes: " + (255 - document.comentario.texto.value.length);
}

function verificarOferta() {
	var f = document.oferta;
	var v = true;
	
	/* valida campo descripcion */
	if (f.descripcion.value == 0) {
		document.getElementById("div_descripcion").innerHTML="<div style=\"font-size:13px; color:red\">Ingrese un motivo</div>";
		f.descripcion.focus();
		v = false;
	}
	else document.getElementById("div_descripcion").innerHTML="";
	
	/* valida campo monto */
	if ((f.monto.value == 0) || f.monto.value < "0") {
		document.getElementById("div_monto").innerHTML="<div style=\"font-size:13px; color:red\">Ingrese un monto válido</div>";
		f.monto.focus();
		v = false;
	}
	else document.getElementById("div_monto").innerHTML="";
	if (v) f.submit();
	else return false;
}

function verificarGanador() {
	var f = document.ganador;
	opciones = document.getElementsByName("winner");
 
	var seleccionado = false;
	for(var i=0; i<opciones.length; i++) {    
		if(opciones[i].checked) {
			seleccionado = true;
			break;
		}
	}
 
	if(!seleccionado) {
		document.getElementById("div_ganador").innerHTML="<div style=\"font-size:20px; color:red\">&nbsp Seleccione un ganador</div>";
		return false;
	}
	else {
		if (confirm('Una vez que seleccione un ganador no podrá cambiarlo, ¿está seguro de seleccionar ese ganador?')){  
			f.submit();
		}
	}
}

function verificarFechas() {
	var f = document.consulta_ventas;
	var v = true;
	
	var fec_ini = new Date(Date.parse(f.fecha_ini.value.replace(/-/g, "/")));
	var fec_fin = new Date(Date.parse(f.fecha_fin.value.replace(/-/g, "/")));
	
	if (fec_ini > fec_fin) {
		document.getElementById("div_fechas").innerHTML="<div style=\"font-size:13px; color:red\">La fecha de inicio es mayor a la de fin</div>";
		v = false;
	}
	
	if (v) f.submit();
	else return false;
}

window.addEventListener('load',inicio,false);
function inicio(){
     document.getElementById("comentario").addEventListener('submit',verificar,false);
}
	
function verificar(evt){
	 var tex=document.getElementById("texto").value;
	 if (tex.length == 0) {
		document.getElementById("div_comentario").innerHTML="<div style=\"font-size:14px; color:red\">No ha escrito ningún comentario</div>";
		 evt.preventDefault();
	 }	
}
	
function eliminarCuenta(user)
{
   if (confirm("Realmente desea eliminar su cuenta?"))
   {
      window.location="eliminarCuenta.php?usuario="+user;
   }
}