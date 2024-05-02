// getting notification icon
let not_i = document.getElementById('not_i');
let a = not_i.style.color = 'green';

//setting 1.5 second interval for the effect
setInterval(() => {
    if(not_i.style.color == 'green'){
        not_i.style.color = 'red';
    }else if(not_i.style.color == 'red'){
        not_i.style.color = 'green';
    }
}, 1500);