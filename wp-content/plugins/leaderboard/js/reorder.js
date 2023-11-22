// JavaScript Document
jQuery(document).ready(function($){
	
	
		var sortList = $('ul#custom-type-list');
		var animation = $('#loading-animation');
		var pageTitle = $('div h2');
		
				
				sortList.sortable({
					
					update: function( event, ui ){
						animation.show();
						//alert("move initiated!");	
						
						$.ajax({
								url: ajaxurl,
								type: 'POST',
								//dataType: 'json'
								data: {
										action: 'save_sort',
										order: sortList.sortable('toArray')
									},
								success: function( respone ) {
									$('div#message').remove();
									animation.hide();
									console.log(sortList.sortable('toArray'));
									pageTitle.after('<div id="message" class="updated below-h2"><p>List has been saved!</p></div>');
								},
								error: function( error ) {
									$('div#message').remove();
									animation.hide();
									pageTitle.after('<div class="error"><p>There was an error updating the list!</p></div>');
								}
							});
							
					}
				});
				
	});