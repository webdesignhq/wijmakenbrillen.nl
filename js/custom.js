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

	 $('.slider-review').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
		infinite: true,
		autoplay: true,
		centerMode: false,
		autoplaySpeed: 3000,
		 responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 1,
			  }
			}
		]
      });

    $(".clickable").click(function(e) {
		// console.log('click');
        e.preventDefault();
        window.location = $(this).find('a').attr('href');
    });

    $(".product_clickable").click(function(e) {
        e.preventDefault();
        window.location = $(this).find('.product__button').attr('href');
    });
    
	$(".choose-glasses").click(function(e){
		e.preventDefault();
		$('.variations_form').slideToggle();
	});
	
	$(".product-color").click(function(e){
			// setTimeout(
			// 	function() 
			// 	{
			// 		$('.woocommerce-product-gallery__image').eq(4).addClass('flex-active-slide');
			// 		$('.woocommerce-product-gallery__image').eq(3).remove();
			// 		console.log('done');
			// 	}, 800);
		e.preventDefault();
		$('.variations_form').show(400);
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

	let color = [];
    $('.filter-item').on('click', function(e) {
        e.preventDefault();
		$('.filter-item').removeClass('active');
		$(this).addClass('active-color');
		
// 		if (color.includes($(this).attr("data-slug"))){
// 			color.pop($(this).attr("data-slug"));
// 		} else{
        	color.push($(this).attr("data-slug"));
// 		}
        console.log(color);
		// $.ajax({
		//   type: 'POST',
		//   url: '/~brillen/wp-admin/admin-ajax.php',
		//   dataType: 'html',
		//   data: {
		// 	action: 'filter_projects',
		// 	color: color
		//   },
        //   error: function(xhr, status, error) {
        //     var err = eval("(" + xhr.responseText + ")");
        //     alert(err.Message);
        //   },
		//   success: function(res) {
		// 	$('#response').html(res);
		//   }
		// })
	});
	
	$('.reset-filters').on('click', function(e) {
		location.reload();
	});
	

		$('.wcpa_form_item input[type="number"]').change(function(e){
		console.log(e.target.value);
// 		$(this).value = parseFloat($(this).value).toFixed(2);
		e.target.value = parseFloat(e.target.value).toFixed(2);
// 		if(e.target.max != '' && e.target.value > e.target.max){
// // 			e.target.value = e.target.max;
// // 			$('.wcpa_form_item input[type="number"]').change()
// 			$(this).val(e.target.max);
// 		} else if (e.target.min != '' && e.target.value < e.target.min){
// // 			e.target.value = e.target.min;
// 			$(this).val(e.target.min);
// 		}
	});



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

    // $('#filter').submit(function(){
	// 	var filter = $('#filter');
	// 	$.ajax({
	// 		url:filter.attr('action'),
	// 		data:filter.serialize(), // form data
	// 		type:filter.attr('method'), // POST
	// 		beforeSend:function(xhr){
	// 			filter.find('button').text('Processing...'); // changing the button label
	// 		},
	// 		success:function(data){
	// 			filter.find('button').text('Filter toepassen'); // changing the button label back
	// 			$('#response').html(data); // insert data
	// 		}
	// 	});
	// 	return false;
	// });
	
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
		$('.product-color').removeClass('active-color');
		$(this).addClass('active-color');
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
 	  $("#previewglasses").attr("src", " ");
   }

	function getGlasses(model) {
 		 var modelGlasses2 = $(model).attr("src");
  		var modelMasks = $(model).attr("style");
		console.log(modelGlasses2);
		console.log(modelMasks);
	   $('#previewglasses').attr("src", modelGlasses2);
	   $('#previewglasses').attr("style", modelMasks);
	}
