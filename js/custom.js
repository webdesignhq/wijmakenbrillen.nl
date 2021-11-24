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
		$(".mobile__menu__overlay--container").toggleClass('activeMenu')
        // $(".mobile__menu__overlay--container").css('left', '0');
    });

    $(".menu-close").click(function(e) {
        // $(".mobile__menu__overlay--container").css('left', '-100%');
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
		
        	color.push($(this).attr("data-slug"));
// 		}
        console.log(color);

	});
	
	$('.reset-filters').on('click', function(e) {
		location.reload();
	});
	

		let attrMax;
		let attrMin;
		$('.wcpa_form_item input[type="number"]').focus((e)=>{
			attrMax = e.target.max;
			attrMin = e.target.min;
			console.log(attrMax, attrMin);
		})
		$('.wcpa_form_item input[type="number"]').change(function(e){
		console.log(e.target.value);
		attrMax = e.target.max;
		attrMin = e.target.min;
		console.log(attrMax, attrMin);
		
		if((attrMax !== undefined && attrMax !== false && attrMax !== '') || (attrMin !== undefined && attrMin !== false && attrMin !== '')){
			if(e.target.value > attrMax){
				$(this).val(attrMax);
			}else if(attrMin < 0){
				console.log('ja')
				if(e.target.value > attrMin){
					console.log('ja2')
					$(this).val(attrMin);
				}
			}else if(attrMin >= 0){
				if(e.target.value < attrMin){
					$(this).val(attrMin);
				}
		}}else{

		}  

		if($(e.target).hasClass('no-parse')){
			e.target.value = parseFloat(e.target.value).toFixed(0);
		}else if($(e.target).hasClass('parse-1')){
			e.target.value = parseFloat(e.target.value).toFixed(1);
		}else{
			e.target.value = parseFloat(e.target.value).toFixed(2);
		}
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
	window.onload = cameraStart();


});
	let color;
	let varID;
	let link;
	$('input[name="variation_id"]').change(function() {
		varID = $('input[name="variation_id"]').val();
		link = '/~brillen/paskamer-nieuw#' + varID;
		$("#fitting-room").attr('href', link);
		console.log(color, varID);
	});

	$('.product-color').click(function(){
			color = $(this).attr("data-name");
			
			$('.product-color').removeClass('active-color');
			$(this).addClass('active-color');
	
			$("#pa_kleur").val(color).change();
			i = 0;
		
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
	  var modelLink = $(model).attr("data-link");
	  console.log(modelLink);
      document.getElementById("previewtext").innerHTML = "<h5>(Gekozen model: " + modelTitle + " - " + modelColor + ")</h5>";
	  $('#myAnchorA').attr('href', modelLink);
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

	$().ready(()=> {
		if (window.location.href.indexOf("#") > -1){
			let var_id = window.location.href;
			var_id = var_id.split("#").pop();
			let variation = $(".formSpan12").find("[data-variation='" + var_id +"']");
			console.log(var_id, variation);
			getModel(variation);
			$('.transparant-glass').hide();
		}
	});

	$("#showFilters").click(()=>{
		$("#sidebar-primary").slideToggle();
	});