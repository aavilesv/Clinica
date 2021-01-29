function ValidaProveedor(event){

  if(
    this.valruc(event) == false ||
     this.valrs(event) == false ||
     this.valtl(event) == false ||
     this.valima(event) == false ||
     this.valemail(event) == false ||
     this.valdir(event) == false)
     {
    event.preventDefault();
  }else{
    alert('Se ha guardado correctamente el nuevo Proveedor');
    this.submit();
  }
}

function valruc(){
  var number = document.getElementById('ruc').value;
  var dto = number.length;
  var valor;
  var acu=0;
  if(number==""){
   alert('Debe ingresar el RUC');
   document.getElementById('ruc_help').style.color = "red";
   return false;
   }
  else{
   for (var i=0; i<dto; i++){
   valor = number.substring(i,i+1);
   if(valor==0||valor==1||valor==2||valor==3||valor==4||valor==5||valor==6||valor==7||valor==8||valor==9){
    acu = acu+1;
   }
   }
   if(acu==dto){
    while(number.substring(10,13)!=001){
     alert('Los tres últimos dígitos no tienen el código del RUC 001.');
     document.getElementById('ruc_help').style.color = "red";
     return false;
    }
    while(number.substring(0,2)>24){
     alert('Los dos primeros dígitos no pueden ser mayores a 24.');
     document.getElementById('ruc_help').style.color = "red";
     return false;
    }
    alert('El RUC está escrito correctamente');
    alert('Se procederá a analizar el respectivo RUC.');
    document.getElementById('ruc_help').style.color = "gray";
    var porcion1 = number.substring(2,3);
    if(porcion1<6){
     alert('El tercer dígito es menor a 6, por lo \ntanto el usuario es una persona natural.\n');
    }
    else{
     if(porcion1==6){
      alert('El tercer dígito es igual a 6, por lo \ntanto el usuario es una entidad pública.\n');
     }
     else{
      if(porcion1==9){
       alert('El tercer dígito es igual a 9, por lo \ntanto el usuario es una sociedad privada.\n');
      }
     }
    }
   }
  }
 }

function valrs(){
  var razonSocial = document.getElementById('razonSocial').value;
  if(razonSocial == null || razonSocial.length == 0){
    document.getElementById('razonSocial_help').style.color = "red";
    document.getElementById('razonSocial').focus();
    alert("Debe ingresar el nombre");
    return false;
  }else if (razonSocial.length < 3 ) {
    document.getElementById('razonSocial_help').style.color = "red";
    document.getElementById('razonSocial').focus();
    alert("La razonSocial debe ser mayor a 3 caracteres");
  }
  document.getElementById('razonSocial_help').style.color = "gray";
}

function valtl(){
  var telefono = document.getElementById('telefono').value;
  if(telefono == null || telefono.length == 0){
    document.getElementById('telefono').focus();
    document.getElementById('telefono_help').style.color = "red";
    document.getElementById('telefono').focus();
    alert("Debe ingresar el telefono");
    return false;
  }else if (telefono.length < 10) {
    document.getElementById('telefono_help').style.color = "red";
    document.getElementById('telefono').focus();
    alert("El telefono debe ser 10 digitos");
    return false;
  }
  document.getElementById('telefono_help').style.color = "gray";
}

function valima(){
    var fileInput = document.getElementById('input-b1').value;
    var filePath = fileInput.value;
    var extension = /(.jpg|.jpeg|.png|)$/i;





    if(fileInput == null || fileInput == ''){
      document.getElementById('imagen').focus();
      document.getElementById('imagen_help').style.color = "red";
      alert('Tiene que insertar una imagen');
      return false;
    }/*
    else if (!extension.exec(filePath)){
        alert('La imagen tiene que ser .jpeg/.jpg/.png');
        fileInput.value = '';
        return false;
    }
    else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img width="100" height="150" src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }*/
}


function ValidarImagen(obj){
var uploadFile = obj.files[0];

if (!window.FileReader) {
alert('El navegador no soporta la lectura de archivos');
return;
}
if(document.form2.imagen.value == ''){
  document.getElementById('imagen').focus();
  document.getElementById('imagen_help').style.color = "red";
  alert('Tiene que insertar una imagen');
  return false;
}
else if (!(/\.(jpg|png|jpeg)$/i).test(uploadFile.name)) {
alert('El archivo a adjuntar no es una imagen');
return false;
}
else{
var img = new Image();
img.onload = function () {
  /*  if (this.width.toFixed(0) != 200 && this.height.toFixed(0) != 200) {
        alert('Las medidas deben ser: 200 * 200');
    }
    else */if (uploadFile.size > 20000)
    {
        alert('El peso de la imagen no puede exceder los 200kb')
    }
    else {
        alert('Imagen correcta :)')
    }
};
img.src = URL.createObjectURL(uploadFile);
}
}

function valemail(){
    var email = document.getElementById('email').value;
    if(email == null || email.length < 3){
    document.getElementById('email_help').style.color = "red";
    document.getElementById('email').focus();
    alert("Debe ingresar la email");
    return false;
    }
    document.getElementById('email_help').style.color = "gray";
}

function valdir(){
  var direccion = document.getElementById('direccion').value;
  if(direccion == null || direccion.length == 0){
    document.getElementById('direccion_help').style.color = "red";
    document.getElementById('direccion').focus();
    alert("Debe ingresar la direccion");
    return false;
  }else if (direccion.length < 3) {
    document.getElementById('direccion_help').style.color = "red";
    document.getElementById('direccion').focus();
    alert("La direccion debe de tener mas de 3 caracteres");
    return false;
  }
  document.getElementById('direccion_help').style.color = "gray";
}


function validanum(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


function validaletras(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8 || tecla==32){
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[a-z-A-Z]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validaprecio(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8 || tecla==46){
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function check()
  {
     if (document.form2.imagen.value == '')
        {
         alert('Field must be filled');
        }

  }



function iniciar() {
    document.getElementById('formProv').addEventListener('submit', function(event) {
      ValidaProveedor(event);
    });

  }

  document.addEventListener('DOMContentLoaded', iniciar)
