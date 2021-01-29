
function valCedula(cedula) {
    var cad = document.getElementById("Cedula").value.trim();
    var total = 0;
    var longitud = cad.length;
    var longcheck = longitud - 1;
    if (cad !== "" && longitud === 10) {
        for (i = 0; i < longcheck; i++) {
            if (i % 2 === 0) {
                var aux = cad.charAt(i) * 2;
                if (aux > 9)
                    aux -= 9;
                total += aux;
            } else {
                total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
        }
        total = total % 10 ? 10 - total % 10 : 0;
        if (cad.charAt(longitud - 1) == total) {
            return false;
        } else {
            $("#cedula").val("");
            $('#cedula').focus();
            swal("La cedula !! " + cedula + " !! es incorrecta");
            document.getElementById('cedula').focus();
            return false;
        }
    }
}

var email = document.getElementById('email');
function validarEmail(email) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(email)) {
        $("#email").val("");
        $('#email').focus();
        swal("La dirección de correo !! " + email + " !! es incorrecta.");
    }
}

var web = document.getElementById('web');
function validarWeb(web) {
    expr = /^www.\w+.\w+$/gi;
    if (!expr.test(web)) {
        $("#web").val("");
        $('#web').focus();
        swal("La dirección web !! " + web + " !! es incorrecta.");
    }
}

function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}

function soloNumeros1(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    letras = "1234567890,";
    teclado_especial = false;
    if (letras.indexOf(teclado) == -1 && !teclado_especial)
    {
        return false;
    }
}

function sololetras(e) {
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8)
        return true; // 3
    patron = /[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function soloSangre(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    letras = "ABOabo+-";
    teclado_especial = false;
    if (letras.indexOf(teclado) == -1 && !teclado_especial)
    {
        return false;
    }
}



function isValidDate(day, month, year)
{    var dteDate;
    month = month - 1;
    dteDate = new Date(year, month, day);
    return ((day == dteDate.getDate()) && (month == dteDate.getMonth()) && (year == dteDate.getFullYear()));
}

function validate_fecha(fecha)
{
    var patron = new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
    if (fecha.search(patron) == 0)
    {
        var values = fecha.split("-");
        if (isValidDate(values[2], values[1], values[0]))
        {
            return true;
        }
    }
    return false;
}


function calcularEdad()
{
    var fecha = document.getElementById("user_date").value;
    if (validate_fecha(fecha) == true)
    {
        // Si la fecha es correcta, calculamos la edad
        var values = fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];

        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth() + 1;
        var ahora_dia = fecha_hoy.getDate();

        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if (ahora_mes < mes)
        {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia))
        {
            edad--;
        }
        if (edad > 1900)
        {
            edad -= 1900;
        }

        // calculamos los meses
        var meses = 0;
        if (ahora_mes > mes)
            meses = ahora_mes - mes;
        if (ahora_mes < mes)
            meses = 12 - (mes - ahora_mes);
        if (ahora_mes == mes && dia > ahora_dia)
            meses = 11;

        // calculamos los dias
        var dias = 0;
        if (ahora_dia > dia)
            dias = ahora_dia - dia;
        if (ahora_dia < dia)
        {
            ultimoDiaMes = new Date(ahora_ano, ahora_mes, 0);
            dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
        }


        document.getElementById("pac_Edad").value = edad;
        document.getElementById("pac_Edad1").value = edad;
    } else {
        document.getElementById("pac_Edad").value = "No Selecciono Fecha";
        document.getElementById("pac_Edad1").value = "No Selecciono Fecha";
    }
}
