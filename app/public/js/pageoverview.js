// Modal for edit event
const editButton = document.querySelectorAll('.edit-button');
const editModal = document.getElementById('editModal');
const editForm = document.getElementById('editForm');

editButton.forEach((button) => {
    button.addEventListener('click', (event) => {
        const row = event.target.closest('tr');
        const id = row.querySelector('.edit-button').dataset.id;
        const name = row.querySelector('td:nth-of-type(2)').innerText;
       

        document.getElementById('update-id').value = id;
        document.getElementById('update-url').value = name;
      

        editModal.style.display = "block";
    });
});

const closeEditButton = editModal.querySelector('.btn-close');
closeEditButton.addEventListener('click', () => {
    editModal.style.display = 'none';
});

const editModalFooter = editModal.querySelector('.modal-footer');
const editCancelBtn = editModalFooter.querySelector('.btn-secondary');
editCancelBtn.addEventListener('click', () => {
    editModal.style.display = 'none';
});