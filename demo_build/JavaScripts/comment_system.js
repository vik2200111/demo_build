const ALL_COMMENT_BOX = document.getElementsByClassName("comment_system_box");
const ALL_INPUTS = document.getElementsByClassName("comment_system_input");
const ALL_BUTTONS = document.getElementsByClassName("comment_system_button");

let ValidId = []
for(input of ALL_INPUTS)
  ValidId.push(Number(input.dataset.comment_box_id));

function CheckValidityId(id)
{
  if(ValidId.indexOf(Number(id)) != -1) return true;
  else return false;
}


// simle_ajax start
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
// simle_ajax end

LoadComments();

for (let i = 0; i < ALL_BUTTONS.length; i++) 
{
  ALL_BUTTONS[i].onclick = function()
  {
      let curent_comment_box_id = ALL_BUTTONS[i].dataset.comment_box_id;
      if(CheckValidityId(curent_comment_box_id))
      {
        let message = document.querySelector(`input[data-comment_box_id = '${curent_comment_box_id}']`).value;
        if(message != "")
        {
            ajax.post
            (
                "/PHP/comment_system/add_comment.php",
                {
                    comment_box_id: curent_comment_box_id,
                    comment_message: message
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
                            document.querySelector(`input[data-comment_box_id = '${curent_comment_box_id}']`).value = "";
                            LoadComments();
                            break;
                        } // всё ок
                        case 2: {break;} // нету сессии
                        case 3: {break;} // ошибка добавления в бд
                        case 4: {break;} // подключения с ошибкой
                        case 5: {break;} // пустые данные 
                        default: {break;}
                    }
                  }
                }
            )
        }
        return false;
      }
  }
}

function LoadComments()
{
    for (let comment_box of ALL_COMMENT_BOX) 
    {
        let box_id = comment_box.dataset.comment_box_id;
        comment_box.innerHTML = '';
        if(CheckValidityId(box_id))
        {
            ajax.post
            (
                "/PHP/comment_system/get_comments.php",
                {
                    comment_box_id: box_id
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
                            for(comment of answer.comments)
                            {
                                let user_comment = document.createElement("div");
                                user_comment.classList.add('comment_system_user_comment');

                                let login = document.createElement("div");
                                login.appendChild(document.createTextNode(comment.login));
                                login.classList.add('comment_system_user_login');
                                
                                let message = document.createElement("div");
                                message.appendChild(document.createTextNode(comment.message));
                                message.classList.add('comment_system_user_msg');
                                
                                user_comment.appendChild(login);
                                user_comment.appendChild(message);
                                comment_box.appendChild(user_comment);
                                comment_box.scrollTop = comment_box.scrollHeight;
                            }
                            break;
                        } // всё ок
                        case 2: {break;} // нету сессии
                        case 3: {break;} // ошибка добавления в бд
                        case 4: {break;} // подключения с ошибкой
                        case 5: {break;} // пустые данные 
                        default: {break;}
                    }
                    }
                }
            ) 
        }
    }
}