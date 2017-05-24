const formAccion = document.querySelector('#form-accion');

function showModalAccion(dataset) {
  formAccion.action = dataset.action;
  formAccion.dataset.method = dataset.method;
  if (dataset.method == "PUT") {
    formAccion.btnSubmit.textContent = "Guardar";
  } else {
    formAccion.btnSubmit.textContent = "Registrar";
  }
}

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
    console.log(res);
  })
  .catch( err => {
    console.log(err);
  })
});
