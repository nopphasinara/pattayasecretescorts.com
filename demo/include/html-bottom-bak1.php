  <div id="google_translate_element"></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?php echo $siteUrl; ?>assets/js/vendor/popper.min.js"></script>
  <script src="<?php echo $siteUrl; ?>assets/js/vendor/holder.min.js"></script>
  <script src="<?php echo $siteUrl; ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo $siteUrl; ?>assets/js/src/ie10-viewport-bug-workaround.js"></script>
  <script src="<?php echo $siteUrl; ?>assets/js/src/masonry.pkgd.min.js"></script>

  <script type="text/javascript">
  function googleTranslateElementInit() {
    // .goog-te-gadget-simple .goog-te-menu-value span

    var translate = new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'ar,de,en,es,fr,it,ja,ko,ru,zh-TW',
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
      autoDisplay: false,
      multilanguagePage: true
    }, 'google_translate_element');

    // translate.ia.innerText = 'Change Language';
    console.log(translate);
  }
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <script src="http://www.google.com/jsapi?key=AIzaSyA3wfrGIk1Q5h746iwHZsMtcVYNEX9S1Ns"></script>
  <script>
  // Set the original/default language
  var lang = "en";
  var currentClass = "currentLang";

  // Load the language lib
  google.load("language", 1);

  // When the DOM is ready....
  window.addEventListener("domready", function(){
    // Retrieve the DIV to be translated.
    var translateDiv = document.id("e_wrapper");
    // Define a function to switch from the currentlanguage to another
    var callback = function(result) {
      if(result.translation) {
        translateDiv.set("html",result.translation);
      }
    };
    // Add a click listener to update the DIV
    $$(".select-language a").addEvent("click",function(e) {
      // Stop the event
      if(e) e.stop();
      // Get the "to" language
      var toLang = this.get("rel");
      // Set the translation into motion
      google.language.translate(translateDiv.get("html"),lang,toLang,callback);
      // Set the new language
      lang = toLang;
      // Add class to current
      this.getSiblings().removeClass(currentClass);
      this.addClass(currentClass);
    });
  });
  </script>

  <script>
  $( function() {
    $( ".list-profiles .profile" ).on( "mouseenter", function() {
      $( ".box-slide" ).removeClass( "show");
      $(this).find(".box-slide").addClass( "show", 400 );
    }).on( "mouseleave", function() {
      $(this).find(".box-slide").removeClass( "show", 400 );
    } );
  } );
  </script>

  <?php if ($script['recaptcha'] == 'yes') { ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
    function bookingSubmit(token) {
        document.getElementById("form_add").submit();
    }

    function reviewSubmit(token) {
        document.getElementById("form_review").submit();
    }
    </script>
  <?php } ?>

  <script type="text/javascript" src="<?php echo $fullUrl; ?>script/common.js"></script>
  <script type="text/javascript" src="<?php echo $fullUrl; ?>script/jquery.form.js"></script>
  <script type="text/javascript">
    // function scrollToElement(element) {
    //   $('html, body').animate({
    //     scrollTop: $(element).offset().top
    //   }, 320);
    // }

    function isNumberKey(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      if(charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      } else {
        return true;
      }
    }

    function trackEscort(value, data_id) {
      $('.e_escort[data-id="'+data_id+'"] .loading').removeClass('hidden');
      $('.e_escort[data-id="'+data_id+'"] .thumbnail').html('').addClass('hidden');

      $('.e_escort[data-id="'+data_id+'"] .thumbnail').load('<?php echo $fullUrl.$sysLang; ?>/track-escort.html?profile_id='+value+'&target='+data_id+'', function(){
        $('.e_escort[data-id="'+data_id+'"] .loading').addClass('hidden');
        $('.e_escort[data-id="'+data_id+'"] .thumbnail').removeClass('hidden');
      });
    }

    $(document).ready(function(){
      <?php if (strtolower($pageName) == 'booking-form') { ?>
        $('.select_escort').bind('change', function(){
          var value = $(this).val();
          var data_id = $(this).attr('id');

          trackEscort(value, data_id);
        });
        <?php
        if ($array_escort_title) {
          foreach($array_escort_title as $key => $value) {
            $selected_value = (empty($xss[$key])) ? (empty($rxss[$key])) ? '' : $rxss[$key] : $xss[$key];
            if(!empty($selected_value)) {
              ?>trackEscort('<?php echo $selected_value; ?>', '<?php echo $key; ?>');<?php
            }

            ?>$('#<?php echo $key; ?> option[value="<?php echo $selected_value; ?>"]').attr('selected', true);<?php
          }
        }
        ?>
      <?php } ?>

      $('.form_response').on('click', function(){
        $(this).html('').hide();
      });

      var options = {
        target: '.form_response'
        //beforeSubmit: confirmDelete
      };

      $('form').submit(function() {
        var form_id = $(this).attr('id');
        if(form_id == 'form_delete') {
          var check_con = confirmDelete();
          if(check_con) {
            // pass through
          } else {
            return false;
          }
        }

        var use_ajax = $(this).attr('use-ajax');
        if(typeof use_ajax == 'undefined' || use_ajax == '' || use_ajax == 'no') {
          document.getElementById(form_id).submit();
          return false;
        }
        $('.form_response').html('').removeClass('text_red').removeClass('text_green').removeClass('text_hint').addClass('hidden');
        $('.input').removeAttr('style');
        $('.input_response').html('').removeClass('text_red').removeClass('text_green').removeClass('text_hint').addClass('hidden');

        $('#'+form_id+' .form_response').html('Loading information...').removeClass('text_red').removeClass('text_green').addClass('text_hint').removeClass('hidden');

        $('#'+form_id+' .input.required').each(function(){
          var input_name = $(this).attr('name');
          var input_value = $(this).val();
          var false_empty = $(this).attr('false-empty');
          var false_reset = $(this).attr('false-reset');

          if(input_value == '') {
            $(this).attr('style', 'border-color: #e04a31;');
            $('#'+form_id+' .input_response[input-name="'+input_name+'"]').html(false_empty).addClass('text_red').removeClass('hidden');
          }
        });

        $(this).ajaxSubmit(options);

        return false;
      });

      $('.button_submit a[data-type="submit"]').on('click', function(){
        var data_id = $(this).attr('data-id');
        $('#'+data_id+'').submit();
      });

      <?php
        if(isset($_SESSION['form_response']) && !empty($_SESSION['form_response'])) {
          $_SESSION['form_id'] = (empty($_SESSION['form_id'])) ? 'form_default' : $_SESSION['form_id'];
          $_SESSION['response'] = (empty($_SESSION['response'])) ? 'text_red' : $_SESSION['response'];
          ?>
            $('.form_response').removeClass('text_red').removeClass('text_green').removeClass('text_hint').addClass('hidden');
            $('#<?php echo $_SESSION['form_id']; ?> .form_response').html('<?php echo $_SESSION['form_response']; ?>').removeClass('text_red').removeClass('text_green').removeClass('text_hint').addClass('<?php echo $_SESSION['response']; ?>').removeClass('hidden');
          <?php
        }
      ?>
    });
  </script>
  <?php
    if($script['jquery_ui'] == 'yes') {
      ?>
        <link rel="stylesheet" href="<?php echo $fullUrl; ?>jquery-ui/jquery-ui.min.css">
        <script src="<?php echo $fullUrl; ?>jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
            $( ".datepicker" ).on('hover', function(){
              $( ".datepicker" ).datepicker({
                showButtonPanel: false,
                numberOfMonths: 2,
                minDate: '0',
                hideIfNoPrevNext: true,
                duration: '',
                //showOtherMonths: false,
                //selectOtherMonths: false,
                dateFormat: 'yy-mm-dd'
                //changeMonth: false,
                //changeYear: true
              });
            });
          });
        </script>
      <?php
    }

    if($script['fancybox'] == 'yes') {
      ?>
        <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="<?php echo $fullUrl; ?>fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="<?php echo $fullUrl; ?>fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo $fullUrl; ?>fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <link rel="stylesheet" href="<?php echo $fullUrl; ?>fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo $fullUrl; ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo $fullUrl; ?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <link rel="stylesheet" href="<?php echo $fullUrl; ?>fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo $fullUrl; ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

        <script type="text/javascript">
        $(document).ready(function() {
          $(".fancybox").fancybox({
            minHeight: 480,
            // maxHeight: 480,
            padding: 0,
            helpers: {
              overlay: {
                locked: true,
                // css: {
                //   'background' : 'rgba(255, 217, 2, 0.70)'
                // }
              },
              title: {
                type: 'outside'
              },
              // thumbs: {
              //   width: 80,
              //   height: 80
              // }
            }
          });
        });
        </script>
      <?php
    }
  ?>
</body>
</html>
