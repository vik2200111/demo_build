WARNING_PASS                    =       "Неверный формат пароля";
WARNING_LOGIN                   =       "Неверный формат логина";
WARNING_EMAIL                   =       "Неверный формат почты";
WARNING_PHP                     =       "PHP не отвечает";
WARNING_ACCOUNT_EXISTS          =       "Такой аккаунт уже существует";
WARNING_WRONG_PASS_OR_LOGIN     =       "Неверный логин или пароль";
WARNING_DB                      =       "База данных не отвечает";
WARNING_DATA                    =       "Переданы неверные данные";
WARNING_CREATE_ACC              =       "Ошибка при создании аккаунта";
WARNING_VALID_MAIL              =       "Вы ввели не верифицированною почту или данная почта уже используеться";

function RegClick()
{
    isRight = true;

    let user_login = document.getElementById("reg_user_login");
    let user_pass = document.getElementById("reg_user_pass");
    let user_email = document.getElementById("reg_user_email");
    let status = document.getElementById("reg_status");
    status.innerHTML = "";

    if(!user_login.value.match(/^[A-z0-9_-]{3,20}$/))
    {
        AddLineToStatus(status, WARNING_LOGIN);
        isRight = false;
    }
    if(!user_pass.value.match(/^[A-z0-9_-]{6,25}$/))
    {
        AddLineToStatus(status, WARNING_PASS);
        isRight = false;
    }
    if(!user_email.value.length <=129 && 
       !user_email.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
    {
        AddLineToStatus(status, WARNING_EMAIL);
        isRight = false;
    }
    if(isRight)
    {
        ajax.post
        (
            "/PHP/reg_system/registration.php",
            {
                user_login: user_login.value,
                user_pass: user_pass.value,
                user_email: user_email.value
            },
            function(data) 
            {
                if(data != "")
                {
                    let answer = JSON.parse(data);
                    switch(answer.id)
                    {
                        case 1:
                            {
                                user_login.value = "";
                                user_pass.value = "";
                                user_email.value = "";
                                ToAut(); 
                                break;
                            }
                        case 2: {AddLineToStatus(status, WARNING_ACCOUNT_EXISTS); break;}
                        case 3: {AddLineToStatus(status, WARNING_CREATE_ACC); break;}
                        case 4: {AddLineToStatus(status, WARNING_DB); break;}
                        case 5: {AddLineToStatus(status, WARNING_DATA); break;}
                        case 6: {AddLineToStatus(status, WARNING_VALID_MAIL); break;}
                        default: {AddLineToStatus(status, WARNING_PHP); break;}
                    }
                }
                else AddLineToStatus(status, WARNING_PHP);
            }
        )
    }
    return false;
}

function AutClick()
{
    isRight = true;

    let user_login = document.getElementById("aut_user_login");
    let user_pass = document.getElementById("aut_user_pass");
    let status = document.getElementById("aut_status");
    status.innerHTML = "";

    if(!user_login.value.match(/^[A-z0-9_-]{3,20}$/))
    {
        AddLineToStatus(status, WARNING_LOGIN);
        isRight = false;
    }
    if(!user_pass.value.match(/^[A-z0-9_-]{6,25}$/))
    {
        AddLineToStatus(status, WARNING_PASS);
        isRight = false;
    }

    if(isRight)
    {
        ajax.post
        (
            "/PHP/reg_system/authorization.php",
            {
                user_login: user_login.value,
                user_pass: user_pass.value
            },
            function(data) 
            {
                if(data != "")
                {
                    let answer = JSON.parse(data);
                    switch(answer.id)
                    {
                        case 1:
                            {
                                document.location.reload();
                                break;
                            }
                        case 2: {AddLineToStatus(status, WARNING_WRONG_PASS_OR_LOGIN); break;}
                        case 4: {AddLineToStatus(status, WARNING_DB); break;}
                        case 5: {AddLineToStatus(status, WARNING_DATA); break;}
                        default: {AddLineToStatus(status, WARNING_PHP); break;}
                    }
                }
                else AddLineToStatus(status, WARNING_PHP);
            }
        )
    }
    return false;
}

function AddLineToStatus(status, text)
{
    let li = document.createElement("li");
    li.appendChild(document.createTextNode(text));
    status.appendChild(li);
}

function ToReg()
{
    let status = document.getElementById("aut_status");
    status.innerHTML = "";
    document.getElementById("aut_user_login").value = "";
    document.getElementById("aut_user_pass").value = "";
    document.getElementById('reg_blok').hidden = false;
    document.getElementById('aut_blok').hidden = true;
}
function ToAut()
{
    let status = document.getElementById("reg_status");
    status.innerHTML = "";
    document.getElementById("reg_user_login").value = "";
    document.getElementById("reg_user_pass").value = "";
    document.getElementById("reg_user_email").value = "";
    document.getElementById('aut_blok').hidden = false;
    document.getElementById('reg_blok').hidden = true;
}

function user_exit()
{
    ajax.post
        (
            "/PHP/reg_system/exit.php",
            {}, function(data) {document.location.reload();}
        )
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