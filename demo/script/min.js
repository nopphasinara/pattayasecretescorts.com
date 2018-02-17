function changeReport() {
	var data_type = $('#report_type').val();
	var data_code = $('#report_type option[value="'+data_type+'"]').attr('data-code');
	var data_title = $('#report_type option[value="'+data_type+'"]').attr('data-title');
	var data_pc = $('#pc option:selected').val();
	var data_number = $('#unit1_number').val();
	
	var report_name = 'RC';
	if(typeof data_code != 'undefined' && data_code != '') {
		report_name = report_name + '_' + data_code;
	}
	
	if(typeof data_pc != 'undefined' && data_pc != '') {
		report_name = report_name + '_' + data_pc;
	}
	
	if(typeof data_number != 'undefined' && data_number != '') {
		report_name = report_name + '_' + data_number;
	}
	
	if(typeof data_type == 'undefined' || data_type == '') {
		$('#report_title_label').html('RC Report');
		$('#report_title').attr('value', 'RC Report');
		$('#report_name_label').html('');
		$('#report_name').attr('value', '');
	} else {
		$('#report_title_label').html(data_title);
		$('#report_title').attr('value', data_title);
		$('#report_name_label').html(report_name);
		$('#report_name').attr('value', report_name);
	}
}

$('#report_type').bind('change', function(){
	changeReport();
});

/*----------------------------------------*/

$('#sales_people').bind('change', function(){
	var data_value = $(this).val();
	if(data_value == '') {
		$('#pc option[value=""]').attr('selected', true);
		$('#shared1_label option[value=""]').attr('selected', true);
		$('#shared1').attr('value', '');
	} else if($.isNumeric(data_value) == true) {
		var data_pc = $('#sales_people option[value="'+data_value+'"]').attr('data-pc');
		$('#pc option[value="'+data_pc+'"]').attr('selected', true);
		$('#shared1_label option[value="'+data_value+'"]').attr('selected', true);
		$('#shared1').attr('value', data_value);
	} else if(data_value == 'other') {
		$('#pc option[value="UNKNOWN"]').attr('selected', true);
		$('#shared1_label option[value="other"]').attr('selected', true);
		$('#shared1').attr('value', 'other');
	}
	
	changeReport();
});

$('#pc').bind('change', function(){
	changeReport();
});

/*----------------------------------------*/

$('#update_check').bind('click', function(){
	var data_value = $(this).val();
	var data_checked = $(this).attr('checked');
	if(data_checked == 'checked') {
		$('#update_details').attr('disabled', false);
	} else {
		$('#update_details').attr('disabled', true);
		$('#update_details').attr('value', '');
	}
});

$('#cancelled_check').bind('click', function(){
	var data_value = $(this).val();
	var data_checked = $(this).attr('checked');
	if(data_checked == 'checked') {
		$('#cancelled_details').attr('disabled', false);
	} else {
		$('#cancelled_details').attr('disabled', true);
		$('#cancelled_details').attr('value', '');
	}
});

/*----------------------------------------*/

$('#unit_sold').bind('change', function(){
	var data_value = $(this).val();
	if($.isNumeric(data_value) != true) {
		data_value = 1;
	}
	
	$('.unit_sold').hide();
	$('.unit_price').hide();
	
	for(i = 1; i <= data_value; i++) {
		$('.unit_sold[data-id="'+i+'"]').show();
		$('.unit_price[data-id="'+i+'"]').show();
	}
	
	changePricing();
});

/*----------------------------------------*/

function changeBilling() {
	var data_billing_to = $('#billing_to').val();
	
	var data_developer = '';
	
	if(data_billing_to == '') {
		// Skip
	} else if(data_billing_to == 'developer') {
		data_developer = $('#development option:selected').attr('data-developer');
		if(typeof data_developer == 'undefined' || data_developer == '') {
			data_developer = 'undefined';
		}
	} else {
		data_developer = $('#billing_to option[value="'+data_billing_to+'"]').attr('data-developer');
	}
	
	$('#other_billing').attr('value', data_developer);
}

