let numeroAleatorio = Math.floor(Math.random() * 100) + 1; // Gera um número aleatório entre 1 e 100
let tentativas = 0;

// Evento para processar o palpite do usuário
document.getElementById("adivinhar").addEventListener("click", function() {
    let palpite = parseInt(document.getElementById("palpite").value);
    tentativas++; // Incrementa o número de tentativas
    let resultado = document.getElementById("resultado");

    // Verifica se o palpite está correto, muito alto ou muito baixo
    if (palpite === numeroAleatorio) {
        resultado.innerText = "Parabéns! Você adivinhou o número!";
        resultado.style.color = "green";
    } else if (palpite > numeroAleatorio) {
        resultado.innerText = "Muito alto! Tente novamente.";
        resultado.style.color = "red";
    } else {
        resultado.innerText = "Muito baixo! Tente novamente.";
        resultado.style.color = "red";
    }

    // Atualiza o contador de tentativas
    document.getElementById("tentativas").innerText = "Tentativas: " + tentativas;
});

// Evento para reiniciar o jogo
document.getElementById("reiniciar").addEventListener("click", function() {
    numeroAleatorio = Math.floor(Math.random() * 100) + 1; // Gera um novo número aleatório
    tentativas = 0; // Reseta o contador de tentativas
    document.getElementById("resultado").innerText = ""; // Limpa a mensagem de resultado
    document.getElementById("tentativas").innerText = "Tentativas: 0"; // Reseta a exibição de tentativas
    document.getElementById("palpite").value = ""; // Limpa o campo de entrada
});
