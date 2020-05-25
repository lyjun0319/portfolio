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
    animateList();
    const win_w = deviceChk();
    if(win_w < 751){
        $('#portfolio').addClass('open');
    }
});

$('.all_ptList').on('click',function(e){
    clearList();
    portfolioList(arrPortfolio);
    animateList()
    e.preventDefault;
})

$('.flaticon-close').on('click', function(){
    $(this).parents('#portfolio').removeClass('open');
})
/* ===== // Start Code ===== */

/* ===== FUNCITON CODE ===== */
//PORTFOLIO & HISTORY AJAX RETURN
function dataParsing(links){
    let newData = new Array();
    $.ajax({
        type: "get",
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
        portfolioData(newObj, listType);
    }else{
        portfolioData(obj, listType);
    }
};

// MAIN LOAD HISTORY LIST
function mainHistoryList(data){
    const obj = data;
    const companyHistory = obj.companyHistory;
    const myHistory = obj.myHistory;
    const listType = ["cp_historyList","my_historyList"];
    companyData(companyHistory, listType[0]);
    myHistoryData(myHistory, listType[1]);
};

// PORTFOLIO DATA CHECK
function portfolioData(arr, listType){
    $.each(arr, function(idx, value){
        let _listHtml = portfolioHtml(value);
        appendListDate(_listHtml, listType);
    });
}

// COMPANY DATA CHECK
function companyData(arr, listType){
    $.each(arr, function(idx, value){
        const htmls = companyHtml(value);
        appendListDate(htmls, listType);
    });
};

//MYHISTORY DATA CHECK
function myHistoryData(arr, listType){
    $.each(arr, function(idx, value){
        myHistoryHtml(value)
    });
}

// PORTFOLIO HTML
function portfolioHtml(item){
    const {name, skils, guide, linkUrl, day} = item;
    let html = '';
    html += "<article class='listItem'>";
    html += "<h3 class='listTitle'>"+name+"</h3>";
    html += "<p class='useSkill'>"+skils+"</p>";
    html += "<div class='guideTxt'>";
    html += arrWork(guide, "portfolio");
    html += "</div>";
    html += "<div class='extra_txt'>";
    if(linkUrl){
        html += "<a href='"+linkUrl+"'class='linkUrl' target='_blank'>Link</a>";
    }
    html += "<p class='listDay'>"+day+"</p>";
    html += "</div>";
    html += "</article>";
    return html;
};

// COMPANY HTML
function companyHtml(item){
    const {link, companyName, workDay, skils, intro, reason, work} = item;
    let html = '';
    html += "<article class='company_list'>";
    html += "<a href='"+link+"'>PORJECT VIEW</a>";
    html += "<div class='list_head'>";
    html += "<h3 class='cp_name'>"+companyName+"</h3>";
    html += "<p class='cp_workday'>"+workDay+"</p>";
    html += "</div>";
    html += "<p class='cp_skils'>"+skils+"</p>";
    html += "<p class='cp_intro'>"+intro+"</p>";
    html += "<p class='cp_choose'>"+reason+"</p>";
    html += "<div class='work_intro'>";
    html += arrWork(work, "company");
    html += "</div>";
    html += "</article>";
    return html;
};

function myHistoryHtml(item){
    let html = "";
        html = "";
    return html;
}

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

function deviceChk(){
    return $(window).width();
}
/* ===== // FUNCITON CODE ===== */