/* ===== Grobal Variable ===== */
const portfolioUrl = "/inc/json/portfolio.json";
const historyUrl = "/inc/json/history.json";

const arrPortfolio = dataParsing(portfolioUrl);
const arrHistory = dataParsing(historyUrl);
/* ===== // Grobal Variable ===== */

/* ===== Start Code ===== */
portfolioList(arrPortfolio);
mainHistoryList(arrHistory);

$(document).on('click', '.cp_Portfolio', function(e){
    const target = $(this);
    const companyName = target.parents('.company_list').find('.cp_name').text();
    portfolioList(arrPortfolio, "filter", companyName);
    animateList()
});

$('.all_ptList').on('click',function(e){
    clearList();
    portfolioList(arrPortfolio);
    animateList()
    e.preventDefault;
})
/* ===== // Start Code ===== */


/* ===== FUNCITON CODE ===== */
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
function portfolioList(data, type, name){
    const obj = data;
    const listType = "portfolio_list";
    // FILter
    if(type){
        clearList();
        const newObj = obj.filter(obj => name == obj.company);
        $.each(newObj, function(key, value){
            let _listHtml = portfolioHtml(value);
            appendListDate(_listHtml, listType);
        });
    }else{
        $.each(obj, function(key, value){
            let _listHtml = portfolioHtml(value);
            appendListDate(_listHtml, listType);
        });
    }
};

function filterPortfolio(data,target){
    const dataCompanyName = data;
}

// MAIN LOAD HISTORY LIST
function mainHistoryList(data){
    const obj = data;
    const companyHistory = obj.companyHistory;
    const myHistory = obj.myHistory;
    const listType = "cp_historyList"
    companyDate(companyHistory,listType);
};

// COMPANY DATA CHECK
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

function animateList(){
    $('#portfolio_list').children().css({
        opacity : 0,

    }).animate({
        opacity : 1
    },1000);
}
/* ===== // FUNCITON CODE ===== */