var tx_out	= 3000000 + 5000; // sync with php max_execution_time + 5 seconds network latency
var host 	= jQuery("#host-rib").text(),
	assets	= host+'__assets/',
	site = host+"index.php/";
var post = [];
var   AgreeTerm=0;
jQuery(function() {
	jQuery(".date").datepicker();
	post.push({ name:'csrf_token', value: $('#csrf').val() });
	jQuery('[data-rel=tooltip]').tooltip();

	jQuery(".select2").css("width","150px").select2({allowClear:true})
	.on("change", function(){
		jQuery(this).closest("form").validate().element(jQuery(this));
	}); 

	var $validation = true;
	jQuery("#fuelux-wizard").ace_wizard().on("change" , function(e, info){
		if(info.step == 1){// && $validation) {
			if(!jQuery("#validation-form").valid()){ return false;}
			SaveFormData("#validation-form");
		}
		if(info.step == 2) {
			if(!jQuery("#validation-form2").valid()){ return false;}
			SaveFormData("#validation-form2");
		}
		if(info.step == 3) {
			if(!jQuery("#validation-form3").valid()){ return false;}
			SaveFormData("#validation-form3");
		}
		
	}).on("finished", function(e) {
		// if(bootbox.dialog("Thank you! Your information was successfully submited!", [{
			// "label" : "OK",
			// "class" : "btn-small btn-primary",
			// }]
		// ))
		// {
			//window.location.href = host;
		// };
		if(!jQuery("#validation-form4").valid() || !jQuery("#validation-form5").valid()){ return false;}
			
			SaveFormData("#validation-form4");
			SaveFormData("#validation-form5");
			//console.log(post);
			if(AgreeTerm==1 || AgreeTerm=='1')
			{
				var url = "#chome/reg";
				
				fetch_with_no_target(url, post, function(resp){
					resp = jQuery.parseJSON(resp);
					//console.log(resp);
					if(resp.status=='success') {
				
						var formData = new FormData($("#validation-form")[0]);
						formData.append("AccountID", resp.AccountID);
						jQuery.ajax({
							url: site+"chome/UploadDoc",
							type: 'POST',
							data: formData,
							async: false,
							success: function (data) {
								data = jQuery.parseJSON(data);
								
								if(data.status=='success') {
								
									if(data.action=="notify")
									{
										swal({
											title: "Success",
											text: data.message,
											type: "success",
											confirmButtonColor: '#6BDD55',
											confirmButtonText: 'OK'
											},
											function(){
												if(data.hasOwnProperty('url')){
													window.location.href = getURL(data.url);
												}
											}
											);
									}
									
									if(data.action=="redirect")
									{
										window.location.href = getURL(data.url);
									}
								}
								else{
									
									swal({
											title: "Error Message",
											text: data.message,
											type: "error",
											confirmButtonColor: '#DD6B55',
											confirmButtonText: 'OK'
											});
								}
							},
							cache: false,
							contentType: false,
							processData: false
						});
						// if(resp.action=="notify")
						// {
							// swal({
								// title: "Success",
								// text: resp.message,
								// type: "success",
								// confirmButtonColor: '#6BDD55',
								// confirmButtonText: 'OK'
								// },
								// function(){
									// if(resp.hasOwnProperty('url')){
										// window.location.href = getURL(resp.url);
									// }
								// }
								// );
						// }
						
						// if(resp.action=="redirect")
						// {
							// window.location.href = getURL(resp.url);
						// }
						
						
					}
					else{
						
						swal({
								title: "Error Message",
								text: resp.message,
								type: "error",
								confirmButtonColor: '#DD6B55',
								confirmButtonText: 'OK'
								});
					}
				});
			}
			else
			{
				swal({
						title: "Term Agreement",
						text: "You have to agree the term.",
						type: "warning",
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'OK'
					});
			}
		
		
	}).on("stepclick", function(e){
		return false;//prevent clicking on steps
	});

	/*$.mask.definitions["~"]="[+-]";
	jQuery("#Phone").mask("(999) 999-9999");
	*/
	// jQuery.validator.addMethod("Phone", function (value, element) {
		// return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
	// }, "Enter a valid phone number.");
	jQuery.validator.addMethod("Phone", function (value, element) {
		return this.optional(element) || /^\d*?$/.test(value);
	}, "Enter a valid phone number.");
	jQuery.validator.addMethod("MobilePhone", function (value, element) {
		return this.optional(element) || /^\d*?$/.test(value);
	}, "Enter a valid phone number.");
	
	/*
	jQuery("#MobilePhone").mask("(999) 999-9999");
	*/
	// jQuery.validator.addMethod("MobilePhone", function (value, element) {
		// return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
	// }, "Enter a valid phone number.");


	jQuery("#validation-form").validate({
		errorElement: "span",
		errorClass: "help-inline",
		focusInvalid: false,
		rules: {
			AccountTitle: {
				required: true
			},
			FirstName: {
				required: true
			},
			IdentificationDoc: {
				required: true
			},
			CitizenshipID: {
				required: true
			},
			
			IDType: {
				required: true
			},
			IDNumber: {
				required: true
			},
			
			DateOfBirth: {
				required: true
			},
			Gender: "required"
			
			// password: {
				// required: true,
				// minlength: 5
			// },
			// password2: {
				// required: true,
				// minlength: 5,
				// equalTo: "#password"
			// },
			
			// agree: "required"
		},

		messages: {
			Email: {
				required: "Please provide a valid email.",
				email: "Please provide a valid email."
			},
			// password: {
				// required: "Please specify a password.",
				// minlength: "Please specify a secure password."
			// },
			Gender: "Please choose gender"
			// ,
			// agree: "Please accept our policy"
		},

		invalidHandler: function (event, validator) { //display error alert on form submit   
			//jQuery(".alert-error", jQuery(".login-form")).show();
		},

		highlight: function (e) {
			jQuery(e).closest(".control-group").removeClass("info").addClass("error");
		},

		success: function (e) {
			jQuery(e).closest(".control-group").removeClass("error").addClass("info");
			jQuery(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is(":checkbox") || element.is(":radio")) {
				var controls = element.closest(".controls");
				if(controls.find(":checkbox,:radio").length > 1) controls.append(error);
				else error.insertAfter(element.nextAll(".lbl:eq(0)").eq(0));
			}
			else if(element.is(".select2")) {
				error.insertAfter(element.siblings("[class*='select2-container']:eq(0)"));
			}
			else if(element.is(".chzn-select")) {
				error.insertAfter(element.siblings("[class*='chzn-container']:eq(0)"));
			}
			else error.insertAfter(element);
		},

		submitHandler: function (form) {
		},
		invalidHandler: function (form) {
		}
	});

	jQuery("#validation-form2").validate({
		errorElement: "span",
		errorClass: "help-inline",
		focusInvalid: false,
		rules: {
			
			CountryID: {
				required: true
			},
			Address: {
				required: true
			},
			City: {
				required: true
			},
			Province: {
				required: true
			},
			Zipcode: {
				required: true
			},
			// Phone: {
				// required: true,
				// phone: "required"
			// },
			Email: {
				required: true,
				email:true
			},
			ConfirmEmail: {
				required: true,
				email:true
			}
		},

		invalidHandler: function (event, validator) { //display error alert on form submit   
		},

		highlight: function (e) {
			jQuery(e).closest(".control-group").removeClass("info").addClass("error");
		},

		success: function (e) {
			jQuery(e).closest(".control-group").removeClass("error").addClass("info");
			jQuery(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is(":checkbox") || element.is(":radio")) {
				var controls = element.closest(".controls");
				if(controls.find(":checkbox,:radio").length > 1) controls.append(error);
				else error.insertAfter(element.nextAll(".lbl:eq(0)").eq(0));
			}
			else if(element.is(".select2")) {
				error.insertAfter(element.siblings("[class*='select2-container']:eq(0)"));
			}
			else if(element.is(".chzn-select")) {
				error.insertAfter(element.siblings("[class*='chzn-container']:eq(0)"));
			}
			else error.insertAfter(element);
		},

		submitHandler: function (form) {
		},
		invalidHandler: function (form) {
		}
	});
	
	
	jQuery("#validation-form3").validate({
		errorElement: "span",
		errorClass: "help-inline",
		focusInvalid: false,
		rules: {
			BankCountryID: {
				required: true
			},
			BankName: {
				required: true
			},
			BankCity: {
				required: true
			},
			BankProvince: {
				required: true
			},
			BankZipcode: {
				required: true
			},
			BankAccountNumber: {
				required: true
			},
			BankAccountName: {
				required: true
			}
		},
		messages: {
			
			
			// ,
			// agree: "Please accept our policy"
		},
		invalidHandler: function (event, validator) { //display error alert on form submit   
		},

		highlight: function (e) {
			jQuery(e).closest(".control-group").removeClass("info").addClass("error");
		},

		success: function (e) {
			jQuery(e).closest(".control-group").removeClass("error").addClass("info");
			jQuery(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is(":checkbox") || element.is(":radio")) {
				var controls = element.closest(".controls");
				if(controls.find(":checkbox,:radio").length > 1) controls.append(error);
				else error.insertAfter(element.nextAll(".lbl:eq(0)").eq(0));
			}
			else if(element.is(".select2")) {
				error.insertAfter(element.siblings("[class*='select2-container']:eq(0)"));
			}
			else if(element.is(".chzn-select")) {
				error.insertAfter(element.siblings("[class*='chzn-container']:eq(0)"));
			}
			else error.insertAfter(element);
		},

		submitHandler: function (form) {
		},
		invalidHandler: function (form) {
		}
	});
	
	jQuery("#validation-form4").validate({
		errorElement: "span",
		errorClass: "help-inline",
		focusInvalid: false,
		rules: {
			SecurityQuestionID: {
				required: true
			},
			SecurityQuestionAnswer: {
				required: true
			}
		},
		
		invalidHandler: function (event, validator) { //display error alert on form submit   
		},

		highlight: function (e) {
			jQuery(e).closest(".control-group").removeClass("info").addClass("error");
		},

		success: function (e) {
			jQuery(e).closest(".control-group").removeClass("error").addClass("info");
			jQuery(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is(":checkbox") || element.is(":radio")) {
				var controls = element.closest(".controls");
				if(controls.find(":checkbox,:radio").length > 1) controls.append(error);
				else error.insertAfter(element.nextAll(".lbl:eq(0)").eq(0));
			}
			else if(element.is(".select2")) {
				error.insertAfter(element.siblings("[class*='select2-container']:eq(0)"));
			}
			else if(element.is(".chzn-select")) {
				error.insertAfter(element.siblings("[class*='chzn-container']:eq(0)"));
			}
			else error.insertAfter(element);
		},

		submitHandler: function (form) {
		},
		invalidHandler: function (form) {
		}
	});
	
	jQuery("#validation-form5").validate({
		errorElement: "span",
		errorClass: "help-inline",
		focusInvalid: false,
		rules: {
			
			AgreeTerm: "required"
			
		},
		messages: {
			AgreeTerm: "This field is required"
			
		},
		invalidHandler: function (event, validator) { //display error alert on form submit   
		},

		highlight: function (e) {
			jQuery(e).closest(".control-group").removeClass("info").addClass("error");
		},

		success: function (e) {
			jQuery(e).closest(".control-group").removeClass("error").addClass("info");
			jQuery(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is(":checkbox") || element.is(":radio")) {
				var controls = element.closest(".controls");
				if(controls.find(":checkbox,:radio").length > 1) controls.append(error);
				else error.insertAfter(element.nextAll(".lbl:eq(0)").eq(0));
			}
			else if(element.is(".select2")) {
				error.insertAfter(element.siblings("[class*='select2-container']:eq(0)"));
			}
			else if(element.is(".chzn-select")) {
				error.insertAfter(element.siblings("[class*='chzn-container']:eq(0)"));
			}
			else error.insertAfter(element);
		},

		submitHandler: function (form) {
		},
		invalidHandler: function (form) {
		}
	});
	
	jQuery("#modal-wizard .modal-header").ace_wizard();
	jQuery("#modal-wizard .wizard-actions .btn[data-dismiss=modal]").removeAttr("disabled");
})

