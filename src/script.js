const main_img1 = document.getElementById('main_img1');
const main_img2 = document.getElementById('main_img2');
const main_img3 = document.getElementById('main_img3');
const main_img4 = document.getElementById('main_img4');
const main_img5 = document.getElementById('main_img5');
const main_text1 = document.getElementById('main_text1');
const main_text2 = document.getElementById('main_text2');
const main_text3 = document.getElementById('main_text3');
const main_text4 = document.getElementById('main_text4');
const main_text5 = document.getElementById('main_text5');
const prev = document.getElementById('prev');
const next = document.getElementById('next');
const circle_1 = document.querySelector('.pagination>span:first-child');
const circle_5 = document.querySelector('.pagination>span:last-child');


function hide() {
    let imgs = document.querySelectorAll('.main-img img');
    for (let i = 0; i < imgs.length; i++) {
        imgs[i].style.display = 'none';
    }

    let texts = document.getElementsByClassName('main-text');
    for (let i = 0; i < texts.length; i++) {
        texts[i].style.display = 'none';
    }
}


// main_img1.style.display = 'none';

// setInterval(() => {
//     if(main_img1.style.display == 'none'){
//         main_img1.style.display = 'inline';
//         main_img2.style.display = 'none';
//     }else{
//         main_img2.style.display = 'inline';
//         main_img1.style.display = 'none';
//     }
// }, 8000);
    
function next_circle(){
    let active = document.getElementById('active');
    if(active !== circle_5){
        active.removeAttribute('id', 'active');
        active.nextElementSibling.setAttribute('id', 'active');
    }else if(active === circle_5){
        active.removeAttribute('id', 'active');
        circle_1.setAttribute('id', 'active');
    }
}

function prev_circle(){
    let active = document.getElementById('active');
    if(active !== circle_1){
        active.removeAttribute('id', 'active');
        active.previousElementSibling.setAttribute('id', 'active');
    }else if(active === circle_1){
        active.removeAttribute('id', 'active');
        circle_5.setAttribute('id', 'active');
    }
}

let current_imgnum = 1;
prev.addEventListener('click',prev_content);

next.addEventListener('click',next_content);

function prev_content() {
    if(current_imgnum === 1){
        hide();
        prev_circle();
        main_img5.style.display = 'inline';
        main_text5.style.display = 'inline';
        current_imgnum = 5;
    }else if(current_imgnum === 2){
        hide();
        prev_circle();
        main_img1.style.display = 'inline';
        main_text1.style.display = 'inline';
        current_imgnum = 1;
    }else if(current_imgnum === 3){
        hide();
        prev_circle();
        main_img2.style.display = 'inline';
        main_text2.style.display = 'inline';
        current_imgnum = 2;
    }else if(current_imgnum === 4){
        hide();
        prev_circle();
        main_img3.style.display = 'inline';
        main_text3.style.display = 'inline';
        current_imgnum = 3;
    }else if(current_imgnum === 5){
        hide();
        prev_circle();
        main_img4.style.display = 'inline';
        main_text4.style.display = 'inline';
        current_imgnum = 4;
    }
}

function next_content() {
    if(current_imgnum === 1){
        hide();
        next_circle();
        main_img2.style.display = 'inline';
        main_text2.style.display = 'inline';
        current_imgnum = 2;
    }else if(current_imgnum === 2){
        hide();
        next_circle();
        main_img3.style.display = 'inline';
        main_text3.style.display = 'inline';
        current_imgnum = 3;
    }else if(current_imgnum === 3){
        hide();
        next_circle();
        main_img4.style.display = 'inline';
        main_text4.style.display = 'inline';
        current_imgnum = 4;
    }else if(current_imgnum === 4){
        hide();
        next_circle();
        main_img5.style.display = 'inline';
        main_text5.style.display = 'inline';
        current_imgnum = 5;
    }else if(current_imgnum === 5){
        hide();
        next_circle();
        main_img1.style.display = 'inline';
        main_text1.style.display = 'inline';
        current_imgnum = 1;
    }
}
