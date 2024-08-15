const open = document.getElementById('open');
const close = document.getElementById('close');
const menu = document.getElementById('menu');
const main_body = document.getElementById('main_body')

open.addEventListener('click', ()=>{
    menu.style.width = "100%"
    menu.style.display = 'block';
    main_body.style.display = 'none';
})

close.addEventListener('click', ()=>{
    menu.style.display = 'none';
    main_body.style.display = 'block';
})


const zoom = document.getElementById('zoom');
let isZoomed = false;

zoom.addEventListener('click', ()=>{
    if(isZoomed){
        main_body.style.width = "80%"
        menu.style.display = 'block';
        isZoomed = false;
    }else{
        main_body.style.width = "100%"
        menu.style.display = 'none';
        isZoomed = true;
    }
    
})