$('#development').bind('change', function(){
	var data_value = $(this).val();
	
	$('#other_development').attr('disabled', true);
	$('#other_development').attr('value', '');
	$('#other_billing').attr('disabled', true);
	$('#other_billing').attr('value', '');
	
	if(data_value == '') {
		$('#billing_to option[value=""]').attr('selected', true);
	} else if(data_value == 'other') {
		$('#other_development').attr('disabled', false);
		$('#other_billing').attr('disabled', false);
		$('#other_billing').attr('value', '');
		$('#billing_to option[value="other"]').attr('selected', true);
	} else if($.isNumeric(data_value) == true) {
		$('#billing_to option[value="developer"]').attr('selected', true);
	}
	
	var smf = $('#development option[value="'+data_value+'"]').attr('data-smf');
	var commission = $('#development option[value="'+data_value+'"]').attr('data-commission');
	var retained = $('#development option[value="'+data_value+'"]').attr('data-retained');
	
	if($.isNumeric(smf) != true) { smf = '0.00'; }
	if($.isNumeric(commission) != true) { commission = '0.00'; }
	if($.isNumeric(retained) != true) { retained = '0.00'; }
	
	$('#smf').attr('value', smf);
	$('#commission').attr('value', commission);
	$('#retained').attr('value', retained);
	
	changeBilling();
	changePricing();
});

$('#billing_to').bind('change', function(){
	var data_value = $(this).val();
	
	$('#other_billing').attr('disabled', true);
	$('#other_billing').attr('value', '');
	
	if(data_value == 'other') {
		$('#other_billing').attr('disabled', false);
	}
	
	changeBilling();
});

/*----------------------------------------*/

$('.put_number').bind('change', function(){
	var data_id = $(this).attr('data-id');
	var number1 = $('#unit'+data_id+'_number1').val();
	var number2 = $('#unit'+data_id+'_number2').val();
	var number3 = $('#unit'+data_id+'_number3').val();
	
	if(number2 != '') { number2 = '-'+number2; }
	if(number3 != '') { number3 = '-'+number3; }
	
	var number = number1+number2+number3;
	$('#unit'+data_id+'_number').attr('value', number);
	$('#unit'+data_id+'_number_label').attr('value', number);
	$('#get'+data_id+'_number').html(number);
	
	changeReport();
});

/*----------------------------------------*/

