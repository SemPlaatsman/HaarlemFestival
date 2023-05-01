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
        document.getElementById('update-user-email').value = email;      
        document.getElementById('update-user-name').value = name;
        document.getElementById('update-user-is-admin').checked = isAdmin;

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