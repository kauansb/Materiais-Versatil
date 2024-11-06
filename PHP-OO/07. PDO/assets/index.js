
// Se houver uma mensagem de sucesso ou erro exibida, apaga-la após 3 segundos
window.onload = function() {
    const mensagem = document.querySelector('.success, .error');
    if (mensagem) {
        setTimeout(function() {
            mensagem.style.display = 'none';
        }, 3000); // 3000 milissegundos = 3 segundos
    }
};

// Código JavaScript para confirmar antes de excluir
document.querySelectorAll('.btn-excluir').forEach(function(btn) {
    btn.addEventListener('click', function(event) {
        if (!confirm('Tem certeza que deseja excluir este usuário?')) {
            event.preventDefault(); // Impede a exclusão caso o usuário cancele
        }
    });
});