function changePricing() {
	var unit_sold = $('#unit_sold').val();
	if($.isNumeric(unit_sold) != true) { unit_sold = 1; }
	
	var total_list_price = 0;
	var total_developer_discount = 0;
	var total_invoice_price = 0;
	var total_additional_discount = 0;
	var total_sale_price = 0;
	var total_retained_discount = 0;
	for(i = 1; i <= unit_sold; i++) {
		var list_price = $('#unit'+i+'_list_price').val();
		if($.isNumeric(list_price) != true) { list_price = 0; }
		
		var developer_discount = $('#unit'+i+'_developer_discount').val();
		if($.isNumeric(developer_discount) != true) { developer_discount = 0; }
		
		var invoice_price = list_price - developer_discount;
		if($.isNumeric(invoice_price) != true) { invoice_price = 0; }
		$('#unit'+i+'_invoice_price_label').attr('value', invoice_price);
		$('#unit'+i+'_invoice_price').attr('value', invoice_price);
		
		var additional_discount = $('#unit'+i+'_additional_discount').val();
		if($.isNumeric(additional_discount) != true) { additional_discount = 0; }
		
		var sale_price = invoice_price - additional_discount;
		if($.isNumeric(sale_price) != true) { sale_price = 0; }
		$('#unit'+i+'_sale_price_label').attr('value', sale_price);
		$('#unit'+i+'_sale_price').attr('value', sale_price);
		
		var retained_discount = additional_discount;
		if($.isNumeric(retained_discount) != true) { retained_discount = 0; }
		$('#unit'+i+'_retained_discount_label').attr('value', retained_discount);
		$('#unit'+i+'_retained_discount').attr('value', retained_discount);
		
		total_list_price = parseInt(total_list_price) + parseInt(list_price);
		total_developer_discount = parseInt(total_developer_discount) + parseInt(developer_discount);
		total_invoice_price = parseInt(total_invoice_price) + parseInt(invoice_price);
		total_additional_discount = parseInt(total_additional_discount) + parseInt(additional_discount);
		total_sale_price = parseInt(total_sale_price) + parseInt(sale_price);
		total_retained_discount = parseInt(total_retained_discount) + parseInt(retained_discount);
	}
	
	$('#total_invoice_price_label').attr('value', total_invoice_price);
	$('#total_invoice_price').attr('value', total_invoice_price);
	$('#total_sale_price_label').attr('value', total_sale_price);	
	$('#total_sale_price').attr('value', total_sale_price);
	
	var reserved_fee = $('#reserved_fee').val();
	if($.isNumeric(reserved_fee) != true) { reserved_fee = '0'; }
	
	var contract_amount = $('#contract_amount').val();
	if($.isNumeric(contract_amount) != true) { contract_amount = '0'; }
	
	var contract_percent = $('#contract_percent').val();
	if($.isNumeric(contract_percent) != true) { contract_percent = '0.00'; }
	
	if(contract_amount > 0) {
		var total_contract_amount = contract_amount;
		contract_percent = (total_contract_amount * 100) / total_sale_price;
	} else {
		var total_contract_amount = (total_sale_price * contract_percent) / 100;
	}
	
	if($.isNumeric(total_contract_amount) != true) { total_contract_amount = '0'; }
	
	$('#contract_amount').attr('value', Math.round(total_contract_amount));
	$('#contract_percent').attr('value', parseFloat(contract_percent).toFixed(2));
	
	$('#total_contract_amount_label').attr('value', total_contract_amount - reserved_fee);
	$('#total_contract_amount').attr('value', total_contract_amount - reserved_fee);
	
	var agent_commission = $('#agent_commission').val();
	if($.isNumeric(agent_commission) != true) { agent_commission = 0; }
	$('#agent_commission_label').html(agent_commission);
	
	var freelancer_commission = $('#freelancer_commission').val();
	if($.isNumeric(freelancer_commission) != true) { freelancer_commission = 0; }
	$('#freelancer_commission_label').html(freelancer_commission);
	
	var total_cost = 0;
	var costs = $('#costs').val();
	if($.isNumeric(costs) != true) { costs = 1; }
	for(i = 0; i <= costs; i++) {
		var sub_cost = $('#cost'+i+'_amount').val();
		if($.isNumeric(sub_cost) != true) { sub_cost = 0; }
		total_cost = parseInt(total_cost) + parseInt(sub_cost);
	}
	
	$('#total_cost_label').attr('value', total_cost);
	$('#other_cost_label').html(total_cost);
	$('#total_cost').attr('value', total_cost);
	
	var smf = $('#smf').val();
	if($.isNumeric(smf) != true) { smf = '0.00'; }
	
	var commission = $('#commission').val();
	if($.isNumeric(commission) != true) { commission = '0.00'; }
	
	var retained = $('#retained').val();
	if($.isNumeric(retained) != true) { retained = '0.00'; }
	
	var all_percent = (parseFloat(smf) + parseFloat(commission) + parseFloat(retained)).toFixed(2);
	if($.isNumeric(all_percent) != true) { all_percent = '0.00'; }
	
	var income = ((total_invoice_price * all_percent) / 100) - total_additional_discount;
	if($.isNumeric(income) != true) { income = '0'; }
	
	$('#income_label').html(parseFloat(income).toFixed(0));
	$('#income').attr('value', parseFloat(income).toFixed(0));
	
	var vat = (income * 7) / 107;
	if($.isNumeric(vat) != true) { vat = '0'; }
	
	$('#vat_label').html(Math.round(vat));
	$('#vat').attr('value', Math.round(vat));
	
	var wht = ((income - vat) * 3) / 100;
	if($.isNumeric(wht) != true) { wht = '0'; }
	
	$('#wht_label').html(Math.round(wht));
	$('#wht').attr('value', Math.round(wht));
	
	var total_gp = income - vat - wht - agent_commission - freelancer_commission - total_cost;
	if($.isNumeric(total_gp) != true) { total_gp = '0'; }
	
	$('#total_gp_label').attr('value', Math.round(total_gp));
	$('#total_gp').attr('value', Math.round(total_gp));
	
	var shared1_percent = $('#shared1_percent').val();
	var shared2_percent = $('#shared2_percent').val();
	var shared3_percent = $('#shared3_percent').val();
	var shared4_percent = $('#shared4_percent').val();
	
	if($.isNumeric(shared1_percent) != true) { shared1_percent = '0.00'; }
	if($.isNumeric(shared2_percent) != true) { shared2_percent = '0.00'; }
	if($.isNumeric(shared3_percent) != true) { shared3_percent = '0.00'; }
	if($.isNumeric(shared4_percent) != true) { shared4_percent = '0.00'; }
	
	shared1_percent = parseFloat(100 - (parseFloat(shared2_percent) + parseFloat(shared3_percent) + parseFloat(shared4_percent))).toFixed(2);
	if($.isNumeric(shared1_percent) != true) { shared1_percent = '0.00'; }
	
	$('#error_percent').html('');
	if(shared1_percent <= 0) {
		$('#error_percent').html('Shared No.1 cannot less than 0.00%.');
	}
	
	$('#shared1_percent_label').attr('value', shared1_percent);
	$('#shared1_percent').attr('value', shared1_percent);
	
	var shared1_amount = (total_gp * shared1_percent) / 100;
	var shared2_amount = (total_gp * shared2_percent) / 100;
	var shared3_amount = (total_gp * shared3_percent) / 100;
	var shared4_amount = (total_gp * shared4_percent) / 100;
	
	if($.isNumeric(shared1_amount) != true) { shared1_amount = '0'; }
	if($.isNumeric(shared2_amount) != true) { shared2_amount = '0'; }
	if($.isNumeric(shared3_amount) != true) { shared3_amount = '0'; }
	if($.isNumeric(shared4_amount) != true) { shared4_amount = '0'; }
	
	$('#shared1_amount_label').attr('value', Math.round(shared1_amount));
	$('#shared1_amount').attr('value', Math.round(shared1_amount));
	$('#shared2_amount_label').attr('value', Math.round(shared2_amount));
	$('#shared2_amount').attr('value', Math.round(shared2_amount));
	$('#shared3_amount_label').attr('value', Math.round(shared3_amount));
	$('#shared3_amount').attr('value', Math.round(shared3_amount));
	$('#shared4_amount_label').attr('value', Math.round(shared4_amount));
	$('#shared4_amount').attr('value', Math.round(shared4_amount));
	
	$('#personal_gp_label').attr('value', Math.round(shared1_amount));
	$('#personal_gp').attr('value', Math.round(shared1_amount));
}

