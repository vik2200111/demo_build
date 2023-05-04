function Send_Question(id)
{
    for(box of document.getElementsByClassName("contact_question"))
    {
        if(box.dataset.q_box_id == id)
        {
            if(box.value.length >= 10 && box.value.length < 450)
            {
                DelRedBorder(box);
                ajax.post
                (
                    "/PHP/question_system/send_question.php",
                    {
                        user_question: box.value
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
                                    box.value = "";
                                    break;
                                }
                                default: {SetRedBorder(box); break;}
                            }
                        }
                        else SetRedBorder(box);
                    }
                )
            }
            else
            {
                SetRedBorder(box); 
                return false;
            }     
        }
    }
    return false;
}

function SetRedBorder(elem)
{
    elem.style.boxShadow = "0 0 15px #f00";
}

function DelRedBorder(elem)
{
    elem.style.boxShadow = "";
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