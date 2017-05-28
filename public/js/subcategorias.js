const FORM = document.querySelector('#form-accion');

function showModalAccion(dataset) {

  FORM.action = dataset.action;
  FORM.dataset.method = dataset.method;

  if (dataset.method == "PUT") {
    let cells = arrCells(dataset.td);
    let item = selectOption(cells[1].dataset.index);
    FORM.categoria_id.selectedIndex = item.index;
    FORM.descripcion.value = cells[2].textContent;
    FORM.btnSubmit.textContent = "Guardar";
  } else {
    FORM.categoria_id.selectedIndex = 0;
    FORM.descripcion.value = "";
    FORM.btnSubmit.textContent = "Registrar";
  }

}

FORM.addEventListener('submit', (ev) => {
  ev.preventDefault();
  // Selecciona el formulario
  let form = ev.target;
  let request =`_token=${form._token.value}`;
  if (form.dataset.method == "PUT") {
    request += `&_method=PUT`;
  }
  request += `&categoria_id=${form.categoria_id.value}&descripcion=${form.descripcion.value}`;// ECSC6

  do_send(form.action, "POST", request)
  .then(JSON.parse)
  .then( response => {
    window.location.reload();
  })
  .catch( err => {
    console.log(err);
  });


});