$('.put_cost, .put_price, .put_reserved').bind('change', function(){
	var data_value = $(this).val();
	if($.isNumeric(data_value) != true) {
		$(this).attr('value', '0');
	}
	
	changePricing();
});

$('.put_fee').bind('change', function(){
	var data_value = $(this).val();
	if($.isNumeric(data_value) != true) {
		$(this).attr('value', '0.00');
	} else {
		$(this).attr('value', parseFloat($(this).val()).toFixed(2));
	}
	
	changePricing();
});

$('#contract_amount').bind('change', function(){
	var data_value = $(this).val();
	if($.isNumeric(data_value) != true) {
		data_value = '0';
		$('#contract_amount').attr('value', data_value);
	}
	$('#contract_percent').attr('value', '0.00');
	
	changePricing();
});

$('#contract_percent').bind('change', function(){
	var data_value = $(this).val();
	if($.isNumeric(data_value) != true) {
		data_value = '0.00';
		$('#contract_percent').attr('value', data_value);
	}
	$('#contract_amount').attr('value', '0');
	
	$('#contract_percent').attr('value', parseFloat(data_value).toFixed(2));
	
	changePricing();
});

$('.put_percent').bind('change', function(){
	var data_value = $(this).val();
	if($.isNumeric(data_value) != true) {
		data_value = '0.00';
	}
	
	$(this).attr('value', parseFloat(data_value).toFixed(2));
	
	changePricing();
});

