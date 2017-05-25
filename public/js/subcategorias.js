const formAccion = document.querySelector('#form-accion');

function showModalAccion(dataset) {
  let scat = datasetElement('[data-scato="td-' + dataset.scati + '"]');

  formAccion.action = dataset.action;
  formAccion.dataset.method = dataset.method;

  if (dataset.method == "PUT") {
    //console.log(cat, scat);
    formAccion.categoria_id.selectedIndex = parseInt(dataset.cati);
    formAccion.descripcion.value = scat.textContent;

    formAccion.btnSubmit.textContent = "Guardar";
  } else {
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
    console.log(response);
  })
  .catch( err => {
    console.log(err);
  });


});



function datasetElement(data) {
  return document.querySelector(data);
}
