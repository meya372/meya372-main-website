const close_search = document.getElementById('close_search');
const searchIcon = document.getElementById('search_icon');
const search_div = document.getElementById('search_div');

searchIcon.addEventListener('click', ()=>{
    search_div.style.display = 'block';
})

close_search.addEventListener('click', ()=>{
    search_div.style.display = 'none';
})