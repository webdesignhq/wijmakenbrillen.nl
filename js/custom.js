$().ready(()=> {
    console.log('ready');

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.slider-nav'
      });
    $('.slider-nav').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        infinite: true,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed: 3000,
      });

      $('.slick-next').html('<i class="fa-solid fa-chevron-right"></i>');
      $('.slick-prev').html('<i class="fa-solid fa-chevron-left"></i>');


    $(".clickable").click(function(e) {
        e.preventDefault();
        window.location = $(this).find('a').attr('href');
    });

    $(".menu-toggle").click(function(e) {
        $(".mobile__menu__overlay--container").css('left', '0');
    });

    $(".menu-close").click(function(e) {
        $(".mobile__menu__overlay--container").css('left', '-100%');
    });

    // $("#dgwt-wcas-search-input-1").focus(function(e) {
    //     $(".dgwt-wcas-ico-magnifier").css('opacity', '0!important');
    // });

    var timeout;

    $( function( $ ) {
        $('.woocommerce').on('change', 'input.qty', function(){
            $("[name='update_cart']").prop("disabled", false);
            if ( timeout !== undefined ) {
                clearTimeout( timeout );
            }

            timeout = setTimeout(function() {
                $("[name='update_cart']").trigger("click");
            }, 750 ); // 1 second delay, half a second (500) seems comfortable too

        });
    } );

    $('#filter').submit(function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Filter toepassen'); // changing the button label back
				$('#response').html(data); // insert data
			}
		});
		return false;
	});
	
	// Set constraints for the video stream
	var constraints = { video: { facingMode: "user" }, audio: false };// Define constants
	const cameraView = document.querySelector("#camera--view"),
		cameraOutput = document.querySelector("#camera--output"),
		cameraSensor = document.querySelector("#camera--sensor"),
		cameraTrigger = document.querySelector("#camera--trigger")// Access the device camera and stream to cameraView
	function cameraStart() {
		navigator.mediaDevices
			.getUserMedia(constraints)
			.then(function(stream) {
			track = stream.getTracks()[0];
			cameraView.srcObject = stream;
		})
		.catch(function(error) {
			console.error("Oops. Something is broken.", error);
		});
	}// Take a picture when cameraTrigger is tapped
	cameraTrigger.onclick = function() {
		cameraSensor.width = cameraView.videoWidth;
		cameraSensor.height = cameraView.videoHeight;
		cameraSensor.getContext("2d").drawImage(cameraView, 0, 0);
		cameraOutput.src = cameraSensor.toDataURL("image/webp");
		cameraOutput.classList.add("taken");
	};// Start the video stream when the window loads
	window.addEventListener("load", cameraStart, false);


});
	$('.product-color').click(function(){
		let color = $(this).attr("data-name");
		$('.product-color').removeClass('active');
		$(this).addClass('active');
		console.log(color);
		$("#pa_kleur").val(color).change();
	});


	 // Display variations on digital fitting room
   function showVariations(name) {
      $("div").find(`[data-modelgroup]`).hide();
      $("div").find(`[data-modelgroup='${name}']`).show();
   }

   function showGlasses(glasses) {
      var decoded = JSON.parse(glasses);
      $(".glass-colors").hide();
      decoded.forEach(function(glass) {
         $(`.glass-colors[data-id='${glass}']`).show();
      });
   }

   function getModel(model) {
      var modelTitle = $(model).attr("data-title");
      var modelColor = $(model).attr("data-color");
      var modelImage = $(model).attr("src");
  	  var modelGlasses = $(model).attr("data-glasses");
      document.getElementById("previewtext").innerHTML = "<h5>(Gekozen model: " + modelTitle + " - " + modelColor + ")</h5>";
      $('#previewimage').attr("src", modelImage);
      showVariations(modelTitle);
      showGlasses(modelGlasses);
   }

	function getGlasses(model) {
 		 var modelGlasses2 = $(model).attr("src");
  		var modelMasks = $(model).attr("style");
		console.log(modelGlasses2);
		console.log(modelMasks);
	   $('#previewglasses').attr("src", modelGlasses2);
	   $('#previewglasses').attr("style", modelMasks);
	}
