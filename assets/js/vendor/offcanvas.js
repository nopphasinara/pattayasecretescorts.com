$(document).ready(function () {
  $('[data-toggle="offcanvas"]').on('click', function () {
    var canvas_target = $(this).attr('data-target');
    if (typeof canvas_target != 'undefined' && canvas_target != '') {
      $(''+ canvas_target +'').toggleClass('open');
    }
  });
});
