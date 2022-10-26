

$(document).ready(function() {  
	var base_url = $('.baseUrl').val();
	$('.add-invoice').prop('disabled', true);

	$('body').on('keyup change', '#patient_id', function() {
		var due_total = 0.00;
		var patient_id = $(this).val();
		if(patient_id.length > 0)
		$.ajax({

			'url': base_url + '/get_patient_list_based_patient_id/'+patient_id,
			'type': 'GET',
			'dataType': 'JSON',
			'success': function(data){ 

				if( data['invoice'] != null )
				{
					due_total = data['invoice'].due_total;
				}
	
				if ( data['patient'] != null ) {

					$('#patient_name').val(data['patient'].name);
					$('#patient_address').val(data['patient'].address);
					$('#patient_phone').val(data['patient'].phone);
					$('#patient_id_set').val(data['patient'].id);
					$('#isRegistered').val('Yes');

					$('#previous_due').text( due_total )
					$('#previous_due_set').val( due_total )
					$('#dueAmmount').val( due_total );
					$('#csc').removeClass('text-danger');
					$(".invlid_patient_id").text(' Patient ID is Valid').addClass("text-success");
					var previous_due = parseInt( $("#previous_due_set").val() );
					 $("#grandTotalWithDue").val(previous_due)	
				} else {

					$('#patient_name').val('');
					$('#patient_address').val('');
					$('#patient_phone').val('');
					$('#isRegistered').val('No');
					$('#patient_id_set').val('');

					$('#csc').removeClass('text-success');
					$(".invlid_patient_id").text('Patient  Is Not Registered ').addClass("text-danger");
				}
			}, error   : function() {
					$('#patient_name').val('');
					$('#patient_address').val('');
					$('#patient_phone').val('');
					$('#isRegistered').val('No');
					$('#patient_id_set').val('');

					$('#csc').removeClass('text-success');
					$(".invlid_patient_id").text('Patient  Is Not Registered ').addClass("text-danger");
			} 
			
		});
	});

});



// isClose = 0 Selected     
$(document).ready(function() {  
	$('body').on('keyup change', '#isClose', function() {
		var isClose = $('#isClose').val();
		if( parseInt(isClose) === 0)
		{
		
			$('#decreaseAmountDisplay').css("display", "");

			$("#decreaseAmount").on('keyup change', function(){

				var grandTotal       = parseInt( $('#grandTotal').val() );
				var paidAmount       = parseInt( document.getElementById('paidAmount').value );
				var dueAmmount = parseInt( document.getElementById('dueAmmount').value );
				var previous_due_set = parseInt( $('#previous_due_set').val() );
				
				var decreaseAmountValue = parseInt( $('#decreaseAmount').val() );


		
				if( previous_due_set > 0 )
				{
					 finalDue =  Math.abs( ( grandTotal + previous_due_set ) ) - paidAmount ;
	
				}else{
					 finalDue = grandTotal - Math.abs( ( paidAmount - previous_due_set ) );
				}

				if( paidAmount < 0 )
				{
					paidAmount = 0;
				}
				// Id dueAmmount is greater than 0  

				if(  decreaseAmountValue >= 0 )
				{
				
					console.log("previous_due_set = "+ previous_due_set)
					console.log("Paid =  " + ( paidAmount + previous_due_set ));
				
					console.log( decreaseAmountValue );
					$('#dueAmmount').val( finalDue - decreaseAmountValue);

				}

			});

		}
		else
		{
			var grandTotal       = parseInt( $('#grandTotal').val() );
			var paidAmount       = parseInt( document.getElementById('paidAmount').value );
			var previous_due_set = parseInt( $('#previous_due_set').val() );

			$('#decreaseAmountDisplay').css("display", "none");
			
			console.log( Math.abs( ( paidAmount + previous_due_set ) ) );
			if( previous_due_set > 0 )
			{
				 finalDue =  Math.abs( ( grandTotal + previous_due_set ) ) - paidAmount ;

			}else{
				 finalDue = grandTotal - Math.abs( ( paidAmount - previous_due_set ) );
			}

			if( paidAmount < 0 )
			{
				paidAmount = 0;
			}

			$('#dueAmmount').val( finalDue );
			$('#decreaseAmount').val(0);
		}
	});
});


