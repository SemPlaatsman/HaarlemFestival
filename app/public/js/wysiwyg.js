// Editor modal opener for the WYSIWYG editor
function openEditorModal(id) {
  const paragraph = document.querySelector(`[data-id="${id}"]`);

  const bodyMarkup = paragraph.getAttribute('data-body-markup');

  const editor = CKEDITOR.instances.editor;

  const modalIdInput = document.getElementById('editor-modal-id');
  modalIdInput.value = id;
  editor.setData(bodyMarkup);

  const modal = document.getElementById('editor-modal');
  modal.classList.add('show');
  modal.style.display = 'block';

  const closeButtons = modal.querySelectorAll('.close');
  closeButtons.forEach(closeButton => {
    closeButton.addEventListener('click', () => {
      modal.classList.remove('show');
      modal.style.display = 'none';
    });
  });
}
