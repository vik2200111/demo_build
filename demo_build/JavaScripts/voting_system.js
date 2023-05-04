WARNING_DATA                    =       "Переданы невалидные данные!";
WARNING_LOCK                    =       "Вы уже выставили оценки данному проекту!";
WARNING_DB                      =       "База данных не отвечает!";
WARNING_UNKNOW                  =       "Возникла неизвестная ошибка!";
SUCCESS                         =       "Вы успешно проголосовали!";
WARNING_VOTE_OFF                =       "Голосование уже закончилось!";

const ALL_MARKS_BUTTONS = document.getElementsByClassName("mark_send_button");
const ALL_CHAT_SHOW_BUTTONS = document.getElementsByClassName("show_chat_button");

const status_voiting = document.getElementById("send_marks_status");

const projects_table = document.getElementsByClassName("table_with_projects");
let projects_line = [-1];
let un_confrimed_projects_line = [];

for (let i = 3; i < projects_table[0].childNodes.length; i+=2)
    projects_line.push(projects_table[0].childNodes[i].childNodes[1])
    
for (let i = 1; i < projects_line.length; i++)
    if(!projects_line[i].classList.contains('confrimed'))
        un_confrimed_projects_line.push(projects_line[i]);

let MBValidId = [];
for(input of ALL_MARKS_BUTTONS)
  MBValidId.push(Number(input.dataset.pid));

function CheckValidityIdMB(id)
{
  if(MBValidId.indexOf(Number(id)) != -1) return true;
  else return false;
}

let CBValidId = [];
for(input of ALL_CHAT_SHOW_BUTTONS)
  CBValidId.push(Number(input.dataset.comment_table_button_id));

function CheckValidityIdCB(id)
{
  if(CBValidId.indexOf(Number(id)) != -1) return true;
  else return false;
}

for (let i = 0; i < ALL_MARKS_BUTTONS.length; i++) 
{
    ALL_MARKS_BUTTONS[i].onclick = function()
    {
        let curent_pID = ALL_MARKS_BUTTONS[i].dataset.pid;
        if(CheckValidityIdMB(curent_pID))
        {
            Marks = document.querySelectorAll(`input[data-pid = '${curent_pID}']`);
            if ((Marks[0].value >= 1 && Marks[0].value <= 10) && (Marks[1].value >= 1 && Marks[1].value <= 10) && (Marks[2].value >= 1 && Marks[2].value <= 10))
            {
                ajax.post
                (
                    "/PHP/project_system/send_marks.php",
                    {
                        projectID: curent_pID,
                        mark_1: Marks[0].value,
                        mark_2: Marks[1].value,
                        mark_3: Marks[2].value
                    },
                    function(data) 
                    {
                        if(data != "")
                            {
                                let answer = JSON.parse(data);
                                switch(answer.id)
                                {
                                    case 0: 
                                    {
                                        let elem = document.querySelector(`form[data-pid = '${curent_pID}']`);

                                        elem.remove();
                                        for (let i = 0; i <= 2; i++) 
                                            Marks[i].parentElement.innerHTML = Marks[i].value;

                                        ALL_MARKS_BUTTONS[i].style.display = 'none';
                                        document.querySelector(`button[data-comment_table_button_id = '${curent_pID}']`).style.display = '';

                                        un_confrimed_projects_line[i].classList.add("confrimed");

                                        AddLineToStatusVoiting(status_voiting, SUCCESS, 0); 
                                        break;
                                    }
                                    case 1: {AddLineToStatusVoiting(status_voiting, WARNING_DATA, 1); break;}
                                    case 2: {AddLineToStatusVoiting(status_voiting, WARNING_DATA, 1); break;}
                                    case 3: {AddLineToStatusVoiting(status_voiting, WARNING_DB, 1); break;}
                                    case 6: {AddLineToStatusVoiting(status_voiting, WARNING_LOCK, 1); break;}
                                    case 7: {AddLineToStatusVoiting(status_voiting, WARNING_VOTE_OFF, 1); break;}
                                    case 8: {AddLineToStatusVoiting(status_voiting, WARNING_DATA, 1); break;}
                                    default:{AddLineToStatusVoiting(status_voiting, WARNING_UNKNOW, 1); break;}
                                }
                            }
                        else AddLineToStatusVoiting(status_voiting, WARNING_PHP);
                    }
                )
            }
        }
    }
}

for (let i = 0; i < ALL_CHAT_SHOW_BUTTONS.length; i++) 
{
    ALL_CHAT_SHOW_BUTTONS[i].onclick = function()
    {
        let curent_cID = ALL_CHAT_SHOW_BUTTONS[i].dataset.comment_table_button_id;
        if(CheckValidityIdCB(curent_cID))
        {
            let chat_table = document.querySelector(`tr[data-comment_table_box_id = '${curent_cID}']`);
            if(window.getComputedStyle(chat_table).display == 'none')
                chat_table.style.display = 'table-row';
            else chat_table.style.display = 'none';
        }
    }
}

function AddLineToStatusVoiting(status_voiting, text, type)
{
    status_voiting.innerHTML = "";
    let li = document.createElement("li");
    if(type == 0) li.classList.add("success");
    if(type == 1) li.classList.add("warning");
    li.appendChild(document.createTextNode(text));
    status_voiting.appendChild(li);
    status_voiting.style.visibility = "visible";

    setTimeout(function() 
    {
        status_voiting.style.visibility = "hidden";
    }, 7000);
}

let last_projectID = get_cookie("last_projectID")
if(last_projectID) projects_line[last_projectID].classList.add("last");

function get_cookie(cookie_name)
{
  let results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
  if (results)
    return (unescape (results[2]));
  else
    return null;
}

// simle_ajax
var ajax = {};
ajax.x = function () {
    if (typeof XMLHttpRequest !== 'undefined') {
        return new XMLHttpRequest();
    }
    var versions = [
        "MSXML2.XmlHttp.6.0",
        "MSXML2.XmlHttp.5.0",
        "MSXML2.XmlHttp.4.0",
        "MSXML2.XmlHttp.3.0",
        "MSXML2.XmlHttp.2.0",
        "Microsoft.XmlHttp"
    ];

    var xhr;
    for (var i = 0; i < versions.length; i++) {
        try {
            xhr = new ActiveXObject(versions[i]);
            break;
        } catch (e) {
        }
    }
    return xhr;
};

ajax.send = function (url, callback, method, data, async) {
    if (async === undefined) {
        async = true;
    }
    var x = ajax.x();
    x.open(method, url, async);
    x.onreadystatechange = function () {
        if (x.readyState == 4) {
            callback(x.responseText)
        }
    };
    if (method == 'POST') {
        x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    x.send(data)
};

ajax.get = function (url, data, callback, async) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    ajax.send(url + (query.length ? '?' + query.join('&') : ''), callback, 'GET', null, async)
};

ajax.post = function (url, data, callback, async) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    ajax.send(url, callback, 'POST', query.join('&'), async)
};