// Appointment Patient ID Field Conditional Display

// isRegistered     
$(document).ready(function() {  
	$('body').on('keyup change', '#isRegistered', function() {
		var isRegistered = $('#isRegistered').val();
		$('#patient_phone').val( '' );
		$('#patient_name').val( '' );
		$('#patient_id').val( '' );
		if( isRegistered == "Yes" )
		{
			$('#patient_id_display').css( 'display', '' );
		}
		else
		{
			$('#patient_id_display').css( 'display','none' );
		}

	});
});

//print a div
function printContent(el){
	'use strict';
	var restorepage  = $('body').html();
	var printcontent = $('#' + el).clone();
	$('body').empty().html(printcontent);
	window.print();
	$('body').html(restorepage);
	location.reload();
}



// $(document).ready(function () {

//     'use strict';

//     $(".se-pre-con").fadeOut("slow");


//     //summernote
//     $('#summernote').summernote({
//         height: 300, // set editor height
//         minHeight: null, // set minimum height of editor
//         maxHeight: null, // set maximum height of editor
//         focus: true                  // set focus to editable area after initializing summernote
//     });

//     // tiemt picker
//     $('#basic_example_1').timepicker();
//     $('#basic_example_2').timepicker();

//     //date picker
//     $(".datepicker1").datepicker(
//     {
//         dateFormat: 'yy-mm-dd',
//         showMonths: true,
//         changeMonth: true,
//         changeYear: true,
//         yearRange: "-100:+0"
//     });


//     $(".datepicker2").datepicker({dateFormat: 'yy-mm-dd'});

//     $(".datepicker3").datepicker(
//     {
//     showOtherMonths: true,
//     selectOtherMonths: true,
//     dateFormat: 'yy-mm-dd',
//     minDate: 0
//     });
 
 
// });




//     // load patient name
//     function loadName(){
//         'use strict';          
//         var phone = $('#phone').val();;

//         var base_url = $("#base_url").val();

//         if (phone!='') {

//             $('button[type=submit]').prop('disabled', true);

//             $.ajax({ 
//                 'url': base_url + 'admin/Ajax_controller/get_patinet_name/'+phone.trim(),
//                 'type': 'GET', //the way you want to send data to your URL
//                 'data': {'phone': phone },
//                 'success': function(data) { 
//                     var container = $(".patient_name");
//                     if(data==0){
//                         container.html("<?php echo display('patient_name_load_msg')?>");
//                     }else{ 
//                         container.html(data);
//                         $('button[type=submit]').prop('disabled', false);
//                     }
//                 }
//             });
//         };
//     }

//     // load load schedul
//     function loadSchedul(){
//         'use strict'; 
//         var doctor_id = $('#doctor_id').val();
//         var date     = $('#date').val();
//         var base_url = $("#base_url").val();

        
//         if (doctor_id!='') {
//             $.ajax({ 
//                 'url': base_url + 'admin/Ajax_controller/get_schedul/'+doctor_id+'/'+date,
//                 'type': 'GET', //the way you want to send data to your URL
//                 'data': {'doctor_id': doctor_id },
//                 'success': function(data) {
//                     var container = $(".schedul");
//                     container.html(data);
//                 }
//                 });
//             };
//     }

//     // sequence uncion
//     function myBooking(data){
//         'use strict'; 
//         var id = $("#t_" + data).text();
//         document.getElementById("msg_c").innerHTML = "<div style=' color:green; font-size:20px;'><?php echo display('book_sequence')?> " +id +"</div>";
//         document.getElementById('serial_no').value = id;        
//     } 



//     // start create patient
//     $(document).ready(function(){

//         'use strict';

