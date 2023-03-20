// Modal for edit artist
const editButtonArtist = document.querySelectorAll('.edit-button-artist');
const editModalArtist = document.getElementById('editModalArtist');
const editFormArtist = document.getElementById('editFormArtist');

editButtonArtist.forEach((button) => {
    button.addEventListener('click', (event) => {
        const row = event.target.closest('tr');

        const id = row.querySelector('.edit-button-artist').dataset.id;
        const name = row.querySelector('td:nth-of-type(2)').innerText;

        document.getElementById('edit-id-artist').value = id;
        document.getElementById('name-artist').value = name;

        editModalArtist.style.display = "block";
    });
});

const closeEditButtonArtist = editModalArtist.querySelector('.btn-close');
closeEditButtonArtist.addEventListener('click', () => {
    editModalArtist.style.display = 'none';
});

const editModalFooterArtist = editModalArtist.querySelector('.modal-footer');
const editCancelBtnArtist = editModalFooterArtist.querySelector('.btn-secondary');
editCancelBtnArtist.addEventListener('click', () => {
    editModalArtist.style.display = 'none';
});