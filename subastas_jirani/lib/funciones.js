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

function verificarSubasta() {
	
}