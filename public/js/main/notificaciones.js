(function () {
  $('a[data-rol="noleido"]').click(function (ev) {
    $(this).next().submit();
    ev.preventDefault();
  })

  $('a[data-rol="leido"]').click(function (ev) {
    $(this).next().submit();
    ev.preventDefault();
  })
})()
