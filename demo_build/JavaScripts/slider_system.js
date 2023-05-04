const SLIDES = document.getElementsByClassName('slider-item');
const BUTTONS = document.getElementsByClassName('button');
const DOTS_BLOCK = document.getElementsByClassName('slider_dots');
const DESCRIPTIONS = document.getElementsByClassName('slider-item-description');

DotsInit();
const DOTS = document.getElementsByClassName('dote');

let CurentSlide = 0;
ChangeSlide(CurentSlide);
ChangeDote(CurentSlide);
ChangeDescription(CurentSlide);

BUTTONS[1].onclick = function() 
{
    if(CurentSlide >= SLIDES.length) CurentSlide = 0;
    ++CurentSlide;
    ChangeSlide(CurentSlide);
    ChangeDote(CurentSlide);
    ChangeDescription(CurentSlide);
};

BUTTONS[0].onclick = function() 
{
    if(CurentSlide <= 0) CurentSlide = SLIDES.length;
    --CurentSlide;
    ChangeSlide(CurentSlide);
    ChangeDote(CurentSlide);
    ChangeDescription(CurentSlide);
};

for (let i = 0; i < DOTS.length; i++) 
{
    DOTS[i].onclick = function() 
    {
        CurentSlide = i;
        ChangeSlide(CurentSlide);
        ChangeDote(CurentSlide);
        ChangeDescription(CurentSlide);
    };
}

function ChangeSlide(id)
{
    for(slide of SLIDES)
        slide.style.opacity = 0;
    try {SLIDES[id].style.opacity = 1;}
    catch(TypeError) {SLIDES[0].style.opacity = 1;}
}

function ChangeDescription(id)
{
    for(desc of DESCRIPTIONS)
        desc.style.opacity = 0;
    try {DESCRIPTIONS[id].style.opacity = 1;}
    catch(TypeError) {DESCRIPTIONS[0].style.opacity = 1;}
}


function ChangeDote(id)
{
    for(dote of DOTS)
        dote.classList.remove("active");
    try {DOTS[id].classList.add("active");}
    catch(TypeError) {DOTS[0].classList.add("active");}
}

function DotsInit()
{
    for (let i = 0; i < SLIDES.length; i++) 
    {
        const dote = document.createElement('div');
        dote.classList.add('dote');
        DOTS_BLOCK[0].appendChild(dote);
    }
}

// ----auto_slider----
const MAIN_CONTAINER = document.getElementsByClassName('main_slider_container');
let isAktive = false;
const DELAY = 8000;

MAIN_CONTAINER[0].onmouseover = function() {isAktive = true;};
MAIN_CONTAINER[0].onmouseout = function() {isAktive = false;};

setInterval(function() 
{
    if(!isAktive)
    {
        if(CurentSlide >= SLIDES.length) CurentSlide = 0;
        ++CurentSlide;
        ChangeSlide(CurentSlide);
        ChangeDote(CurentSlide);
        ChangeDescription(CurentSlide);
    }
}, DELAY);