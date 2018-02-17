var fn = {
  viewport: {
    isMobile: false,
    currentDevice: '',
    device: {
      xs: false,
      sm: false,
      md: false,
      lg: false,
    },
    deviceName: {
      xs: 'device-mobile',
      sm: 'device-tablet',
      md: 'device-desktop',
      lg: 'device-large',
    }
  },
  error: {
    title: {
      'log': "Log Messages",
      'error': "Unexpected Error",
      'warning': "Warning Messages",
      'info': "Info Messages",
    },
  },
  updateProgress: function () {
    var progress_bar = jQuery('#progress');
    var percentage = progress_bar.find('.percentage');
    console.log(progress_bar);
    console.log(percentage);
  },
  modalPanel: function(modal) {
    if (fn.isUndefined(modal) || fn.isEmpty(modal)) {
      return jQuery('#modal-log');
    }

    var modalPanel = jQuery(modal);
    if (fn.isUndefined(modalPanel)) {
      alert("Undefined modal panel");
      return;
    }

    return modalPanel;
  },
  isUndefined: function (argv) {
    if (typeof argv == 'undefined') {
      return true;
    }

    if (typeof argv == 'object' && fn.isEmpty(argv.length)) {
      return true;
    }

    return false;
  },
  isEmpty: function (argv) {
    if (fn.isUndefined(argv)) {
      return true;
    } else if (!argv || argv == '' || argv == '') {
      return true;
    } else {
      if (typeof argv == 'object' && Object.keys(argv).length == 0) {
        return true;
      }
    }

    return false;
  },
  getBody: function() {
    return jQuery('body');
  },
  getViewport: function() {
    return jQuery('#viewport');
  },
  getCurrentDevice: function() {
    var old_device = fn.viewport.currentDevice;

    for (var i = 0; i < Object.keys(fn.viewport.device).length; i++) {
      var key = Object.keys(fn.viewport.device)[i];
      var device = fn.getViewport().find('.'+ key +'');

      if (device.is(':visible')) {
        fn.viewport.currentDevice = fn.viewport.deviceName[key];
      }
    }

    fn.getBody().removeClass('mobile');
    fn.getBody().removeClass(old_device);
    fn.getBody().addClass(fn.viewport.currentDevice);

    fn.viewport.isMobile = false;
    if (fn.viewport.currentDevice == fn.viewport.deviceName['xs'] || fn.viewport.currentDevice == fn.viewport.deviceName['sm']) {
      fn.viewport.isMobile = true;
      fn.getBody().addClass('mobile');
    }
  },
  showLog: function(message = '', title = 'log') {
    var modalTitle = fn.modalPanel().find('.modal-title');
    var modalBody = fn.modalPanel().find('.modal-body');

    if (fn.isEmpty(title) || fn.isEmpty(fn.error.title[title])) {
      title = 'log';
    }
    title = fn.error.title[title];

    modalTitle.text(title);
    modalBody.text(message);

    fn.modalPanel().modal({
      show: true,
    });
  },
};


jQuery(document).ready(function() {
  fn.getCurrentDevice();

  jQuery('.modal').on('shown.bs.modal', function() {
    jQuery('.modal').focus();
  });
});

jQuery(window).on('resize', function(e) {
  fn.getCurrentDevice();
});


var default_width = 980;
var _w = $(window);

$(document).ready(function(){
  $('.box-search .show_anvance').on('click', function(){
    $('#advance_option').slideToggle('fast');
    $('.box-search input[type="checkbox"]').each(function(){
      //$(this).attr('checked', false);
    });
  });

  $('.select_page').on('change', function(){
		var data_link = $(this).attr('data-link');
		var data_value = $(this).val();
		window.location = data_link+'&page='+data_value;
	});

  /* Menu */
  $('#e_menu > .content_res ._button').on('click', function() {
    $('#e_menu > .content_res .inline').toggle();

    if($('#e_menu > .content_res .inline').hasClass('toggle') === true) {
      $('#e_menu > .content_res .inline').removeClass('toggle').removeAttr('style');
    } else {
      $('#e_menu > .content_res .inline').addClass('toggle');
    }
  });

  $('#e_menu > .content_res ._button a').html('<div class="label">'+ $('#e_menu > .content_res ._button a').html() +'</div>');
  $('#e_menu > .content_res ._button a').prepend('<div class="_hmb"><div class="bar"><div class="a"></div><div class="b"></div><div class="c"></div></div></div>');

  $('#e_content').after('<div class="_left sidebar"></div>');
  // $('._left').html(''+ $('#e_left').html() +'');

  $('#e_top > .content_res').append('<div class="_language d-none">'+ $('#e_top .language').html() +'</div>');

});

$(window).on('resize', function() {

});