//         var base_url = $("#base_url").val();

//         $("#old").on('keyup',function(){
//                var age = (this.value);
//                if(age !==''){
//               $.ajax({
//                     'url': base_url + 'admin/Ajax_controller/age_to_birthdate/'+age.trim(),
//                     'type': 'GET', 
//                     'data': {'age': age },
//                     'success': function(data) { 
//                         var container = $(".birth_date");
//                         if(data==0){
//                             container.val("0000-00-00");
//                         }else{ 
//                             container.val(data); 
//                         }
//                     }
//                 });
//             }
//         });
//     })

//     // load patient name
//     function load_patient_id(){ 
//     'use strict';         
//         var patient_id = document.getElementById('patient_id').value;
//         var base_url = $("#base_url").val();
//         if (patient_id!='') {
            
//             $.ajax({ 
//                 'url': base_url + 'admin/Ajax_controller/get_patinet_id/'+patient_id.trim(),
//                 'type': 'GET', //the way you want to send data to your URL
//                 'data': {'patient_ibase_url': patient_id },
//                 'success': function(data) { 
//                     var container = $(".p_id");
//                     if(data==0){
//                         container.html("<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>Your id is available</div>");
//                         $('button[type=submit]').prop('disabled', false);
//                     }else{ 
//                         container.html(data);
//                         $('button[type=submit]').prop('disabled', true);
//                     }
//                 }
//             });
//         };
//     }


//     $(document).ready(function(){
//         'use strict';

//         $("#male").hide();
//         $("#female").hide();

//         var sex = $('#psex').val();

//         if(sex){
//             if(sex==="Male"){
//                 $("#male").show();
//                 $("#female").hide();
//             }else{
//                $("#female").show();
//              $("#male").hide();
//             }
//         }

//        $("#checkbox2_5").on('click',function(){
//             $("#male").show();
//             $("#female").hide();
//         });
        
//         $("#checkbox2_10").on('click',function(){
//             $("#female").show();
//              $("#male").hide();
//         });
        
//         $("#checkbox2_0").on('click',function(){
//             $("#male").show();
//             $("#female").hide();
//         });
        
//     });

//     // end create patient




//     // get Sms template
//     function getTeamplate(){
//         'use strict';
//         var base_url = $('#base_url').val();
//         var teamplate_id = document.getElementById('tmp').value;
        
//         $.ajax({ 
//             'url': base_url + 'admin/Ajax_controller/get_teamplate/'+teamplate_id,
//             'type': 'GET', //the way you want to send data to your URL
//             'data': {'teamplate_id': teamplate_id },
//             'success': function(d) { 
//                 var container = $(".view_tmp");
//                 if(d){
//                     container.html(d);
//                 }else{ 
//                     container.val(""); 
//                 }
//             }
//         });
        
//     }


    
//     function laodCata(lang_id){
//          'use strict';
//          var base_url = $('#base_url').val();
//         if (lang_id!='') {
//             $.ajax({ 
//                 'url': base_url + 'admin/Ajax_controller/lang_cata/'+lang_id,
//                 'type': 'GET', //the way you want to send data to your URL
//                 'data': {'lang_id': lang_id },
//                 'success': function(data) { 
                    
//                     var container = $(".category");
//                     if(data==0){
//                         container.html("There is no category");
//                     }else{ 
//                         container.html(data);
//                     }
//                 }
//             });
//         };
//     }


//     function loadClassi(cat_id){
//         'use strict';
//         var base_url = $('#base_url').val();
//         if (cat_id!='') {
//             $.ajax({ 
//                 'url': base_url + 'admin/Ajax_controller/cat_classification/'+cat_id,
//                 'type': 'GET', //the way you want to send data to your URL
//                 'data': {'cat_id': cat_id },
//                 'success': function(data) { 
                    
//                     var container = $(".classi");
//                     if(data==0){
//                         container.html("There is no classification");
//                     }else{ 
//                         container.html(data);
//                     }
//                 }
//             });
//         };
//     }