/*----------------------------------------*/

$('#agent').bind('change', function(){
	var data_value = $(this).val();
	var agent_company = '';
	var agent_contact = '';
	var agent_phone = '';
	var agent_email = '';
	var agent_address = '';
	if(data_value == '' || data_value == 'new') {
		
	} else {
		agent_company = $('#agent option[value="'+data_value+'"]').attr('data-company');
		agent_contact = $('#agent option[value="'+data_value+'"]').attr('data-contact');
		agent_phone = $('#agent option[value="'+data_value+'"]').attr('data-phone');
		agent_email = $('#agent option[value="'+data_value+'"]').attr('data-email');
		agent_address = $('#agent option[value="'+data_value+'"]').attr('data-address');
	}
	
	console.log(agent_company);
	
	$('#agent_company').attr('value', agent_company);
	$('#agent_contact').attr('value', agent_contact);
	$('#agent_phone').attr('value', agent_phone);
	$('#agent_email').attr('value', agent_email);
	$('#agent_address').attr('value', agent_address);
});

$('#freelancer').bind('change', function(){
	var data_value = $(this).val();
	var freelancer_company = '';
	var freelancer_name = '';
	var freelancer_phone = '';
	var freelancer_email = '';
	var freelancer_address = '';
	if(data_value == '' || data_value == 'new') {
		
	} else {
		freelancer_company = $('#freelancer option[value="'+data_value+'"]').attr('data-company');
		freelancer_name = $('#freelancer option[value="'+data_value+'"]').attr('data-name');
		freelancer_phone = $('#freelancer option[value="'+data_value+'"]').attr('data-phone');
		freelancer_email = $('#freelancer option[value="'+data_value+'"]').attr('data-email');
		freelancer_address = $('#freelancer option[value="'+data_value+'"]').attr('data-address');
	}
	
	console.log(freelancer_company);
	
	$('#freelancer_company').attr('value', freelancer_company);
	$('#freelancer_name').attr('value', freelancer_name);
	$('#freelancer_phone').attr('value', freelancer_phone);
	$('#freelancer_email').attr('value', freelancer_email);
	$('#freelancer_address').attr('value', freelancer_address);
});

/*----------------------------------------*/

$('#lead_source').bind('change', function(){
	var data_value = $(this).val();
	
	$('.campaign_select').hide();
	$('.campaign_select option[value=""]').attr('selected', true);
	
	$('#other_campaign').attr('disabled', true);
	$('#other_campaign').attr('value', '');
	
	if(data_value == '') {
		$('.campaign_select[data-id=""]').show();
	} else {
		$('.campaign_select[data-id="'+data_value+'"]').show();
	}
});

$('.campaign_select').bind('change', function(){
	var data_value = $(this).val();
	
	$('#other_campaign').attr('disabled', true);
	$('#other_campaign').attr('value', '');
	if(data_value == 'other') {
		$('#other_campaign').attr('disabled', false);
	}
});

/*----------------------------------------*/

$('.additional_check').bind('click', function(){
	var data_id = $(this).attr('id');
	var data_checked = $(this).attr('checked');
	if(data_checked == 'checked') {
		$('#'+data_id+'_notes').attr('disabled', false);
	} else {
		$('#'+data_id+'_notes').attr('disabled', true);
		$('#'+data_id+'_notes').attr('value', '');
	}
});