/* ===== Portfolio ===== */
$.ajax({
    type: "post",
    url: "/inc/json/portfolio.json",
    dataType: "JSON",
    error: function(){
        alert('통신실패');
    },
    success : function(data){
        const list = data;
        $.each(list, function(key, value){
            let _listHtml = listHtml(value);
            listInnerHtml(_listHtml);
        });
    }
});

function listHtml(item){
    let html = '';
        html += "<article class='listItem'>";
        html += "<h2 class='listTitle'>"+item.name+"</h2>";
        html += "<div class='guideTxt'>";
        html += gudieText(item.guide);
        html += "</div>";
        html += "<p class='useSkill'>"+item.skils+"</p>"
        html += "<div class='extra_txt'>"
        html += "<a href='"+item.linkUrl+"' class='linkUrl' target='_blank'>Link"
        html += "</a>"
        html += "<p class='listDay'>"+item.day+"</p>";
        html += "</div>"
        html += "</article>";
    return html;
};

function gudieText(item){
    let guideText = '';
    for(let i = 0; i < item.length; i++){
        guideText += "<p>"+ item[i] +"</p>"
    };
    return guideText;
};

function listInnerHtml(item){
    let appendTarget = document.getElementById('portfolio_list');
    appendTarget.innerHTML += item;
};


/* ===== Profile ===== */
$.ajax({
    type: "post",
    url: "/inc/json/history.json",
    dataType: "JSON",
    error: function(){
        alert('history 통신실패');
    },
    success : function(data){
        const obj = data;
        const companyHistory = obj.companyHistory;
        const myHistory = obj.myHistory;
        companyDate(companyHistory);
    }
});

function companyDate(arr){
    $.each(arr, function(key, value){
        const htmls = companyHtml(value);
        appendCompanyList(htmls)
    })
}

function companyHtml(item){
    let html = '';
    html += "<article class='companyList'>";
    html += "<h2>"+item.companyName;+"</h2>";
    html += "<p>"+item.intro+"</p>"
    html += "<div>"
    html += arrWork(item.work);
    html += "</p>"
    html += "<p>"+item.reason+"</p>"
    html += "<div class='extraBox'>";
    html += "<span class='skils'>"+item.skils+"</span>",
    html += "<span>"+item.workDay+"</span>",
    html += "</div>",
    html += "</article>"

    return html;
}
function arrWork(arr){
    let workHtml ='';
    $.each(arr, function(key, value){
        workHtml += "<p>"+value+"</p>";
    });
    return workHtml;
}

function appendCompanyList(item){
    let appendTarget = document.getElementById('companyHistory');
    appendTarget.innerHTML += item;
};