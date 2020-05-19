$.support.cors = true;
$.ajax({
    type: "GET",
    url: "http://api.corona-19.kr/korea/?serviceKey=8be034799858cc6e9f95fe6b19f5bd43d",
    dataType: "jsonp",
    success : function(data){
        console.log(data)
    },
    error: function(){
        alert('통신실패');
    }
});