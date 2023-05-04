const ALL_CROSS = document.getElementsByClassName("modal_frame_cross");
const ALL_FRAME = document.getElementsByClassName("modal_frame");

function ShowFrame(key)
{
    for(FRAME of ALL_FRAME)
    {
        if(FRAME.dataset.key == key)
        {
            FRAME.classList.add("active");
            document.body.style.overflow = 'hidden';
            return false;
        }
    }
}

for (CROSS of ALL_CROSS) 
{
    CROSS.onclick = function() 
    {
        document.body.style.overflow = 'auto';
        for(FRAME of ALL_FRAME)
            FRAME.classList.remove("active");
    }
}