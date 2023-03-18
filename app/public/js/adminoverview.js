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

// Modal for edit event
const editButtonEvent = document.querySelectorAll('.edit-button-event');
const editModalEvent = document.getElementById('editModalEvent');
const editFormEvent = document.getElementById('editFormEvent');

editButtonEvent.forEach((button) => {
    button.addEventListener('click', (event) => {
        const row = event.target.closest('tr');
        const id = row.querySelector('.edit-button-event').dataset.id;
        const name = row.querySelector('td:nth-of-type(2)').innerText;
        const start_date = row.querySelector('td:nth-of-type(3)').innerText;
        const end_date = row.querySelector('td:nth-of-type(4)').innerText;

        document.getElementById('edit-id-event').value = id;
        document.getElementById('name').value = name;
        document.getElementById('start_date').value = start_date;
        document.getElementById('end_date').value = end_date;

        editModalEvent.style.display = "block";
    });
});

const closeEditButtonEvent = editModalEvent.querySelector('.btn-close');
closeEditButtonEvent.addEventListener('click', () => {
    editModalEvent.style.display = 'none';
});

const editModalFooterEvent = editModalEvent.querySelector('.modal-footer');
const editCancelBtnEvent = editModalFooterEvent.querySelector('.btn-secondary');
editCancelBtnEvent.addEventListener('click', () => {
    editModalEvent.style.display = 'none';
});

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

// Modal for edit user
const editButtonUser = document.querySelectorAll('.edit-button-user');
const editModalUser = document.getElementById('editModalUser');
const editFormUser = document.getElementById('editFormUser');

editButtonUser.forEach((button) => {
    button.addEventListener('click', (event) => {
        const row = event.target.closest('tr');
        const id = row.querySelector('.edit-button-user').dataset.id;
        const email = row.querySelector('td:nth-of-type(2)').innerText;
        const name = row.querySelector('td:nth-of-type(5)').innerText;
        const isAdmin = row.querySelector('td:nth-of-type(4)').innerText === "Yes";


        document.getElementById('edit-id-user').value = id;
        document.getElementById('email').value = email;      
        document.getElementById('name-user').value = name;
        document.getElementById('is_admin').checked = isAdmin;

        editModalUser.style.display = 'block';
    });
});

const closeEditButtonUser = editModalUser.querySelector('.btn-close');
closeEditButtonUser.addEventListener('click', () => {
    editModalUser.style.display = 'none';
});

const editModalFooterUser = editModalUser.querySelector('.modal-footer');
const cancelEditBtnUser = editModalFooterUser.querySelector('.btn-secondary');
cancelEditBtnUser.addEventListener('click', () => {
    editModalUser.style.display = 'none';
});