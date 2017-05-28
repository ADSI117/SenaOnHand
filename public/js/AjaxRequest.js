function do_send(_url, _method, _request) {
  return new Promise(function(done, reject) {
    // Configurar envio
    let req = new XMLHttpRequest();
    req.open(_method, _url, true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Mientras la conexión exista y termine en 200
    req.onload = () => {
      if (req.status === 200) {
        // En caso de exito
        done(req.responseText)
      } else {
        // En caso de error
        reject(new Error(req.responseText));
      }
    }
    // Si de repente se rompe la conexión || o no se puede conectar
    req.onerror = () => {
      reject(new Error("Error en la conexion"))
    }
    // Se envia la peticion Asyncrona
    req.send(_request)
  });
}

function arrCells(data) {
  return document.querySelector('[data-tr="' + data + '"]').cells;
}

function selectOption(value) {
  return document.querySelector('option[value="' + value + '"]');
}
