const formAccion = document.querySelector('#form-accion');

function showModalAccion(dataset) {

  formAccion.action = dataset.action;
  formAccion.dataset.method = dataset.method;

  if (dataset.method == "PUT") {
    let cells = arrCells(dataset.td);
    let item = selectOption(cells[1].dataset.index);
    formAccion.categoria_id.selectedIndex = item.index;
    formAccion.descripcion.value = cells[2].textContent;
    formAccion.btnSubmit.textContent = "Guardar";
  } else {
    formAccion.categoria_id.selectedIndex = 0;
    formAccion.descripcion.value = "";
    formAccion.btnSubmit.textContent = "Registrar";
  }

}

formAccion.addEventListener('submit', (ev) => {
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



function selectOption(value) {
  return document.querySelector('option[value="' + value + '"]');
}