//     $(document).ready(function(){
//         'use strict';
//         var base_url=$('#base_url').val();

//         $("#search-box").on('keyup',function(){

//             var lang_id = $('#lang_id').val();
//             var csrf_test_name = $("[name=csrf_test_name]").val();

//             $('button[type=submit]').prop('disabled', true);

//             $.ajax({
//                 type: "POST",
//                 url: base_url + 'admin/Ajax_controller/medicine_saj/',
//                 data: {lang_id: lang_id,keyword:$(this).val(),csrf_test_name:csrf_test_name},
//                 beforeSend: function(){
//                     $("#search-box").css("background","#FFF url("+base_url+"assets/images/LoaderIcon.gif) no-repeat 165px");
//                 },
//                 success: function(data){
//                     if(data){
//                         $("#suggesstion-box").show();
//                         $("#suggesstion-box").html(data);
//                         $("#search-box").css("background","#FFF");
//                        $('button[type=submit]').prop('disabled', false);
//                     } else{
//                         $("#suggesstion-box").hied();
//                     }
                   
//                 }
//             });
//         });
//     });

//     'use strict';
//     $(document).ready(function(){
//         $('body').on('click','#country-list > li',function(){
//             $("#search-box").val($(this).html());
//             $("#search-medicine_id").val($(this).val());
//             $("#country-list").slideUp(300);
//         });
//     });
        

// function js_value(str)
// {
//     'use strict';
//     var teamplate_name = $("#t_" + str).text();
//     var teamplate = $("#td_" + str).text();
//     $("#id").val(str);
//     $("#template_name").val(teamplate_name);
//     $("#teamplate").val(teamplate);
//     $(".tit").text('SMS Template Setup');
//     $("#MyForm").attr("action", 'template_edit');
//     $(".sav_btn").text('Update');
// }



// function loadePattern(pattern){
//     'use strict';
//    var base_url = $('#base_url').val();
//     $.ajax({
//         'url': base_url + 'admin/Ajax_controller/patternSetData/'+pattern,
//         'type': 'GET',
//         'dataType': 'JSON',
//         'success': function(data)
//         {

//             $('[name="h_height"]').val(data.h_height);
//             $('[name="h_width"]').val(data.h_width);
//             $('[name="f_height"]').val(data.f_height);
//             $('[name="f_width"]').val(data.f_width);
//             $('[name="content1_height"]').val(data.content1_height);
//             $('[name="content1_width"]').val(data.content1_width);
//             $('[name="content2_height"]').val(data.content2_height);
//             $('[name="content2_width"]').val(data.content2_width);
//         },
//         'error': function (jqXHR, textStatus, errorThrown)
//         {
//             alert('Error get data from ajax');
//         }
//     });
// }


// function loadDisease(ms_id){
//     'use strict';
//         var base_url = $("#base_url").val();

//         if (ms_id!='') {
//                 $.ajax({ 
//                     'url': base_url + 'admin/Ajax_controller/load_disease/'+ms_id,
//                     'type': 'GET', //the way you want to send data to your URL
//                     'data': {'ms_id': ms_id },
//                     'success': function(data) { 
                        
//                         var container = $(".disease");
//                         if(data==0){
//                             container.html("There is no section");
//                         }else{ 
//                             container.html(data);
                         
//                         }
//                     }
//                 });
//             };
//     }
//     // load  
//     function loadSection(lang_id){  
//        'use strict';
//        var base_url = $("#base_url").val();
//         if (lang_id!='') {
//             $.ajax({ 
//                 'url': base_url + 'admin/Ajax_controller/lang_section/'+lang_id,
//                 'type': 'GET', //the way you want to send data to your URL
//                 'data': {'lang_id': lang_id },
//                 'success': function(data) { 
                    
//                     var container = $(".section");
//                     if(data==0){
//                         container.html("There is no section");
//                     }else{ 
//                         container.html(data);
                     
//                     }
//                 }
//             });
//         };
//     }

