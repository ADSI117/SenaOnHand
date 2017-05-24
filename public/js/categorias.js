const dialog = document.querySelector('dialog');
const showDialogButton = document.querySelector('.show-dialog');
const formAccion = document.querySelector('#form-accion');
const notification = document.querySelector('.mdl-js-snackbar');


if (! dialog.showModal) {
  dialogPolyfill.registerDialog(dialog);
}

function showModalAccion(dataset) {
  formAccion.action = dataset.action;
  formAccion.dataset.method = dataset.method;
  if (dataset.method == "PUT") {
    formAccion.btnSubmit.textContent = "Guardar";
  } else {
    formAccion.btnSubmit.textContent = "Registrar";
  }
  dialog.showModal();
}

dialog.querySelector('.close').addEventListener('click', function() {
  dialog.close();
});

formAccion.addEventListener('submit', function(ev) {
  ev.preventDefault();
  let form = ev.target;
  let datos = "_token="+form._token.value;
  if (form.dataset.method == "PUT") {
    datos += "&_method=PUT";
  }
  datos += "&descripcion="+form.descripcion.value;

  do_send(form.action,"POST",datos)
  .then(JSON.parse)
  .then( res => {
    notification.MaterialSnackbar.showSnackbar({
        message: res.mensaje
    });
    console.log(res);
  })
  .catch( err => {
    notification.MaterialSnackbar.showSnackbar({
        message: err.mensaje
    });
    console.log(err);
  })
});
