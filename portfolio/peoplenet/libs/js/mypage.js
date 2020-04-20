$(function(){
    $(document).ready(function(){
        $('.MajorList li').hide();
        $('.MajorList li:first-child').show();

        $('.ResumeContent').on('click','.MajorPlusBtn',function(event){
             $(this).parent().next().show()
        });

        $('.ResumeContent').on('click', '.MajorMinusBtn', function(event){
            $(this).parent().hide();
        });

        $('.AcademicTableListPluse').on('click', '.ATLPButton', function(event){
            var University = $('.ResumeTableInner .University').clone();
            $('.ResumeTableInner').append(University);
        });

        $('.UniversityTD').on('click', '.UniversityDelet', function(event){
            $(this).parents('.University').remove();
        });
        $('#filer_input').filer();

        $('.Portfolio').on('click', '.PortfolioPluseBtn', function(event){
            $('.PtPopup').css('display','block');
        });

        $('.PtPopup .CloseBtn').on('click', '> a', function(event){
            $(this).parents('.PtPopup').css('display','none')
        });

        $('.AddInfoChoose .AddList li label').unbind('click').bind('click', function(){
            var idx= $(this).parent().index();
            console.log(idx)
            $('.AddListContent').eq(idx).toggle();
        })

    });
});
