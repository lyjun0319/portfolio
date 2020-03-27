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
        html += "<h3 class='listTitle'>"+item.name+"</h3>";
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
    html += "<article class='company_list'>";
    html += "<h3 class='cp_name'>"+item.companyName;+"</h3>";
    html += "<p class='cp_intro'>"+item.intro+"</p>"
    html += "<div class='work_intro'>"
    html += arrWork(item.work);
    html += "</div>"
    html += "</p>"
    html += "<p class='cp_choose'>"+item.reason+"</p>"
    html += "<div class='extraBox'>";
    html += "<span class='cp_skils'>"+item.skils+"</span>",
    html += "<span class='cp_workday>"+item.workDay+"</span>",
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