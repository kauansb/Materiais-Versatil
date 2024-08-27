// Referências aos elementos do DOM
let form = document.getElementById("formCadastro");
let nome = document.getElementById("nome");
let email = document.getElementById("email");
let senha = document.getElementById("senha");
let mensagemFinal = document.getElementById("mensagemFinal");

// Evento de submissão do formulário
form.addEventListener("submit", function(evento) {
    evento.preventDefault(); // Impede o envio do formulário

    let formValido = true;

    // Validação do campo nome
    if (nome.value === "") {
        nome.classList.add("erro");
        document.getElementById("erroNome").innerText = "O nome é obrigatório.";
        formValido = false;
    } else {
        nome.classList.remove("erro");
        document.getElementById("erroNome").innerText = "";
    }

    // Validação do campo email
    if (email.value === "") {
        email.classList.add("erro");
        document.getElementById("erroEmail").innerText = "O email é obrigatório.";
        formValido = false;
    } else {
        email.classList.remove("erro");
        document.getElementById("erroEmail").innerText = "";
    }

    // Validação do campo senha
    if (senha.value.length < 6) {
        senha.classList.add("erro");
        document.getElementById("erroSenha").innerText = "A senha deve ter pelo menos 6 caracteres.";
        formValido = false;
    } else {
        senha.classList.remove("erro");
        document.getElementById("erroSenha").innerText = "";
    }

    // Se o formulário for válido, exibe uma mensagem de sucesso
    if (formValido) {
        mensagemFinal.innerText = "Cadastro realizado com sucesso!";
        mensagemFinal.style.color = "green";
    } else {
        mensagemFinal.innerText = "Por favor, corrija os erros acima.";
        mensagemFinal.style.color = "red";
    }
});
