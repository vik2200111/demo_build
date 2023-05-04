const LINKS = document.getElementsByTagName('a');

const REPLACEMENT_LINKS = new Map
([
    ['main_page',   'index.php'],
    ['about_us',    'about_us.php'],
    ['projects',    'projects.php'],
    ['history',     'history.php'],
    ['gallery',     'gallery.php'],
    ['contacts',    '#'],
    ['archive',     '#']
]);  

for(link of LINKS)
    if(link.dataset.link_to)
        link.href = REPLACEMENT_LINKS.get(link.dataset.link_to);