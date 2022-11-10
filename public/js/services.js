
var productList = [];
// 	{
// 		"label":"Fillings",
// 		"value":"11"
// 	},
// 	{
// 		"label":"Root Canals",
// 		"value":"11"
// 	},
// 	{
// 		"label":"Root Canals Normal",
// 		"value":"12"
// 	},
// 	{
// 		"label":"Root Canals Premium",
// 		"value":"12"
// 	},
// 	{
// 		"label":"Implants ",
// 		"value":"5"
// 	},
// 	{
// 		"label":"Bridges",
// 		"value":"4"
// 	},
// 	{
// 		"label":"Orthodontics",
// 		"value":"4"
// 	},
// 	{
// 		"label":"Complete Exams",
// 		"value":"4"
// 	},
// 	{
// 		"label":"X-rays",
// 		"value":"4"
// 	},
// 	{
// 		"label":"Dental Cleanings",
// 		"value":"4"
// 	},
// 	{
// 		"label":"Continue Previous Srvice",
// 		"value":"10"
// 	}
// ] ; 
// var productList =	[
// 	{
// 		"value": 11,
// 		"label": "Root Canals Premium"
// 	},
// 	{
// 		"value": 12,
// 		"label": "Bridges"
// 	},
// 	{
// 		"value": 13,
// 		"label": "Continue Previous Service"
// 	}
// ];


		(function($) {
				var base_url = $('.baseUrl').val();
				var csrf_test_name = $("[name=_token]").val();
				$.ajax
				   ({
                        url: "http://127.0.0.1:8000/get_product_service_list",
                        headers: { 'X-CSRF-Token': csrf_test_name },
						type: "GET",
						cache: true,
						success: function(data)
						{
							productList = data;	
							console.log( productList );
						} 
					});
  })(jQuery);




APchange = function( event, ui )
{
	$(this).data("autocomplete").menu.activeMenu.children(":first-child").trigger("click");
}

    function invoice_productList(cName) {

		var qnttClass = 'ctnqntt'+cName;
		var priceClass = 'price_item'+cName;
		var total_tax_price = 'total_tax_'+cName;
		var available_quantity = 'available_quantity_'+cName;
		var base_url = $('.baseUrl').val();
		var csrf_test_name = $("[name=_token]").val();


//  *******************
				

// *****************



        $( ".productSelection" ).autocomplete(
		{

            source: productList,
			delay:300,
			focus: function(event, ui) {
				$(this).parent().find(".autocomplete_hidden_value").val(ui.item.value);
				$(this).val(ui.item.label);
				return false;
			},

			select: function(event, ui) {
				$(this).parent().find(".autocomplete_hidden_value").val(ui.item.value);
				$(this).val(ui.item.label);

				var id=ui.item.value;
		

				$.ajax
				   ({
                        url: base_url + "/retrieve_service",
                        headers: { 'X-CSRF-Token': csrf_test_name },
						type: "POST",
						data: { product_id:id },
						cache: false,
						success: function(data)
						{
   
							var obj = data;
                 
							$('.'+priceClass).val(obj.price);
							$('.'+total_tax_price).val(obj.tax);
							$('.'+available_quantity).val(obj.id);
							//This Function Stay on others.js page
							quantity_calculate(cName);
						} 
					});
				
				$(this).unbind("change");
				return false;
			}
		});
		$( ".productSelection" ).focus(function(){
			$(this).change(APchange);
		
		});
    }