const FORM = document.querySelector('#form-accion');

function showModalAccion(dataset) {
  FORM.action = dataset.action;
  FORM.dataset.method = dataset.method;

  if (dataset.method == "PUT") {
    // Editar
    let cells = arrCells(dataset.td);
    let index = selectOption(cells[1].dataset.index);
    FORM.centro_id.selectedIndex = parseInt(index.value);
    // FORM.acronimo.value = cells[2].textContent;
    FORM.descripcion.value = cells[2].textContent;
    FORM.btnSubmit.textContent = "Guardar";
  } else {
    // Crear
    FORM.centro_id.selectedIndex = 0;
    // FORM.acronimo.value = "";
    FORM.descripcion.value = "";
    FORM.btnSubmit.textContent = "Registrar";
  }

}

FORM.addEventListener('submit', function(ev) {
  ev.preventDefault();
  let form = ev.target;
  let datos = "_token="+form._token.value;
  if (form.dataset.method == "PUT") {
    datos += "&_method=PUT";
  }
  datos += "&centro_id="+form.centro_id.value;
  // datos += "&acronimo="+form.acronimo.value;
  datos += "&descripcion="+form.descripcion.value;

  do_send(form.action,"POST",datos)
  .then(JSON.parse)
  .then( res => {
    window.location.reload();
  })
  .catch( err => {
    console.log(err);
  })
});
