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
        document.getElementById('update-event-name').value = name;
        document.getElementById('update-event-start-date').value = start_date;
        document.getElementById('update-event-end-date').value = end_date;

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