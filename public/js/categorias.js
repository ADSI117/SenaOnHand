const FORM = document.querySelector('#form-accion');

function showModalAccion(dataset) {
  FORM.action = dataset.action;
  FORM.dataset.method = dataset.method;

  if (dataset.method == "PUT") {
    let cells = arrCells(dataset.td);
    FORM.nombre.value = cells[1].textContent;
    FORM.descripcion.value = cells[1].textContent;
    FORM.btnSubmit.textContent = "Guardar";
  } else {
    FORM.nombre.value = "";
    FORM.descripcion.value = "";
    FORM.btnSubmit.textContent = "Registrar";
  }

}

FORM.addEventListener('submit', function(ev) {
  // ev.preventDefault();
  let form = ev.target;
  let datos = "_token="+form._token.value;
  if (form.dataset.method == "PUT") {
    datos += "&_method=PUT";
  }
  datos += "&descripcion="+form.descripcion.value+"&nombre="+form.nombre.value+"&url_imagen="+form.url_imagen.value;

  do_send(form.action,"POST",datos)
  .then(JSON.parse)
  .then( res => {
    window.location.reload();
  })
  .catch( err => {
    console.log(err);
  })
});
