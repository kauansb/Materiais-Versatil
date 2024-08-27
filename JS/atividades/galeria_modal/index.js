// Referências aos elementos do DOM
let modal = document.getElementById("meuModal");
let imagemModal = document.getElementById("imagemModal");
let closeBtn = document.getElementsByClassName("close")[0];
let imagens = document.querySelectorAll(".galeria img");
// Adiciona evento de clique para cada imagem na galeria
imagens.forEach(function(imagem) {
    imagem.addEventListener("click", function() {
        modal.style.display = "block"; // Exibe o modal
        imagemModal.src = this.src; // Define a imagem do modal
    });
});
// Evento para fechar o modal ao clicar no "X"
closeBtn.addEventListener("click", function() {
    modal.style.display = "none"; // Esconde o modal
});
// Evento para fechar o modal ao clicar fora da imagem
modal.addEventListener("click", function(evento) {
    if (evento.target === modal) {
        modal.style.display = "none"; // Esconde o modal
    }
});