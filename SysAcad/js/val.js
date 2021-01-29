function validarCampos(event) {

  if (this.validaUsuario(event) == false ||
    this.validarPassword(event) == false){
    event.preventDefault(); // Detiene el enviar el formulario
  } else {
    this.submit(); // En coso de todo estar correcto, envia el formulario
  }
}

function validaUsuario() {
  var usuario = document.getElementById('usuario').value;
  if (usuario == null || usuario.length == 0 || /^\s+$/.test(usuario)) {
    document.getElementById('usuario_help').style.color = "red";
    document.getElementById('usuario').focus();
    return false;
  }
}


function validarPassword() {
  var clave1 = document.getElementById('password1').value;
  if (clave1 == null || usuario.length == 0 || /^\s+$/.test(clave1)) {
     document.getElementById('password_help').style.color = "red";
     document.getElementById('password').focus();
    alert("Debe ingresar un usuario, el campo es requerido!");
    return false;
  }

}

function inicializar() {
  document.getElementById('formLg').addEventListener('submit', function(event) {validarCampos(event)});
}
document.addEventListener('DOMContentLoaded', inicializar);
