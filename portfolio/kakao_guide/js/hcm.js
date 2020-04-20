$(function(){

	/* Depth2 Nav Open */
	$(document).on('click','.hsm-depth2-open-btn', function(){
		$(this).parent().toggleClass('hcm-active');
	});

	$(document).on('click', '.hcm-nav-btn-open', function(){
		$(this).parent().toggleClass('hcm-nav-open');
		if(!$(this).parent().hasClass('hcm-nav-open')){
			$('.hcm-depth1').children().removeClass('hcm-active');
		}
	});

	/* TABLE COLGROUP > COL COUNT */
	var win_w = $(window).width();
	var table_space = win_w - 1280 ;
	var table_th_len = $('.hcm-list-table tbody tr:first').children('td').length;
	console.log(table_th_len)
	var table_th_count = table_th_len - 1;

	$('.hcm-table-count').attr('span',table_th_count);
	$('.hcm-tabel-space').css('width',table_space);

	var table_th_len = $('.hcm-list-table2 tbody tr:first').children('td').length;
	console.log(table_th_len)
	var table_th_count = table_th_len - 1;

	$('.hcm-table-count2').attr('span',table_th_count);
	$('.hcm-tabel-space2').css('width',table_space);
	/* // TABLE COLGROUP > COL COUNT */
	
	/* scroll header fixed */
	$(window).scroll(function() {
		var win_scr_t = $(this).scrollTop();
		var header = $('header').outerHeight();
		if(!win_scr_t == 0){			
			$('header').addClass('hd_fixed');
			$('.hcm-contents').css('padding-top',header)
		}else{
			$('header').removeClass('hd_fixed');
			$('.hcm-contents').css('padding-top',0)
		}
	});

	
	$(window).resize(function(){
		/* TABLE COLGROUP > COL COUNT */
		var win_w = $(window).width();
		var table_space = win_w - 1280 ;
		var table_th_len = $('.hcm-list-table th').length;
		var table_th_count = table_th_len - 1;

		$('.hcm-table-count').attr('span',table_th_count);
		$('.hcm-tabel-space').css('width',table_space);
		/* // TABLE COLGROUP > COL COUNT */
	});
	
	
	/* favorite */
	$(document).on('click', '.hcm-favorite-btn', function(){
		$(this).parent().toggleClass('active');
	});

	/* datepicker */
	$( ".hcm-datepicker-btn" ).datepicker({
		showOn: "button",
	});

	
	var datepicker_target = $('#aa').datepicker({
		language: 'ko',
		showEvent:'none',
		todayButton: new Date(),
	}).data('datepicker');

	var datepicker_target2 = $('#bb').datepicker({
		language: 'ko',
		showEvent:'none',
		todayButton: new Date(),
	}).data('datepicker');

	$('.hcm-calnder-open').on('click', function(){
		datepicker_target.show();
	});
	$('.hcm-calnder-open2').on('click', function(){
		datepicker_target2.show();	
	});

	$('.hcm-top-btn button').on('click',function(){
		$(window).scrollTop(0);
	})
});