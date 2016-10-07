<script src="<?php echo base_url(); ?>/assets/js/apps/journals/specials/app.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/apps/journals/specials/controllers/transaction.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/apps/journals/specials/directives/transaction.js"></script>

<script>
	var summary_table = $('#specials-journal-summary-table').DataTable({
							ajax: window.location.origin+'/journals/specials/journals_summary/get',
							columns: [
										{'data': 'co_trans_id'},
										{
											mData: function(rowData, settings, fullData){
												return new Date(rowData.co_trans_date).toString('MMM d, yyyy');
											}
											
										},
										{'data': 'co_trans_doc_name'},
										{'data': 'co_journ_trans_id'},
										{'data': 'co_trans_doc_name'},
										{'data': 'co_trans_doc_no'},
										{
											mData: function(rowData, settings, fullData){
												return new Date(rowData.co_trans_doc_date).toString('MMM d, yyyy');
											}
										},
										{'data': 'bp_name'},
										{'data': 'co_bp_particulars'},
										{'data': 'co_trans_doc_pay_type'},
										{'data': 'co_trans_doc_amount_gross'},
										{'data': 'co_trans_doc_amount_netamount'},

									],
							scrollX: true,
							order: [[1, 'asc']],
							oLanguage: {
							  	sSearch: "<i class='fa fa-search'></i> Search",
							  	sLengthMenu: "Show _MENU_", 
							},
	});
	var bp_summary_table = $('#specials-bp-table').DataTable({
								ajax: window.location.origin+'/journals/specials/bp/get',
								columns: [
											{'data': 'co_bp_class'},
											{'data': 'co_bp_code'},
											{'data': 'bp_name'},
											{'data': 'co_bp_address'},
											{'data': 'co_bp_tin'},
											{'data': 'tax_1'},
											{'data': 'tax_2'},
											{'data': 'tax_3'},

										],
								scrollX: true,
								order: [[1, 'asc']],
								columnDefs: [{targets: '1', width: '100px'}, {targets: [5, 6, 7], width: '40px'}],
								oLanguage: {
								  	sSearch: "<i class='fa fa-search'></i> Search",
								  	sLengthMenu: "Show _MENU_", 
								},
	});
	var bp_transaction_details_table = $('#specials-transaction-details-table').DataTable({
							ajax: window.location.origin+'/journals/specials/bp_transaction/get?bp_id=0',
							columns: [
										{'data': 'co_trans_id'},
										{
											mData: function(rowData, settings, fullData){
												return new Date(rowData.co_trans_date).toString('MMM d, yyyy');
											}
											
										},
										{'data': 'co_trans_doc_name'},
										{'data': 'co_journ_trans_id'},
										{'data': 'co_trans_doc_no'},
										{
											mData: function(rowData, settings, fullData){
												return new Date(rowData.co_trans_doc_date).toString('MMM d, yyyy');
											}
										},
										{'data': 'bp_name'},
										{'data': 'co_bp_particulars'},
										{'data': 'co_trans_doc_pay_type'},
										{'data': 'co_trans_doc_amount_gross'},
										{'data': 'co_trans_doc_amount_netamount'},
									],
							scrollX: true,
							order: [[1, 'asc']],
							oLanguage: {
							  	sSearch: "<i class='fa fa-search'></i> Search",
							  	sLengthMenu: "Show _MENU_", 
							},
	});
</script>

<script>
	$('.title').on('click', '.cash-credit', function(){
		$('#card-2-form').slideDown('fast', function(){});
		$('.cash-credit').removeClass('btn-primary');
		$(this).addClass('btn-primary');
		
	});
</script>

