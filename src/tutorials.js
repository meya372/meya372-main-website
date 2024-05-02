
const likes = document.getElementsByClassName('like')
const dislikes = document.getElementsByClassName('dislike');
const claps = document.getElementsByClassName('clap');
const read_mores = document.getElementsByClassName('read_more');
const articles = document.getElementsByClassName('article');



for (let i = 0; i < likes.length; i++) {
    likes[i].addEventListener('click', ()=>{
        likes[i].style.animation = 'shake .1s 4 alternate';
        likes[i].style.color = 'green';
        claps[i].style.color = '#454';
        dislikes[i].style.color = '#456';
        dislikes[i].style.animation = 'none';
        claps[i].style.animation = 'none';
    });
}

for (let i = 0; i < dislikes.length; i++) {
    dislikes[i].addEventListener('click', ()=>{
        dislikes[i].style.animation = 'shake .1s 4 alternate';
        dislikes[i].style.color = 'red';
        likes[i].style.color = '#454';
        claps[i].style.color = '#456';
        likes[i].style.animation = 'none';
        claps[i].style.animation = 'none';
    });
}

for (let i = 0; i < claps.length; i++) {
    claps[i].addEventListener('click', ()=>{
        claps[i].style.animation = 'shake .1s 4 alternate';
        claps[i].style.color = 'blue';
        likes[i].style.color = '#454';
        dislikes[i].style.color = '#456';
        likes[i].style.animation = 'none';
        dislikes[i].style.animation = 'none';
    });
}

for (let i = 0; i < read_mores.length; i++) {
    articles[i].style.height = '50px';
    read_mores[i].addEventListener('click', ()=>{
        if (articles[i].style.height === '50px') {
            articles[i].style.height= 'auto';
            read_mores[i].innerHTML = 'minimize';
        } else {
            articles[i].style.height = '50px';
            read_mores[i].innerHTML = 'read more...';
        }
    });
}
