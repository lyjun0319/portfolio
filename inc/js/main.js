const portfolioUrl = "/inc/json/portfolio.json";
const historyUrl = "/inc/json/history.json";

const arrPortfolio = dataParsing(portfolioUrl);
const arrHistory = dataParsing(historyUrl);

mainPortfolioList(arrPortfolio);
mainHistoryList(arrHistory);

$(document).on('click', '.cp_Portfolio', function(e){
    clearList();
})

//PORTFOLIO & HISTORY AJAX RETURN
function dataParsing(links){
    let newData = new Array();
    $.ajax({
        type: "post",
        url: links,
        async: false,
        dataType: "JSON",
        success : function(data){
            newData = data;
        },
        error: function(){
            alert('통신실패');
        }
    });
    return newData;
}

// MAIN LOAD PORTFOLIO LIST
function mainPortfolioList(data){
    const obj = data;
    const listType = "portfolio_list";
    $.each(obj, function(key, value){
        let _listHtml = portfolioHtml(value);
        appendListDate(_listHtml, listType);
    });
}


// MAIN LOAD HISTORY LIST
function mainHistoryList(data){
    const obj = data;
    const companyHistory = obj.companyHistory;
    const myHistory = obj.myHistory;
    const listType = "cp_historyList"
    companyDate(companyHistory,listType);
}

function companyDate(arr, listType){
    $.each(arr, function(key, value){
        const htmls = companyHtml(value);
        appendListDate(htmls, listType);
    });
};

// PORTFOLIO HTML
function portfolioHtml(item){
    let html = '';
    html += "<article class='listItem'>";
    html += "<h3 class='listTitle'>"+item.name+"</h3>";
    html += "<div class='guideTxt'>";
    html += arrWork(item.guide, "portfolio");
    html += "</div>";
    html += "<p class='useSkill'>"+item.skils+"</p>";
    html += "<div class='extra_txt'>";
    html += "<a href='"+item.linkUrl+"'class='linkUrl' target='_blank'>Link</a>";
    html += "<p class='listDay'>"+item.day+"</p>";
    html += "</div>";
    html += "</article>";
    return html;
};

// COMPANY HTML
function companyHtml(item){
    let html = '';
    html += "<article class='company_list'>";
    html += "<a href='"+item.link+"'>PORJECT VIEW</a>";
    html += "<div class='list_head'>";
    html += "<h3 class='cp_name'>"+item.companyName+"</h3>";
    html += "<p class='cp_workday'>"+item.workDay+"</p>";
    html += "</div>";
    html += "<p class='cp_skils'>"+item.skils+"</p>";
    html += "<p class='cp_intro'>"+item.intro+"</p>";
    html += "<p class='cp_choose'>"+item.reason+"</p>";
    html += "<div class='work_intro'>";
    html += arrWork(item.work, "company");
    html += "</div>";
    html += "</article>";
    return html;
};

function arrWork(arr, type){
    let workHtml ='';
    $.each(arr, function(key, value){
        workHtml += "<p><span class='extra_dot'></span><span>"+value+"</span></p>";
    });
    type == "company" ? 
        workHtml += "<button type='button' class='cp_Portfolio'>Portfolio View</button>" : undefined;
    return workHtml;
};

function appendListDate(item, listType){
    const appendTarget = document.getElementById(listType);
    appendTarget.innerHTML += item;
};

function clearList(){
    const portfolioTarget = document.getElementById('portfolio_list');
    portfolioTarget.innerHTML = '';
}


