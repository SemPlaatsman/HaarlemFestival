// Modal for openinghour 
const editButtonOpeningHour = document.querySelectorAll('.edit-button-opening-hour');
const editModalOpeningHour = document.getElementById('editModalOpeningHour');
const editFormOpeningHour = document.getElementById('editFormOpeningHour');

editButtonOpeningHour.forEach((button) => {
    button.addEventListener('click', (event) => {
        const row = event.target.closest('tr');

        const id = row.querySelector('.edit-button-opening-hour').dataset.id;
        const day_of_week = row.querySelector('td:nth-of-type(3)').innerText;
        const opening_time = row.querySelector('td:nth-of-type(4)').innerText;
        const closing_time = row.querySelector('td:nth-of-type(5)').innerText;

        document.getElementById('edit-id-opening-hour').value = id;
        document.getElementById('update-day-of-week').value = day_of_week;
        document.getElementById('update-opening-time-opening-hour').value = opening_time;
        document.getElementById('update-closing-time-opening-hour').value = closing_time;

        editModalOpeningHour.style.display = "block";
    });
});

const closeEditButtonEvent = editModalOpeningHour.querySelector('.btn-close');
closeEditButtonEvent.addEventListener('click', () => {
    editModalOpeningHour.style.display = 'none';
});

const editModalFooterEvent = editModalOpeningHour.querySelector('.modal-footer');
const editCancelBtnEvent = editModalFooterEvent.querySelector('.btn-secondary');
editCancelBtnEvent.addEventListener('click', () => {
    editModalOpeningHour.style.display = 'none';
});