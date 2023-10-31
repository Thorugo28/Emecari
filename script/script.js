let list = document.querySelector( '.slider .list');
let itens = document.querySelectorAll('.slider .list .item');
let dot = document.querySelectorAll('.slider .dots li');
let nxt = document.getElementById('nxt');
let prv = document.getElementById('prv');

let active = 0;
let itemLength = itens.length - 1;


/* Reconhecimento e funcionalidade dos botões next e prev do Carrossel */
nxt.onclick = function(){
    if(active + 1 > itemLength){
        active = 0;
    }else{
        active = active + 1;
    }
    reloadSlider(); 
}

prv.onclick = function(){
    if(active - 1 < 0){
        active = itemLength;
    }else{
        active = active - 1;
    }
    reloadSlider();
}

/* Modo de rolagem automático e funcionalidade/alteração dos "dots" do Carrossel */

let refreshSlider = setInterval(()=> {nxt.click()}, 3000)

function reloadSlider(){
    let checkLeft = itens[active].offsetLeft;
    list.style.left = -checkLeft + 'px';

    let lastActiveDots = document.querySelector('.slider .dots li.active');
    lastActiveDots.classList.remove('active');
    dot[active].classList.add('active');

    clearInterval(refreshSlider);
    refreshSlider = setInterval(()=> {nxt.click()}, 3000);

}

dot.forEach((li, key) => {
    li.addEventListener('click', function(){
        active = key;
        reloadSlider();
    })
})