<script>
	$('#specials-journal-summary-table_wrapper tbody').on('click', 'tr', function(){
		var row_data =  summary_table.row(this).data();
		$('#summary-prod-serv').html('');
		let t_prod_serv_qty = 0;
		let t_prod_serv_unit = 0;
		let t_prod_serv_unit_price = 0;
		let t_prod_serv_gross = 0;

		let t_vat_rate = 0;
		let t_vat_amount = 0;
		let t_vat_net = 0;
		let t_vat_gross =0;

		let t_discount_rate = 0;
		let t_discount_deduction = 0;

		let t_ewt_rate = 0;
		let t_ewt_tax_base = 0;
		let t_ewt_tax_withheld = 0;

		let t_fwt_rate = 0;
		let t_fwt_tax_base = 0;
		let t_fwt_tax_withheld = 0;

		let t_doc_ref_gross = 0;
		let t_doc_ref_net_amount = 0;

		let t_bank_amount = 0;

		if(row_data.prod_data.length === 0 & row_data.serv_data.length === 0){
			$('#summary-prod-serv').append("<tr>"+
												"<td colspan='6' style='padding: 8px !important; text-align: center;'>No data available in the table</td>"+
											"</tr>");
		}else{
			$.each(row_data.prod_data, function(index, data){
				$('#summary-prod-serv').append("<tr>"+
													"<td><input class='form-control' type='text' value='"+data.co_p_code+"' readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_p_description+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_prod_qty+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_prod_unit+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_prod_unitprice+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_prod_gross+"'  readonly></td>"+
													"</tr>");
				t_prod_serv_qty += (data.co_trans_prod_qty.length > 0) ? parseFloat(data.co_trans_prod_qty) : 0;
				t_prod_serv_unit += (data.co_trans_prod_unit.length > 0) ? parseFloat(data.co_trans_prod_unit) : 0;
				t_prod_serv_unit_price += (data.co_trans_prod_unitprice.length > 0) ? parseFloat(data.co_trans_prod_unitprice) : 0;
				t_prod_serv_gross += (data.co_trans_prod_gross.length > 0) ? parseFloat(data.co_trans_prod_gross) : 0;
			});
			$.each(row_data.serv_data, function(index, data){
				$('#summary-prod-serv').append("<tr>"+
													"<td><input class='form-control' type='text' value='"+data.co_s_code+"' readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_s_description+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_serv_qty+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_serv_unit+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_serv_unitprice+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_serv_gross+"'  readonly></td>"+
													"</tr>");
				t_prod_serv_qty += (data.co_trans_serv_qty.length > 0) ? parseFloat(data.co_trans_serv_qty) : 0;
				t_prod_serv_unit += (data.co_trans_serv_unit.length > 0) ? parseFloat(data.co_trans_serv_unit) : 0;
				t_prod_serv_unit_price += (data.co_trans_serv_unitprice.length > 0) ? parseFloat(data.co_trans_serv_unitprice) : 0;
				t_prod_serv_gross += (data.co_trans_serv_gross.length > 0) ? parseFloat(data.co_trans_serv_gross) : 0;
			});
		}
		
		
		$('#summary-vat').html('');
		if(row_data.vat_data.length === 0){
			$('#summary-vat').append("<tr>"+
										"<td colspan='6' style='padding: 8px !important; text-align: center;'>No data available in the table</td>"+
									"</tr>");
		}else{
			$.each(row_data.vat_data, function(index, data){
				$('#summary-vat').append("<tr>"+
								"<td><input class='form-control' type='text' value='"+data.t_code+"' readonly></td>"+
								"<td><input class='form-control' type='text' value='"+data.co_trans_vat_nature+"' readonly></td>"+
								"<td><input class='form-control' type='text' value='"+data.t_rate+"' readonly></td>"+
								"<td><input class='form-control' type='text' value='"+data.co_trans_vat_amount+"' readonly></td>"+
								"<td><input class='form-control' type='text' value='"+data.co_trans_vat_net_amount+"' readonly></td>"+
								"<td><input class='form-control' type='text' value='"+data.co_trans_vat_gross+"' readonly></td>"+
							"</tr>");
				t_vat_rate += (data.t_rate.length > 0) ? parseFloat(data.t_rate) : 0;
				t_vat_amount += (data.co_trans_vat_amount.length > 0) ? parseFloat(data.co_trans_vat_amount) : 0;
				t_vat_net += (data.co_trans_vat_net_amount.length > 0) ? parseFloat(data.co_trans_vat_net_amount) : 0;
				t_vat_gross += (data.co_trans_vat_gross.length > 0) ? parseFloat(data.co_trans_vat_gross) : 0;
			});
		}
		
		$('#summary-discount').html('');
		if(row_data.discounts_data.length === 0){
			$('#summary-discount').append("<tr>"+
											"<td colspan='5' style='padding: 8px !important; text-align: center;'>No data available in the table</td>"+
										"</tr>");
		}else{
			$.each(row_data.discounts_data, function(index, data){
				$('#summary-discount').append("<tr>"+
												"<td><input class='form-control' type='text' value='"+data.co_d_code+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_disc_nature+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_d_rate+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_disc_deduction+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_disc_scid+"' readonly></td>"+
											"</tr>");
					t_discount_rate += (data.co_d_rate.length > 0) ? parseFloat(data.co_d_rate) : 0;
					t_discount_deduction += (data.co_trans_disc_deduction.length > 0) ? parseFloat(data.co_trans_disc_deduction) : 0;
			});
		}
		
		$('#summary-ewt').html('');
		if(row_data.ewt_data.length === 0){
			$('#summary-ewt').append("<tr>"+
										"<td colspan='5' style='padding: 8px !important; text-align: center;'>No data available in the table</td>"+
									"</tr>");
		}else{
			$.each(row_data.ewt_data, function(index, data){
				$('#summary-ewt').append("<tr>"+
											"<td><input class='form-control' type='text' value='"+data.t_code+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.co_trans_ewt_nature+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.t_rate+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.t_base+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.co_trans_ewt_taxwithheld+"' readonly></td>"+
										"</tr>");
					t_ewt_rate += (data.t_rate.length > 0) ? parseFloat(data.t_rate) : 0;
					t_ewt_tax_base += (data.t_base.length > 0) ? parseFloat(data.t_base) : 0;
					t_ewt_tax_withheld += (data.co_trans_ewt_taxwithheld.length > 0) ? parseFloat(data.co_trans_ewt_taxwithheld) : 0;
			});
		}
		
		$('#summary-fwt').html('');
		if(row_data.fwt_data.length === 0){
			$('#summary-fwt').append("<tr>"+
										"<td colspan='5' style='padding: 8px !important; text-align: center;'>No data available in the table</td>"+
									"</tr>");
		}else{
			$.each(row_data.fwt_data, function(index, data){
				$('#summary-fwt').append("<tr>"+
											"<td><input class='form-control' type='text' value='"+data.t_code+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.co_trans_fwt_nature+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.t_rate+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.t_base+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.co_trans_fwt_taxwithheld+"' readonly></td>"+
										"</tr>");
					t_fwt_rate += (data.t_rate.length > 0) ? parseFloat(data.t_rate) : 0;
					t_fwt_tax_base += (data.t_base.length > 0) ? parseFloat(data.t_base) : 0;
					t_fwt_tax_withheld += (data.co_trans_fwt_taxwithheld.length > 0) ? parseFloat(data.co_trans_fwt_taxwithheld) : 0;
			});
		}
		
		$('#summary-doc-ref').html('');
		if(row_data.doc_reference_data.length === 0){
			$('#summary-doc-ref').append("<tr>"+
											"<td colspan='5' style='padding: 8px !important; text-align: center;'>No data available in the table</td>"+
										"</tr>");
		}else{
			$.each(row_data.doc_reference_data, function(index, data){
				$('#summary-doc-ref').append("<tr>"+
												"<td><input class='form-control' type='text' value='"+data.d_code+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_doc_ref_no+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_doc_docdate+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_doc_gross+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_doc_netamount+"' readonly></td>"+
											"</tr>");
					t_doc_ref_gross = data.co_trans_doc_gross;
					t_doc_ref_net_amount = data.co_trans_doc_netamount;
			});
		}
		
		$('#summary-bank').html('');
		if(row_data.bank_details_data.length === 0){
			$('#summary-bank').append("<tr>"+
										"<td colspan='6' style='padding: 8px !important; text-align: center;'>No data available in the table</td>"+
									"</tr>");
		}else{
			$.each(row_data.bank_details_data, function(index, data){
				$('#summary-bank').append("<tr>"+
												"<td><input class='form-control' type='text' value='"+data.b_code+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.b_shortname+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_b_no+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_bank_det_doc+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_bank_det_amount+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_bank_det_date+"' readonly></td>"+
											"</tr>");
				t_bank_amount += parseFloat(data.co_trans_bank_det_amount);
			});
		}
		
		$('#summary-other').html('');
		if(row_data.others_data.length === 0){
			$('#summary-other').append("<tr>"+
											"<td colspan='4' style='padding: 8px !important; text-align: center;'>No data available in the table</td>"+
										"</tr>");
		}else{
			$.each(row_data.others_data, function(index, data){
				$('#summary-other').append("<tr>"+
												"<td><input class='form-control' type='text' value='"+data.p_fname+' '+data.p_mname+' '+data.p_lname+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_verifiedby+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_approvedby+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_receivedby+"' readonly></td>"+
											"</tr>");
			});
		}

		$('#summary-journal-entries-card').find('.journal-entry').html('');
		if(row_data.je_data.length === 0){
			$('#summary-journal-entries-card').find('.journal-entry').append(`<tr>
													<td colspan='10' style='padding: 8px !important; text-align: center;'>No data available in the table</td>
												</tr>`);
		}else{
			$.each(row_data.je_data, function(index, data){
				$('#summary-journal-entries-card').find('.journal-entry').append(`<tr>
													<td><input type='' class='form-control' value='${data.co_trans_je_no}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_trans_code}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_seq_no}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_acc_code}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_acc_name}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_debit_credit}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_debit_amount}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_credit_amount}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_pcc_code}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_dept_code_name}'></td>
												</tr>`);
			});
		}

		let summary_doc_details = $('#summary-document-details-card');
		summary_doc_details.find('input[name=t_prod_serv_qty]').val(t_prod_serv_qty);
		summary_doc_details.find('input[name=t_prod_serv_unit]').val(t_prod_serv_unit);
		summary_doc_details.find('input[name=t_prod_serv_unit_price]').val(t_prod_serv_unit_price);
		summary_doc_details.find('input[name=t_prod_serv_gross]').val(t_prod_serv_gross);

		summary_doc_details.find('input[name=t_vat_rate]').val(t_vat_rate);
		summary_doc_details.find('input[name=t_vat_amount]').val(t_vat_amount);
		summary_doc_details.find('input[name=t_vat_net]').val(t_vat_net);
		summary_doc_details.find('input[name=t_vat_gross]').val(t_vat_gross);

		summary_doc_details.find('input[name=t_discount_rate]').val(t_discount_rate);
		summary_doc_details.find('input[name=t_discount_deduction]').val(t_discount_deduction);

		summary_doc_details.find('input[name=t_ewt_rate]').val(t_ewt_rate);
		summary_doc_details.find('input[name=t_ewt_tax_base]').val(t_ewt_tax_base);
		summary_doc_details.find('input[name=t_ewt_tax_withheld]').val(t_ewt_tax_withheld);

		summary_doc_details.find('input[name=t_fwt_rate]').val(t_fwt_rate);
		summary_doc_details.find('input[name=t_fwt_tax_base]').val(t_fwt_tax_base);
		summary_doc_details.find('input[name=t_fwt_tax_withheld]').val(t_fwt_tax_withheld);

		summary_doc_details.find('input[name=t_doc_ref_gross]').val(t_doc_ref_gross);
		summary_doc_details.find('input[name=t_doc_ref_net_amount]').val(t_doc_ref_net_amount);

		summary_doc_details.find('input[name=t_bank_amount]').val(t_bank_amount);
		
		console.log(summary_table.row(this).data());
		$(this).closest('table').find('tr').css('background-color', '#FFF');
		$(this).closest('table').find('tr').css('color', 'rgba(0,0,0,.87)');
		$(this).css('background-color', 'rgb(133, 150, 214)');
		$(this).css('color', '#FFF');
		$('#summary-document-details-card .card-body .collapsed-box').find('button').trigger('click');
		$('#summary-journal-entries-card.collapsed-box .box-tools').find('button').trigger('click');
		$('#summary-document.collapsed-box .box-tools').find('button').trigger('click');
	});

	$('#specials-bp-table_wrapper tbody').on('click', 'tr', function(){
		var row_data = bp_summary_table.row(this).data();
		bp_transaction_details_table.ajax.url(window.location.origin+'/journals/specials/bp_transaction/get?bp_id='+row_data.co_bp_id).load();
		$(this).closest('table').find('tr').css('background-color', '#FFF');
		$(this).closest('table').find('tr').css('color', 'rgba(0,0,0,.87)');
		$(this).css('background-color', 'rgb(133, 150, 214)');
		$(this).css('color', '#FFF');
		$('#bp-transaction-details.collapsed-box .box-tools').find('button').trigger('click');
	});

	$('#specials-transaction-details-table_wrapper tbody').on('click', 'tr', function(){
		var row_data = bp_transaction_details_table.row(this).data();

		let t_prod_serv_qty = 0;
		let t_prod_serv_unit = 0;
		let t_prod_serv_unit_price = 0;
		let t_prod_serv_gross = 0;

		let t_vat_rate = 0;
		let t_vat_amount = 0;
		let t_vat_net = 0;
		let t_vat_gross =0;

		let t_discount_rate = 0;
		let t_discount_deduction = 0;

		let t_ewt_rate = 0;
		let t_ewt_tax_base = 0;
		let t_ewt_tax_withheld = 0;

		let t_fwt_rate = 0;
		let t_fwt_tax_base = 0;
		let t_fwt_tax_withheld = 0;

		let t_doc_ref_gross = 0;
		let t_doc_ref_net_amount = 0;

		let t_bank_amount = 0;

		$('#bp-trans-prod-serv').html('');
		if(row_data.prod_data.length === 0 & row_data.serv_data.length === 0){
			$('#bp-trans-prod-serv').append("<tr><td colspan='6' style='padding: 8px !important; text-align: center;'>No data available in the table</td></tr>");
		}else{
			$.each(row_data.prod_data, function(index, data){
				$('#bp-trans-prod-serv').append("<tr>"+
													"<td><input class='form-control' type='text' value='"+data.co_p_code+"' readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_p_description+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_prod_qty+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_prod_unit+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_prod_unitprice+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_prod_gross+"'  readonly></td>"+
													"</tr>");
					t_prod_serv_qty += (data.co_trans_prod_qty.length > 0) ? parseFloat(data.co_trans_prod_qty) : 0;
					t_prod_serv_unit += (data.co_trans_prod_unit.length > 0) ? parseFloat(data.co_trans_prod_unit) : 0;
					t_prod_serv_unit_price += (data.co_trans_prod_unitprice.length > 0) ? parseFloat(data.co_trans_prod_unitprice) : 0;
					t_prod_serv_gross += (data.co_trans_prod_gross.length > 0) ? parseFloat(data.co_trans_prod_gross) : 0;
			});
			$.each(row_data.serv_data, function(index, data){
				$('#summary-prod-serv').append("<tr>"+
													"<td><input class='form-control' type='text' value='"+data.co_s_code+"' readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_s_description+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_serv_qty+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_serv_unit+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_serv_unitprice+"'  readonly></td>"+
														"<td><input class='form-control' type='text' value='"+data.co_trans_serv_gross+"'  readonly></td>"+
													"</tr>");
					t_prod_serv_qty += (data.co_trans_serv_qty.length > 0) ? parseFloat(data.co_trans_serv_qty) : 0;
					t_prod_serv_unit += (data.co_trans_serv_unit.length > 0) ? parseFloat(data.co_trans_serv_unit) : 0;
					t_prod_serv_unit_price += (data.co_trans_serv_unitprice.length > 0) ? parseFloat(data.co_trans_serv_unitprice) : 0;
					t_prod_serv_gross += (data.co_trans_serv_gross.length > 0) ? parseFloat(data.co_trans_serv_gross) : 0;
			});
		}
		
		
		$('#bp-trans-vat').html('');
		if(row_data.vat_data.length === 0){
			$('#bp-trans-vat').append("<tr><td colspan='6' style='padding: 8px !important; text-align: center;'>No data available in the table</td></tr>");
		}else{
			$.each(row_data.vat_data, function(index, data){
				$('#bp-trans-vat').append("<tr>"+
								"<td><input class='form-control' type='text' value='"+data.t_code+"' readonly></td>"+
								"<td><input class='form-control' type='text' value='"+data.co_trans_vat_nature+"' readonly></td>"+
								"<td><input class='form-control' type='text' value='"+data.t_rate+"' readonly></td>"+
								"<td><input class='form-control' type='text' value='"+data.co_trans_vat_amount+"' readonly></td>"+
								"<td><input class='form-control' type='text' value='"+data.co_trans_vat_net_amount+"' readonly></td>"+
								"<td><input class='form-control' type='text' value='"+data.co_trans_vat_gross+"' readonly></td>"+
							"</tr>");
					t_vat_rate += (data.t_rate.length > 0) ? parseFloat(data.t_rate) : 0;
					t_vat_amount += (data.co_trans_vat_amount.length > 0) ? parseFloat(data.co_trans_vat_amount) : 0;
					t_vat_net += (data.co_trans_vat_net_amount.length > 0) ? parseFloat(data.co_trans_vat_net_amount) : 0;
					t_vat_gross += (data.co_trans_vat_gross.length > 0) ? parseFloat(data.co_trans_vat_gross) : 0;
			});
		}
		
		$('#bp-trans-discount').html('');
		if(row_data.discounts_data.length === 0){
			$('#bp-trans-discount').append("<tr><td colspan='5' style='padding: 8px !important; text-align: center;'>No data available in the table</td></tr>");
		}else{
			$.each(row_data.discounts_data, function(index, data){
				$('#bp-trans-discount').append("<tr>"+
												"<td><input class='form-control' type='text' value='"+data.co_d_code+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_disc_nature+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_d_rate+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_disc_deduction+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_disc_scid+"' readonly></td>"+
											"</tr>");
					t_discount_rate += (data.co_d_rate.length > 0) ? parseFloat(data.co_d_rate) : 0;
					t_discount_deduction += (data.co_trans_disc_deduction.length > 0) ? parseFloat(data.co_trans_disc_deduction) : 0;
			});
		}
		
		$('#bp-trans-ewt').html('');
		if(row_data.ewt_data.length === 0){
			$('#bp-trans-ewt').append("<tr><td colspan='5' style='padding: 8px !important; text-align: center;'>No data available in the table</td></tr>");
		}else{
			$.each(row_data.ewt_data, function(index, data){
				$('#bp-trans-ewt').append("<tr>"+
											"<td><input class='form-control' type='text' value='"+data.t_code+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.co_trans_ewt_nature+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.t_rate+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.t_base+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.co_trans_ewt_taxwithheld+"' readonly></td>"+
										"</tr>");
					t_ewt_rate += (data.t_rate.length > 0) ? parseFloat(data.t_rate) : 0;
					t_ewt_tax_base += (data.t_base.length > 0) ? parseFloat(data.t_base) : 0;
					t_ewt_tax_withheld += (data.co_trans_ewt_taxwithheld.length > 0) ? parseFloat(data.co_trans_ewt_taxwithheld) : 0;
			});
		}
		
		$('#bp-trans-fwt').html('');
		if(row_data.fwt_data.length === 0){
			$('#bp-trans-fwt').append("<tr><td colspan='5' style='padding: 8px !important; text-align: center;'>No data available in the table</td></tr>");
		}else{
			$.each(row_data.fwt_data, function(index, data){
				$('#bp-trans-fwt').append("<tr>"+
											"<td><input class='form-control' type='text' value='"+data.t_code+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.co_trans_fwt_nature+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.t_rate+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.t_base+"' readonly></td>"+
											"<td><input class='form-control' type='text' value='"+data.co_trans_fwt_taxwithheld+"' readonly></td>"+
										"</tr>");
					t_fwt_rate += (data.t_rate.length > 0) ? parseFloat(data.t_rate) : 0;
					t_fwt_tax_base += (data.t_base.length > 0) ? parseFloat(data.t_base) : 0;
					t_fwt_tax_withheld += (data.co_trans_fwt_taxwithheld.length > 0) ? parseFloat(data.co_trans_fwt_taxwithheld) : 0;
			});
		}
		
		$('#bp-trans-doc-ref').html('');
		if(row_data.doc_reference_data.length === 0){
			$('#bp-trans-doc-ref').append("<tr><td colspan='5' style='padding: 8px !important; text-align: center;'>No data available in the table</td></tr>");
		}else{
			$.each(row_data.doc_reference_data, function(index, data){
				$('#bp-trans-doc-ref').append("<tr>"+
												"<td><input class='form-control' type='text' value='"+data.d_code+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_doc_ref_no+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_doc_docdate+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_doc_gross+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_doc_netamount+"' readonly></td>"+
											"</tr>");
				t_doc_ref_gross = data.co_trans_doc_gross;
				t_doc_ref_net_amount = data.co_trans_doc_netamount;
			});
		}
		
		$('#bp-trans-bank').html('');
		if(row_data.bank_details_data.length === 0){
			$('#bp-trans-bank').append("<tr><td colspan='6' style='padding: 8px !important; text-align: center;'>No data available in the table</td></tr>");
		}else{
			$.each(row_data.bank_details_data, function(index, data){
				$('#bp-trans-bank').append("<tr>"+
												"<td><input class='form-control' type='text' value='"+data.b_code+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.b_shortname+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_b_no+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_bank_det_doc+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_bank_det_amount+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_bank_det_date+"' readonly></td>"+
											"</tr>");
					t_bank_amount += parseFloat(data.co_trans_bank_det_amount);
			});
		}
		
		$('#bp-trans-other').html('');
		if(row_data.others_data.length === 0){
			$('#bp-trans-other').append("<tr><td colspan='4' style='padding: 8px !important; text-align: center;'>No data available in the table</td></tr>");
		}else{
			$.each(row_data.others_data, function(index, data){
				$('#bp-trans-other').append("<tr>"+
												"<td><input class='form-control' type='text' value='"+data.p_fname+' '+data.p_mname+' '+data.p_lname+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_verifiedby+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_approvedby+"' readonly></td>"+
												"<td><input class='form-control' type='text' value='"+data.co_trans_receivedby+"' readonly></td>"+
											"</tr>");
			});
		}

		$('#bp-journal-entries').find('.journal-entry').html('');
		if(row_data.je_data.length === 0){
			$('#bp-journal-entries').find('.journal-entry').append(`<tr>
													<td colspan='10' style='padding: 8px !important; text-align: center;'>No data available in the table</td>
												</tr>`);
		}else{
			$.each(row_data.je_data, function(index, data){
				$('#bp-journal-entries').find('.journal-entry').append(`<tr>
													<td><input type='' class='form-control' value='${data.co_trans_je_no}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_trans_code}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_seq_no}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_acc_code}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_acc_name}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_debit_credit}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_debit_amount}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_je_credit_amount}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_pcc_code}'></td>
													<td><input type='' class='form-control' value='${data.co_trans_dept_code_name}'></td>
												</tr>`);
			});
		}

		let bp_document_details = $('#bp-document-details');
		bp_document_details.find('input[name=t_prod_serv_qty]').val(t_prod_serv_qty);
		bp_document_details.find('input[name=t_prod_serv_unit]').val(t_prod_serv_unit);
		bp_document_details.find('input[name=t_prod_serv_unit_price]').val(t_prod_serv_unit_price);
		bp_document_details.find('input[name=t_prod_serv_gross]').val(t_prod_serv_gross);

		bp_document_details.find('input[name=t_vat_rate]').val(t_vat_rate);
		bp_document_details.find('input[name=t_vat_amount]').val(t_vat_amount);
		bp_document_details.find('input[name=t_vat_net]').val(t_vat_net);
		bp_document_details.find('input[name=t_vat_gross]').val(t_vat_gross);

		bp_document_details.find('input[name=t_discount_rate]').val(t_discount_rate);
		bp_document_details.find('input[name=t_discount_deduction]').val(t_discount_deduction);

		bp_document_details.find('input[name=t_ewt_rate]').val(t_ewt_rate);
		bp_document_details.find('input[name=t_ewt_tax_base]').val(t_ewt_tax_base);
		bp_document_details.find('input[name=t_ewt_tax_withheld]').val(t_ewt_tax_withheld);

		bp_document_details.find('input[name=t_fwt_rate]').val(t_fwt_rate);
		bp_document_details.find('input[name=t_fwt_tax_base]').val(t_fwt_tax_base);
		bp_document_details.find('input[name=t_fwt_tax_withheld]').val(t_fwt_tax_withheld);

		bp_document_details.find('input[name=t_doc_ref_gross]').val(t_doc_ref_gross);
		bp_document_details.find('input[name=t_doc_ref_net_amount]').val(t_doc_ref_net_amount);

		bp_document_details.find('input[name=t_bank_amount]').val(t_bank_amount);


		$(this).closest('table').find('tr').css('background-color', '#FFF');
		$(this).closest('table').find('tr').css('color', 'rgba(0,0,0,.87)');
		$(this).css('background-color', 'rgb(133, 150, 214)');
		$(this).css('color', '#FFF');
		$('#bp-document-details.collapsed-box .box-tools').find('button').trigger('click');
		$('#bp-journal-entries.collapsed-box .box-tools').find('button').trigger('click');
		$('#bp-document.collapsed-box .box-tools').find('button').trigger('click');
	});
	
</script>
