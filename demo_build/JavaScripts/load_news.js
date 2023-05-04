const JSON_LINK = "/resources/JSONS/main_page/news_list.json";
const NEWS_BOX = document.getElementById("news_box_1");

readTextFile(JSON_LINK, function(text)
{
    let All_News = JSON.parse(text);
    for(news of All_News["news_list"])
        LoadPost(NEWS_BOX, news[0], news[1])
});

function readTextFile(file, callback) 
{
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}

function LoadPost(element, post_id, hash)
{
    let post_box = document.createElement('div');
    post_box.id = post_id;
    post_box.className = "post_news";
    element.appendChild(post_box);

    let id_parts = post_id.split("_");
    VK.Widgets.Post(post_id, id_parts[2], id_parts[3], hash);

    post_box.removeAttribute("style");
}