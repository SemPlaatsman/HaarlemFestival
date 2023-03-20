// Modal for edit veneu
const editButtonVenue = document.querySelectorAll('.edit-button-venue');
const editModalVenue = document.getElementById('editModalVenue');
const editFormVenue = document.getElementById('editFormVenue');

editButtonVenue.forEach((button) => {
    button.addEventListener('click', (event) => {
        const row = event.target.closest('tr');
        const id = row.querySelector('.edit-button-venue').dataset.id;
        const name = row.querySelector('td:nth-of-type(2)').innerText;
        const location = row.querySelector('td:nth-of-type(3)').innerText;
        const seats = row.querySelector('td:nth-of-type(4)').innerText;

        document.getElementById('edit-id-venue').value = id;
        document.getElementById('name-venue').value = name;
        document.getElementById('location-venue').value = location;
        document.getElementById('seats-venue').value = seats;

        editModalVenue.style.display = 'block';
    });
});

const closeEditButtonVeneu = editModalVenue.querySelector('.btn-close');
closeEditButtonVeneu.addEventListener('click', () => {
    editModalVenue.style.display = 'none';
});

const editModalFooterVeneu = editModalVenue.querySelector('.modal-footer');
const cancelEditBtnVeneu = editModalFooterVeneu.querySelector('.btn-secondary');
cancelEditBtnVeneu.addEventListener('click', () => {
    editModalVenue.style.display = 'none';
});