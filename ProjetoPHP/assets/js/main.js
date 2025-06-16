// This script handles the dismissal of alerts after a certain time period
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.remove();
            }, 500);
        });
    }, 5000);
});

// Modal de confirmação para exclusão
document.querySelectorAll('.btn-excluir').forEach(function(btn) {
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    var id = this.getAttribute('data-id');
    document.getElementById('inputExcluirId').value = id;
    var modal = new bootstrap.Modal(document.getElementById('modalExcluir'));
    modal.show();
  });
});

document.getElementById('toggleSenha').addEventListener('click', function() {
    togglePassword('senha', 'toggleSenha');
});
document.getElementById('toggleRepetirSenha').addEventListener('click', function() {
    togglePassword('repetir_senha', 'toggleRepetirSenha');
});

// Função para alternar a visibilidade da senha
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.querySelector(`#${iconId} i`);
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}