function SaveFormData(FormID)
{
	jQuery('.postit', jQuery(FormID)).each(function() {
		var obj = this.className.split(' ')[1], val= '';
		
		val = $(this).val();
		if($(this).hasClass('rib-date'))
		{
		   val = parseToDBDate(val);
		}
		
		
		if(this.type=='checkbox') {
			post.push({name:obj, value:$(this).attr('checked') ? '1' : '0'});
		}
		else if(this.type=='radio')
		{
			if($(this).is(':checked')){
				post.push({name:obj, value: val});
				if($(this).hasClass('AgreeTerm'))
				{
					AgreeTerm = val;
				}
			}
		}
		else {post.push({name:obj, value:val });}
	});
}

function fetch_with_no_target(url, data, callback) {
	var _data	= data==undefined ? null : data,
		_type	= data==undefined ? 'GET' : 'POST',
		_url 	= url.replace('#', ''),
		_cls	= 'loading4';
		_url	= /http/ig.test(_url) ? _url : site+_url;
	
	ajax = jQuery.ajax({
		type: _type,
		url : _url,
		data: _data,
		timeout: tx_out,
		success: function(resp) {
			if(resp=='expired') {
				ajax.abort();
				ts_out();
				
			}
			else {
			
				if(typeof callback=='function') callback(resp);
			};
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert("tes");
			if(textStatus=="timeout") {
				ajax.abort();
				ts_out();
			}
			else {
				alert("error")
			}
		}
	});
};
function getURL(url)
{
    url = url.replace('#', '');
    return /http/ig.test(url) ? url : site+url;
}

function parseToDBDate(date)
{
	var date = date.split("-");
	if(date.length>1)
	{	
		return date[2]+"-"+date[1]+"-"+date[0];
	}
	else
	{
		return date;
	}
}