$(function(){
    $('.AnnounceContent').hide();
    $('.AnnounceContent:first').show();
    $('.AnnounceListTab > ul > li').on('click', '> a', function(){
		var activeTab = $(this).parent().attr("rel");
		$('.AnnounceListTab > ul > li').removeClass('active')
		$(this).parent().addClass('active');
		$('.AnnounceContent').hide();
		$("#" + activeTab).show();
	});

    $('.PersonContent').hide();
    $('.PersonContent:first').show();
    $('.PersonListTab > ul > li').on('click', '> a', function(){
		var activeTab = $(this).parent().attr("rel");
		$('.PersonListTab > ul > li').removeClass('active')
		$(this).parent().addClass('active');
		$('.PersonContent').hide();
		$("#" + activeTab).show();
	});

    $('.conditionbtn').click(function(){
        $('.ChooseListPopup').css('display','block');
    });
    $('.ConditionCloseBtn').click(function(){
        $('.ChooseListPopup').css('display','none');
    });

})
