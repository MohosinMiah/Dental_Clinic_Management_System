
var productList = [{"label":"Doctor Visit(DV)","value":"1"},{"label":"X-RAY(digital)","value":"2"},{"label":"CT-Scan(CS)","value":"5"},{"label":"Blood Test (BT)","value":"6"},{"label":"Delivery (DV)","value":"7"},{"label":"Covic-19 test(C9)","value":"8"},{"label":"Regular Check-up(RC)","value":"9"},{"label":"Physio therapy  (PT)","value":"10"},{"label":"Baby Vaccine (BV)","value":"11"},{"label":"Dialysis (DL)","value":"12"}] ; 


APchange = function(event, ui){
	$(this).data("autocomplete").menu.activeMenu.children(":first-child").trigger("click");
}
    function invoice_productList(cName) {

		var qnttClass = 'ctnqntt'+cName;
		var priceClass = 'price_item'+cName;
		var total_tax_price = 'total_tax_'+cName;
		var available_quantity = 'available_quantity_'+cName;

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
				var base_url = $('.baseUrl').val();
				var csrf_test_name = $("[name=_token]").val();
				
				$.ajax
				   ({
                        url: base_url+"/retrieve_service",
                        headers: { 'X-CSRF-Token': csrf_test_name },
						type: "POST",
						data: {product_id:id},
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