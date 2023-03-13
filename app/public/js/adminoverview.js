// Modal for insert veneu
const insertButtonsVenue = document.querySelectorAll('.insert-button-venue');
const insertModalVenue = document.getElementById('insertModalVenue');
const insertFormVenue = document.getElementById('insertFormVenue');

insertButtonsVenue.forEach((button) => {
    button.addEventListener('click', (event) => {
        insertModalVenue.style.display = 'block';
    });
});

const closeButtonInsertVeneu = insertModalVenue.querySelector('.btn-close');
closeButtonInsertVeneu.addEventListener('click', () => {
    insertModalVenue.style.display = 'none';
});

const insertModalFooterVeneu = insertModalVenue.querySelector('.modal-footer');
const insertCancelBtnVeneu = insertModalFooterVeneu.querySelector('.btn-secondary');
insertCancelBtnVeneu.addEventListener('click', () => {
    insertModalVenue.style.display = 'none';
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
        const date = row.querySelector('td:nth-of-type(3)').innerText;
        const location = row.querySelector('td:nth-of-type(4)').innerText;
        const seats = row.querySelector('td:nth-of-type(5)').innerText;

        document.getElementById('edit-id-venue').value = id;
        document.getElementById('name-venue').value = name;
        document.getElementById('date-venue').value = date;
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

// Modal for insert event
const insertButtonEvent = document.querySelectorAll('.insert-button-event');
const insertModalEvent = document.getElementById('insertModalEvent');
const insertFormEvent = document.getElementById('insertEventForm');

insertButtonEvent.forEach((button) => {
    button.addEventListener('click', (event) => {
        insertModalEvent.style.display = "block";
    });
});

const closeInsertButtonEvent = insertModalEvent.querySelector('.btn-close');
closeInsertButtonEvent.addEventListener('click', () => {
    insertModalEvent.style.display = 'none';
});

const insertModalFooterEvent = insertModalEvent.querySelector('.modal-footer');
const cancelInsertBtnEvent = insertModalFooterEvent.querySelector('.btn-secondary');
cancelInsertBtnEvent.addEventListener('click', () => {
    insertModalEvent.style.display = 'none';
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


// Modal for insert artist
const insertButtonArtist = document.querySelectorAll('.insert-button-artist');
const insertModalArtist = document.getElementById('insertModalArtist');
const insertFormArtist = document.getElementById('insertArtistForm');

insertButtonArtist.forEach((button) => {
    button.addEventListener('click', (event) => {
        insertModalArtist.style.display = "block";
    });
});

const closeInsertButtonArtist = insertModalArtist.querySelector('.btn-close');
closeInsertButtonArtist.addEventListener('click', () => {
    insertModalArtist.style.display = 'none';
});

const insertModalFooterArtist = insertModalArtist.querySelector('.modal-footer');
const cancelInsertBtnArtist = insertModalFooterArtist.querySelector('.btn-secondary');
cancelInsertBtnArtist.addEventListener('click', () => {
    insertModalArtist.style.display = 'none';
});


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