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