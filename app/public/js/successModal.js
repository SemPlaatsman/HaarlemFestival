// Show success modal
function showSuccessModalAndRedirect(url) {
    const modal = new bootstrap.Modal(document.getElementById('successModal'));
    modal.show();
    modal.addEventListener('hidden.bs.modal', () => {
      window.location.href = url;
    });
  }