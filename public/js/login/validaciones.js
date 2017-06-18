// console.log("Hi!");
document.querySelector('#btn-enviar').addEventListener('click', ev => {
    ev.preventDefault();
    let Data = {
        "email": document.querySelector('#email').value,
        "name": document.querySelector('#name').value,
        "pass": document.querySelector('#password').value,
        "repass": document.querySelector('#password-confirm').value,
        "token": document.formulario._token.value
    }
    let esDominioCorrecto = null;
    let Validacion = true;
    let Mensaje = "";

    console.log(Data.token);

    if ( esValidoElCampo(Data.name) ) {
        Mensaje = "Campo nombre es invalida";
        Validacion = false;
    } else
    if ( esValidoElCampo(Data.email) ) {
        Mensaje = "Campo correo es invalida";
        Validacion = false;
    } else
    if ( esValidoElCampo(Data.pass) ) {
        Mensaje = "contraseña invalida";
        Validacion = false;
    } else
    if ( ( Data.pass != Data.repass ) ) {
        Mensaje = "contraseñas deben coincidir";
        Validacion = false;
    }
    if (Validacion) {
        esDominioCorrecto = validarDominio(Data.email.split("@")[1])
        if (esDominioCorrecto) {
            enviarFormulario(Data);
        } else {
            avisoWarning("Dominio de email invalido deben ser <b>sena.edu.co</b> ó <b>misena.edu.co</b>");
        }
    } else {
        avisoWarning(Mensaje);
    }
})

function validarDominio(dominio) {
    let resp = false;
    switch (dominio.toLowerCase()) {
        case "sena.edu.co":
            resp = true;
        break;
        case "misena.edu.co":
            resp = true;
        break;
        default:
            resp = false;
    }
    return resp;
}

function esValidoElCampo(valor) {
    let resp = false;
    if (valor.trim() == "") {
        resp = true;
    }
    return resp;
}

function enviarFormulario(parm) {
    request = "_token=" + parm.token
            + "&email=" + parm.email
            + "&name=" + parm.name
            + "&password=" + parm.pass
            + "&password-confirm=" + parm.repass;
   do_send(document.formulario.action, "POST", request)
   //.then(JSON.parse)
   .then(respuesta => {
        avisoSuccess("Todo salio existoso");
        console.log(respuesta);
   })
   .catch(err => {
       avisoError(err);
   })
}
