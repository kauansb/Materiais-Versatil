const mode = document.getElementById('mode_icon');

mode.addEventListener('click', () => {
    const form = document.getElementById('login_form');

    if(mode.classList.contains('fa-moon')) {
        mode.classList.remove('fa-moon');
        mode.classList.add('fa-sun');

        form.classList.add('dark');
        return ;
    }
    
    mode.classList.remove('fa-sun');
    mode.classList.add('fa-moon');

    form.classList.remove('dark');
});

// Função para exibir a mensagem de erro
function showErrorMessage(message) {
    var errorDiv = document.getElementById('error-message');
    errorDiv.innerHTML = message;
    errorDiv.style.display = 'block';
}