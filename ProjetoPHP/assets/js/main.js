document.addEventListener('DOMContentLoaded', () => {
  // 1. Dismiss alerts after 5s
  const alerts = document.querySelectorAll('.alert');
  if (alerts.length) {
    setTimeout(() => {
      alerts.forEach(alert => {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500);
      });
    }, 5000);
  }

  // 2. Toggle de senhas
  const passwordToggles = [
    { buttonId: 'toggleSenha', inputId: 'senha' },
    { buttonId: 'toggleRepetirSenha', inputId: 'repetir_senha' }
  ];

  passwordToggles.forEach(({ buttonId, inputId }) => {
    const btn = document.getElementById(buttonId);
    if (btn) {
      btn.addEventListener('click', () => togglePassword(inputId, buttonId));
    }
  });

  // 3. Confirmação de exclusão (event delegation)
  document.body.addEventListener('click', e => {
    const btn = e.target.closest('.btn-excluir');
    if (!btn) return;
    e.preventDefault();

    const id = btn.getAttribute('data-id');
    const inputExcluir = document.getElementById('inputExcluirId');
    const modalEl = document.getElementById('modalExcluir');
    if (inputExcluir && modalEl) {
      inputExcluir.value = id;
      const modal = new bootstrap.Modal(modalEl);
      modal.show();
    }
  });
});

/**
 * Alterna visibilidade de campo de senha e ícone
 * @param {string} inputId - ID do input de senha
 * @param {string} buttonId - ID do botão que contém o ícone
 */
function togglePassword(inputId, buttonId) {
  const input = document.getElementById(inputId);
  const icon = document.querySelector(`#${buttonId} i`);
  if (!input || !icon) return;

  const show = input.type === 'password';
  input.type = show ? 'text' : 'password';
  icon.classList.replace(show ? 'bi-eye' : 'bi-eye-slash', show ? 'bi-eye-slash' : 'bi-eye');
}
