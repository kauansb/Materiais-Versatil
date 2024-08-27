// Objeto que armazena as respostas corretas
let respostasCorretas = {
    p1: "JavaScript",
    p2: "p",
    p3: "background-color"
};
// Função para verificar as respostas do usuário
function verificarRespostas() {
    let formulario = document.getElementById("quizForm");
    let pontuacao = 0;
    // Loop através das respostas corretas
    for (let pergunta in respostasCorretas) {
        // Verifica a resposta do usuário para cada pergunta
        let respostaSelecionada = formulario.elements[pergunta].value;
        if (respostaSelecionada === respostasCorretas[pergunta]) {
            pontuacao++; // Incrementa a pontuação se a resposta estiver correta
        }
    }
    // Exibe a pontuação final do usuário
    let resultado = document.getElementById("resultado");
    resultado.innerText = "Você acertou " + pontuacao + " de 3 perguntas.";
}
