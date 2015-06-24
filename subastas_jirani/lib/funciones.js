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
	     document.getElementById("div_name").innerHTML="<font size=3 color='#FF0000'>El campo Nombre está vacío</font>";
         f.nombre.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_name").innerHTML="";
	   }
	   
	   if(!valida_cadena(f.nombre.value))
	   {
	   
	     document.getElementById("div_name").innerHTML="<font size=3 color='#FF0000'>Por favor ingrese solo letras para su nombre</font>";
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
	     document.getElementById("div_apellido").innerHTML="<font size=3 color='#FF0000'>El campo Apellido está vacío</font>";
         f.apellido.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_apellido").innerHTML="";
	   }
	   
	   if(!valida_cadena(f.apellido.value))
	   {	   
	     document.getElementById("div_apellido").innerHTML="<font size=3 color='#FF0000'>Por favor ingrese solo letras para su apellido</font>";
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
	     document.getElementById("div_mail").innerHTML="<font size=3 color='#FF0000'>Por favor ingrese su E-mail</font>";
         f.email.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_mail").innerHTML="";
	   }
	   if(!valida_correo(f.email.value))
	   {
	     document.getElementById("div_mail").innerHTML="<font size=3 color='#FF0000'>Por favor ingrese un correo válido</font>";
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
	     document.getElementById("div_user").innerHTML="<font size=3 color='#FF0000'>El campo Usuario está vacío</font>";
         f.user.focus();
         return false;
       }
	   else
	   {
		   document.getElementById("div_user").innerHTML="";
	   }
	   if(f.clave.value == 0)
       {
	     document.getElementById("div_clave").innerHTML="<font size=3 color='#FF0000'>El campo Clave está vacío</font>";
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
		document.getElementById("div_nombre").innerHTML="<font size=3 color='#FF0000'>El campo Nombre está vacío</font>";
		f.nombre.focus();
		v = false;
	}
	else document.getElementById("div_nombre").innerHTML="";
	
	/* valida campo descripcion */
	if (f.descripcion.value == 0) {
		document.getElementById("div_descripcion").innerHTML="<font size=3 color='#FF0000'>El campo Descripción está vacío</font>";
		f.descripcion.focus();
		v = false;
	}
	else document.getElementById("div_descripcion").innerHTML="";
	
	/* valida campo categoria */
	if (f.categoria.value == "0") {
		document.getElementById("div_categoria").innerHTML="<font size=3 color='#FF0000'>Debe seleccionar una categoría, seleccione \"Otros\" si no encuentra la categoría adecuada</font>";
		f.categoria.focus();
		v = false;
	}
	else document.getElementById("div_categoria").innerHTML="";
	
	/* valida campo imagen */
	if (f.imagen.value == 0) {
		document.getElementById("div_imagen").innerHTML="<font size=3 color='#FF0000'>Debe seleccionar una imagen del producto</font>";
		f.imagen.focus();
		v = false;
	}
	else document.getElementById("div_imagen").innerHTML="";
	
	/* valida fecha y hora */
	if (!valida_fecha(f.fecha_fin.value)) {
		document.getElementById("div_fecha").innerHTML="<font size=3 color='#FF0000'>La fecha de fin debe situarse entre 15 a 30 días a partir de la fecha</font>";
		f.fecha_fin.focus();
		v = false;
	}
	else document.getElementById("div_fecha").innerHTML="";
	if (v) f.submit();
	else return false;
}






