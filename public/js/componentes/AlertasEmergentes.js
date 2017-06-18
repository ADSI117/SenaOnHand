
function avisoSuccess(message) {
  animacion(message, "success", "<i class='fa fa-check'></i>");
}

function avisoWarning(message) {
  animacion(message, "warning", "<i class='fa fa-exclamation-triangle'></i>");
}

function avisoError(message) {
  animacion(message, "danger", "<i class='fa fa-exclamation'></i>");
}

function avisoInfo(message) {
  animacion(message, "info", "<i class='fa fa-info'></i>");
}

function animacion(mensaje, tipo, icon) {
  let aviso = document.querySelector('#ManejadorDeAvisos');
  aviso.classList.add('alert-' + tipo);
  aviso.classList.add('slideInDown');
  aviso.innerHTML = icon + " " + mensaje;
  setTimeout(function() {
    aviso.classList.add('slideOutUp');
  }, 5000);
  setTimeout(function() {
    aviso.classList.remove('alert-' + tipo);
    aviso.classList.remove('slideInDown');
    aviso.classList.remove('slideOutUp');
    aviso.innerHTML = "";
  }, 6000);
}

// avisoWarning("<strong>Well done!</strong> You successfully read this important alert message.")
