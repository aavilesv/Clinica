function validarCampos(event) {

  if (this.validaUsuario(event) == false ||
    this.validaNombre(event) == false ||
    this.validaApellido(event) == false ||
    this.validaRol(event) == false ||
    this.validarPassword(event) == false){
    event.preventDefault(); // Detiene el enviar el formulario
  } else {
    this.submit(); // En coso de todo estar correcto, envia el formulario
  }
}

function validaUsuario() {
  var usuario = document.getElementById('usuario').value;
  if (usuario == null || usuario.length == 0 || /^\s+$/.test(usuario)) {
    // document.getElementById('apellido_help').style.color = "red";
    // document.getElementById('apellido').focus();
    alert("Debe ingresar un usuario, el campo es requerido!");
    return false;
  }
}

function validaRol() {
  var usuario = document.getElementById('especialidad').value;
  if (usuario == null || usuario.length == 0 || /^\s+$/.test(usuario)) {
    // document.getElementById('apellido_help').style.color = "red";
    // document.getElementById('apellido').focus();
    alert("Debe ingresar una especialidad, el campo es requerido!");
    return false;
  }
}

function validaNombre() {
  var nombre = document.getElementById('nombre').value;
  if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
    // document.getElementById('apellido_help').style.color = "red";
    // document.getElementById('apellido').focus();
    alert("Debe ingresar su nombre, el campo es requerido!");
    return false;
  }
}

function validaApellido() {
  var nombre = document.getElementById('apellido').value;
  if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
    // document.getElementById('apellido_help').style.color = "red";
    // document.getElementById('apellido').focus();
    alert("Debe ingresar su apellido, el campo es requerido!");
    return false;
  }
}

function validarPassword() {
  var clave1 = document.getElementById('password1').value;
  var clave2 = document.getElementById('password2').value;
  if (!((clave1 == null || clave1.length == 0 || /^\s+$/.test(clave1)) && (clave2 == null || clave2.length == 0 || /^\s+$/.test(clave2)))) {
    if(clave1 != clave2){
      alert("Las contraseñas no coinciden!");
      return false;
    }
  }else{
    alert("Debe ingresar una contraseña!");
    return false;
  }

}

function inicializar() {
  document.getElementById('frmregister').addEventListener('submit', function(event) {validarCampos(event)});
}
document.addEventListener('DOMContentLoaded', inicializar);
