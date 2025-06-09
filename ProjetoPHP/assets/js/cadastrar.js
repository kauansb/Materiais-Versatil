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
document.getElementById('toggleSenha').addEventListener('click', function() {
    togglePassword('senha', 'toggleSenha');
});
document.getElementById('toggleRepetirSenha').addEventListener('click', function() {
    togglePassword('repetir_senha', 'toggleRepetirSenha');
});