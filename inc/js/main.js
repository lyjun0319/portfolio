$.ajax({
    type: "post",
    url: "/inc/json/portfolio.json",
    dataType: "JSON",
    error: function(){
        alert('통신실패');
    },
    success : function(data){
        const list = data;
        const list_len = list.length;
        for(let i = 0; i < list_len; i++){
            let arrJSON = list[i];
            let objItems = objItem(arrJSON);
            let html = listHtml(objItems);
            listInnerHtml(html);
        };
    }
});

function objItem(item){
    return {
        "name":item.name,
        "day":item.day,
        "skils": item.skils,
        "guide": item.guide ,
        "linkUrl" :item.linkUrl
    };
};

function listHtml(item){
    let html = '';
        html += "<article class='listItem'>";
        html += "<h2 class='listTitle'>"+item.name+"</h2>";
        html += "<div class='guideTxt'>";
        html += gudieText(item.guide);
        html += "</div>";
        html += "<p class='useSkill'>"+item.skils+"</p>"
        html += "<p class='listDay'>"+item.day+"</p>";
        html += "</article>";
    return html;
};

function gudieText(item){
    let guideText = '';
    for(let i = 0; i < item.length; i++){
        guideText += "<p>"+ item[i] +"</p>"
    };
    return guideText;
}

function listInnerHtml(item){
    let appendTarget = document.getElementById('portfolio_list');
    appendTarget.innerHTML += item;
}