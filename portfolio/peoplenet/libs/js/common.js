// input type 숫자
function onlyNumber(event){
    event = event || window.event;
    var keyID = (event.which) ? event.which : event.keyCode;
    if ( (keyID >= 48 && keyID <= 57) || (keyID >= 96 && keyID <= 105) || keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 )
        return;
    else
        return false;
}
function removeChar(event) {
    event = event || window.event;
    var keyID = (event.which) ? event.which : event.keyCode;
    if ( keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 )
        return;
    else
        event.target.value = event.target.value.replace(/[^0-9]/g, "");
}
$(function(){
        //개인회원 / 기업회원 탭메

        $('.tab_content').hide();
        $('.tab_content:first').show();

        $('.login_tap ul li').click(function(){
            var activeTab = $(this).attr("rel");
            $('.login_tap ul li').removeClass('active')
            $(this).addClass('active');
            $('.tab_content').hide();
            console.log(activeTab)
            $("#" + activeTab).show();
        });

        // 스크롤 이벤트
        $(document).ready(function(){
            $('#header_search').hide();
            var win_scroll = $(window).scrollTop();
            var lately_Announcement = parseInt($('.lately_Announcement').css('top'));

            $(window).scroll(function(){
                var win_scroll = $(window).scrollTop();
                var header_h = $('#header_wrap').height();
                var newPosition = win_scroll + lately_Announcement + 'px';

                if(win_scroll > header_h){
                    $('#header_search').show();
                    $('.lately_Announcement').stop().animate({
                        'top':win_scroll + 90+'px'
                    });
                }else{
                    $('#header_search').hide();
                    $('.lately_Announcement').stop().animate({
                        'top':newPosition
                    });
                };



            });
            $(document).on('click', '.top_btn', function(){
                $('html, body').animate({
                     scrollTop:0
                 },100);
                 event.preventDefault();
            });
        });
        // 상품안내 버튼
        $('.product_title').on('click', '.product_guide_btn', function(){
            $(this).parents('.product_title').next().show();
        });
        $('.pd_guide_content').on('click', '.close_btn', function(){
            $(this).parents('.product_guide_content').hide();
        })

        $('.type_business_btn').on('click',function(){
          var url = $(this).attr("href");

          var $modal = $("<div id='type_business' />");
          $.get(url, function(result) {
            $modal.append(result).dialog({
              draggable: false,
              resizable: false,
              open: function(event, ui) {
                var $wrap = $modal.closest("div[role='dialog']");
                  $wrap.css({"width":"750px","border":"2px solid #155ed5;","top":"50%","left":"50%","margin-left":"-375px","margin-left":"-375px","margin-top":"-270px"});
              }
            });
          });
          event.preventDefault();
        });


});
