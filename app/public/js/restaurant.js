// Modal for edit event
const editButtonRestaurant = document.querySelectorAll('.edit-button-restaurant');
const editModalRestaurant = document.getElementById('editModalRestaurant');
const editFormRestaurant = document.getElementById('editFormRestaurant');

editButtonRestaurant.forEach((button) => {
    button.addEventListener('click', (event) => {
        const row = event.target.closest('tr');
        const id = row.querySelector('.edit-button-restaurant').dataset.id;
        const name = row.querySelector('td:nth-of-type(2)').innerText;
        const seats = row.querySelector('td:nth-of-type(3)').innerText;
        const location = row.querySelector('td:nth-of-type(4)').innerText;
        const adultPrice = row.querySelector('td:nth-of-type(5)').innerText.replace('€ ', '');
        const kidsPrice = row.querySelector('td:nth-of-type(6)').innerText.replace('€ ', '');
        const reservationFee = row.querySelector('td:nth-of-type(7)').innerText.replace('€ ', '');
    
        document.getElementById('edit-id-restaurant').value = id;
        document.getElementById('update-restaurant-name').value = name;
        document.getElementById('update-restaurant-seats').value = seats;
        document.getElementById('update-restaurant-location').value = location;
        document.getElementById('update-restaurant-adult-price').value = adultPrice;
        document.getElementById('update-restaurant-kids-price').value = kidsPrice;
        document.getElementById('update-restaurant-reservation-fee').value = reservationFee;

        editModalRestaurant.style.display = "block";
    });
});

const closeEditButtonEvent = editModalRestaurant.querySelector('.btn-close');
closeEditButtonEvent.addEventListener('click', () => {
    editModalRestaurant.style.display = 'none';
});

const editModalFooterEvent = editModalRestaurant.querySelector('.modal-footer');
const editCancelBtnEvent = editModalFooterEvent.querySelector('.btn-secondary');
editCancelBtnEvent.addEventListener('click', () => {
    editModalRestaurant.style.display = 'none';
});