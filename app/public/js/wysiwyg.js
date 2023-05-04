// Editor modal opener for the WYSIWYG editor
function openEditorModal(id) {
  // Find the corresponding paragraph
  const paragraph = document.querySelector(`[data-id="${id}"]`);

  // Extract the body_markup and URL from the paragraph
  const bodyMarkup = paragraph.getAttribute('data-body-markup');
  // CKEditor editor
  const editor = CKEDITOR.instances.editor;

  // Update the modal inputs with the paragraph data
  const modalIdInput = document.getElementById('editor-modal-id');
  modalIdInput.value = id;
  editor.setData(bodyMarkup);

  // Show the modal
  const modal = document.getElementById('editor-modal');
  modal.classList.add('show');
  modal.style.display = 'block';

  // Add event listener to the close buttons of the modal
  const closeButtons = modal.querySelectorAll('.close');
  closeButtons.forEach(closeButton => {
    closeButton.addEventListener('click', () => {
      modal.classList.remove('show');
      modal.style.display = 'none';
    });
  });
}
