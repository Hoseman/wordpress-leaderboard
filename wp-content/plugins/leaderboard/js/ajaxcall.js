 jQuery(document).ready(function($) {

	 

	 $('#menu').change(function() {

			if($(this).val() === 'Please Choose...') {

				window.location.reload();

				return false;

			}

			var myvalue = $(this).val();

			

			//alert(myvalue);			



			var animation = $('#loading-animation');

			var $content = $('.ajax-container');

			animation.show();

			//alert(myvalue);

			

					$.ajax({

						url: myajax.ajax_url,

						type: 'POST',

						//dataType: 'json',

						data: {

							action: 'my_ajax_action_2',

							post_id: myvalue

						},

						success:function(data) {

							// This outputs the result of the ajax request

							//console.log(data);

							$('#target').html(data);

							animation.hide();

						}

					});

	

		});

		

$('#menu2').change(function() {

			 if($(this).val() === 'Please Choose...') {

				window.location.reload();

				return false;

			}

			 var myvalue2 = $(this).val();

			 var table = $('#points_table');

			 table.hide();

			 var animation = $('#loading-animation');

			 //var $content = $('.ajax-container');

			 animation.show();

			 //alert(myvalue2);

			

					$.ajax({

						url: ajaxurl,

						type: 'POST',

						//dataType: 'json',

						data: {

							action: 'my_ajax_action_3',

							post_id: myvalue2

						},

						success:function(data) {

							// This outputs the result of the ajax request

							//console.log(data);

							$('#target').html(data);

							animation.hide();

						}

					});

		});	 







});

