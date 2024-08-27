let form = document.getElementById("formTarefa");
let listaTarefas = document.getElementById("listaTarefas");

// Evento para adicionar uma nova tarefa
form.addEventListener("submit", function(evento) {
    evento.preventDefault(); // Previne o comportamento padrão do formulário
    let tarefaTexto = document.getElementById("novaTarefa").value;

    // Verifica se o campo de texto não está vazio
    if (tarefaTexto !== "") {
        // Cria um novo item de lista (li)
        let novaTarefa = document.createElement("li");
        novaTarefa.innerText = tarefaTexto;

        // Adiciona evento para marcar a tarefa como concluída
        novaTarefa.addEventListener("click", function() {
            this.classList.toggle("concluida");
        });

        // Cria um botão para remover a tarefa
        let botaoRemover = document.createElement("button");
        botaoRemover.innerText = "Remover";
        botaoRemover.addEventListener("click", function() {
            listaTarefas.removeChild(novaTarefa); // Remove a tarefa da lista
        });

        // Adiciona o botão de remover à nova tarefa e a tarefa à lista
        novaTarefa.appendChild(botaoRemover);
        listaTarefas.appendChild(novaTarefa);
        document.getElementById("novaTarefa").value = ""; // Limpa o campo de texto
    }
});