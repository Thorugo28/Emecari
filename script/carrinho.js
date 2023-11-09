
//var Remover do carrinho
var btnExcluir = document.getElementsByClassName("product_exclud");
console.log(btnExcluir)    
for (var i = 0; i < btnExcluir.length; i++){
        var botaoExc = btnExcluir[i];
        botaoExc.addEventListener("click", excluir);
    }
//func Remover do carrinho
function excluir(event){
    var btnExcluirA = event.target;
    btnExcluirA.parentElement.parentElement.remove();
    calcularTotal();
}

// func calcular
function calcularTotal(){
    var conteudoCarrinho = document.getElementsByClassName("tbody")[0];
    var itensCarrinho = conteudoCarrinho.getElementsByClassName("box_cart");
    var total = 0;
    for (var i = 0; i < itensCarrinho.length; i++){
        var itemCarrinho = itensCarrinho[i];
        var precoProduto = itemCarrinho.getElementsByClassName("product_price")[0];
        var quantidadeProduto = itemCarrinho.getElementsByClassName("product_qtd")[0];
        var preco = parseFloat(precoProduto.innerText.replace("R$", "").replace(",", "."));
        var quantidade = quantidadeProduto.value;
        var total = total + (preco * quantidade);
    }  
        total = Math.round(total*100)/100;//centavosss
        document.getElementsByClassName("preco_total")[0].innerText = "R$" + total;

    
}

//var mudar quantidade
var quantidadeImputs = document.getElementsByClassName("product_qtd");
for (var i = 0; i < quantidadeImputs.length; i++) {
    var input = quantidadeImputs[i];
    input.addEventListener("change", mudarQuantidade);
}
//func mudar quantidade
function mudarQuantidade(event) { //talvez mude
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0){
        input.value = 1;
    }
    calcularTotal();
}

//var adicionar
let btnAdicionar = document.getElementsByClassName("product_add");
for (var i = 0; i < btnAdicionar.length; i++) {
    var botaoAdd = btnAdicionar[i];
    botaoAdd.addEventListener('click', adicionar);
}
// func adicionar
function adicionar(event){
    var botaoAdd = event.target;
    var comprar = botaoAdd.parentElement;
    var nome = comprar.getElementsByClassName("product_name")[0].innerText;
    var preco = comprar.getElementsByClassName("product_price")[0].innerText;
    var imagem = comprar.getElementsByClassName("product_img")[0].src;
    
    addPodutoNoCart(nome, preco, imagem);
    calcularTotal();
}
function addPodutoNoCart(nome, preco, imagem){
    var novoCart = document.createElement("tr");
    novoCart.classList.add("box_cart");
    var cartItens = document.getElementsByClassName("tbody")[0];
    
    //verificar
    var cartItensNomes = cartItens.getElementsByClassName("product_name");
    for (var i = 0; i < cartItensNomes.length; i++){
        if (cartItensNomes[i].innerText === nome){
        cartItensNomes[i].parentElement.parentElement.getElementsByClassName("product_qtd")[0].value++;
        return;
    }
        }

var cartBoxConteudo = `
                        <td class="product_info">
                            <img class="product_img" src=${imagem} alt="nome">
                            <strong class="product_name">${nome}</strong>
                        </td>
                        <td>
                            <input name="qtd" class="product_qtd" type="number" value="1" min="1">
                        </td>
                        <td class="product_price">
                            ${preco}
                        </td>
                        <td>
                            <button class="product_exclud">x</button>
                        </td>`;
novoCart.innerHTML = cartBoxConteudo;
cartItens.append(novoCart);
novoCart.getElementsByClassName("product_exclud")[0].addEventListener("click", excluir);
novoCart.getElementsByClassName("product_qtd")[0].addEventListener("change", mudarQuantidade);
calcularTotal();
}

// botao finalizar compra
document.getElementsByClassName("finish")[0].addEventListener("click", finalizar);
// finalizar
function finalizar(event){
alert("Sua Compra foi Concluida");
var conteudoCarrinho = document.getElementsByClassName("tbody")[0];
while (conteudoCarrinho.hasChildNodes()){
    conteudoCarrinho.removeChild(conteudoCarrinho.firstChild);
}
calcularTotal();
}

