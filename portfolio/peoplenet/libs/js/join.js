$(function(){
	$('.joinTap_content').hide();
	$('.joinTap_content:first').show();

	$('.member_category > ul > li').on('click', '> a', function(){
		var activeTab = $(this).parent().attr("rel");
		$('.member_category > ul > li').removeClass('active')
		$(this).parent().addClass('active');
		$('.joinTap_content').hide();
		console.log(activeTab)
		$("#" + activeTab).show();
	});

	$(document).on('click', '.service_job', function(event){
		$('.depth2').removeClass('open');
		$('.depth1 > ul > li').removeClass('active');
		$(this).addClass('active');
		$('.service_job_depth2').addClass('open');
		event.preventDefault();
	});
	$(document).on('click', '.making_job', function(event){
		$('.depth2').removeClass('open');
		$('.depth1 > ul > li').removeClass('active');
		$(this).addClass('active');
		$('.making_job_depth2').addClass('open');
		event.preventDefault();
	});
	$(document).on('click', '.it_job', function(event){
		$('.depth2').removeClass('open');
		$('.depth1 > ul > li').removeClass('active');
		$(this).addClass('active');
		$('.it_job_depth2').addClass('open');
		event.preventDefault();
	});

	$(document).on('click', '.finance_job', function(event){
		$('.depth2').removeClass('open');
		$('.depth1 > ul > li').removeClass('active');
		$(this).addClass('active');
		$('.finance_job_depth2').addClass('open');
		event.preventDefault();
	});

	$(document).on('click', '.media_job', function(event){
		$('.depth2').removeClass('open');
		$('.depth1 > ul > li').removeClass('active');
		$(this).addClass('active');
		$('.media_job_depth2').addClass('open');
		event.preventDefault();
	});

	$(document).on('click', '.education_job', function(event){
		$('.depth2').removeClass('open');
		$('.depth1 > ul > li').removeClass('active');
		$(this).addClass('active');
		$('.education_job_depth2').addClass('open');
		event.preventDefault();
	});

	$(document).on('click', '.medical_job', function(event){
		$('.depth2').removeClass('open');
		$('.depth1 > ul > li').removeClass('active');
		$(this).addClass('active');
		$('.medical_job_depth2').addClass('open');
		event.preventDefault();
	});

	$(document).on('click', '.distribution_job', function(event){
		$('.depth2').removeClass('open');
		$('.depth1 > ul > li').removeClass('active');
		$(this).addClass('active');
		$('.distribution_job_depth2').addClass('open');
		event.preventDefault();
	});

	$(document).on('click', '.build_job', function(event){
		$('.depth2').removeClass('open');
		$('.depth1 > ul > li').removeClass('active');
		$(this).addClass('active');
		$('.build_job_depth2').addClass('open');
		event.preventDefault();
	});

	$(document).on('click', '.association_job', function(event){
		$('.depth2').removeClass('open');
		$('.depth1 > ul > li').removeClass('active');
		$(this).addClass('active');
		$('.association_job_depth2').addClass('open');
		event.preventDefault();
	});

	$(document).on('click', 'input[name="industry"]', function(event){
		$('.depth3').removeClass('open')
		$('.depth3 input').removeAttr("checked")
		$(this).parent().next().addClass('open')
	});

	$(document).on('click', '.search_box', function(event){
		$(this).parent().children('.search_job').toggle()
	});


})
