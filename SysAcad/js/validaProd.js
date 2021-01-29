function ValidaProducto(event){

  if(
    this.valnom(event) == false ||
     this.valpre(event) == false ||
     this.valima(event) == false ||
     this.valiela(event) == false ||
     this.valiven(event) == false /*||
     this.valiestado(event) == false*/)
     {
    event.preventDefault();
  }else{
    alert('Se ha guardado correctamente el nuevo producto')
    this.submit();
  }
}
function valnom(){
  var nombreProd = document.getElementById('nombreProd').value;
  if(nombreProd == null || nombreProd.length == 0){
    document.getElementById('nombreProd_help').style.color = "red";
    document.getElementById('nombreProd').focus();
    alert("Debe ingresar el nombre del producto");
    return false;
  }else if (nombreProd.length < 3) {
    document.getElementById('nombreProd_help').style.color = "red";
    document.getElementById('nombreProd').focus();
    alert("El nombre del producto debe de tener mas de 3 caracteres");
    return false;
  }
  document.getElementById('nombreProd_help').style.color = "gray";
}


function valpre(){
  var precio = document.getElementById('precio').value;
  if(precio == null || precio.length == 0){
    document.getElementById('precio_help').style.color = "red";
    document.getElementById('precio').focus();
    alert("Debe ingresar el precio del producto");
    return false;
  }
  document.getElementById('nombreProd_help').style.color = "gray";
}






function valima(){
    var fileInput = document.getElementById('input-b1');
    var filePath = fileInput.value;
    var extension = /(.jpg|.jpeg|.png|)$/i;
    if(!extension.exec(filePath)){
        alert('La imagen tiene que ser .jpeg/.jpg/.png');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img width="100" height="150" src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}


function ValidarImagen(obj){
var uploadFile = obj.files[0];

if (!window.FileReader) {
alert('El navegador no soporta la lectura de archivos');
return;
}

if (!(/\.(jpg|png|jpeg)$/i).test(uploadFile.name)) {
alert('El archivo a adjuntar no es una imagen');
}
else {
var img = new Image();
img.onload = function () {
    /*if (this.width.toFixed(0) != 200 && this.height.toFixed(0) != 200) {
        alert('Las medidas deben ser: 200 * 200');
    }
    else */ if (uploadFile.size > 20000)
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


function valiela(){
  var elaboracion = document.getElementById('elaboracion').value;
  if( elaboracion == null || elaboracion.length == ""){
    document.getElementById('elaboracion_help').style.color = "red";
    document.getElementById('elaboracion').focus();
    alert("Debe ingresar la fecha de elaboracion");
    return false;
  }
  document.getElementById('elaboracion_help').style.color = "gray";

}


function valiven(){
  var vencimiento = document.getElementById('vencimiento').value;
  if( vencimiento == null || vencimiento.length == ""){
    document.getElementById('vencimiento_help').style.color = "red";
    document.getElementById('vencimiento').focus();
    alert("Debe ingresar la fecha de vencimiento");
    return false;
  }
  document.getElementById('vencimiento_help').style.color = "gray";
}
/*

function valiestado(){

  if(!document.getElementById('estado').checked){
    document.getElementById('estado_help').style.color = "red";
    document.getElementById('estado').focus();
    alert("Debe seleccionar el estado");
    return false;
  }
}

*/
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
    document.getElementById('formProd').addEventListener('submit', function(event) {
      ValidaProducto(event);
    });

  }

  document.addEventListener('DOMContentLoaded', iniciar)
