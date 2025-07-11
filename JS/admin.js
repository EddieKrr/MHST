window.addEventListener('DOMContentLoaded', () => {
    const tbody = document.getElementById('tbody');
    const addUserForm = document.getElementById('addUser');
    const editUserForm = document.getElementById('editUserForm');
    const editUserContainer = document.getElementById('editUserContainer');
    const cancelEditButton = document.getElementById('cancelEdit');

    // Fetch and display users
    async function fetchUsers() {
        try {
            const response = await fetch('read_users.php');
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

            const users = await response.json();
            tbody.innerHTML = '';

            if (users.error) {
                const row = tbody.insertRow();
                const cell = row.insertCell();
                cell.colSpan = 8;
                cell.textContent = `Error fetching users: ${users.error}`;
                cell.style.color = 'red';
                return;
            }

            if (users.length === 0) {
                const row = tbody.insertRow();
                const cell = row.insertCell();
                cell.colSpan = 8;
                cell.textContent = 'No users found in the database.';
                cell.style.textAlign = 'center';
                cell.style.color = 'gray';
                return;
            }

            users.forEach(user => {
                const row = tbody.insertRow();
                row.insertCell().textContent = user.id;
                row.insertCell().textContent = user.name;
                row.insertCell().textContent = user.email;
                row.insertCell().textContent = '********';
                row.insertCell().textContent = user.age || 'N/A';
                row.insertCell().textContent = user.gender;
                row.insertCell().textContent = user.role;

                const actionsCell = row.insertCell();
                const editButton = document.createElement('button');
                const deleteButton = document.createElement('button');

                editButton.textContent = 'Edit';
                deleteButton.textContent = 'Delete';
                editButton.classList.add('edit-btn');
                deleteButton.classList.add('delete-btn');

                editButton.addEventListener('click', () => {
                    populateEditForm(user);
                    editUserContainer.style.display = 'block';
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });

                actionsCell.appendChild(editButton);
                actionsCell.appendChild(deleteButton);
            });
        } catch (error) {
            const row = tbody.insertRow();
            const cell = row.insertCell();
            cell.colSpan = 8;
            cell.textContent = `Error fetching users: ${error.message}`;
            cell.style.color = 'red';
        }
    }

    // Populate the edit form with user data
    function populateEditForm(user) {
        document.getElementById('editId').value = user.id;
        document.getElementById('editName').value = user.name;
        document.getElementById('editEmail').value = user.email;
        document.getElementById('editAge').value = user.age || '';
        document.getElementById('editGender').value = user.gender;
        document.getElementById('editRole').value = user.role;
        document.getElementById('editPassword').value = '';
    }

    // Edit form submission
    editUserForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const id = document.getElementById('editId').value;
        const name = document.getElementById('editName').value.trim();
        const email = document.getElementById('editEmail').value.trim();
        const password = document.getElementById('editPassword').value.trim();
        const age = document.getElementById('editAge').value.trim();
        const gender = document.getElementById('editGender').value.trim();
        const role = document.getElementById('editRole').value.trim();

        if (!name || !email || !gender || !role) {
            alert('Please fill in all required fields.');
            return;
        }

        const userData = {
            id, name, email,
            age: age ? parseInt(age) : null,
            gender, role
        };

        if (password) userData.password = password;

        try {
            const response = await fetch('update_user.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(userData)
            });

            const result = await response.json();

            if (response.ok && result.success) {
                alert(result.message);
                editUserForm.reset();
                editUserContainer.style.display = 'none';
                fetchUsers();
            } else {
                alert(`Error updating user: ${result.message || response.statusText}`);
            }
        } catch (error) {
            console.error('Error updating user:', error);
            alert(`Could not update user: ${error.message}`);
        }
    });

    // Cancel edit
    cancelEditButton.addEventListener('click', () => {
        editUserForm.reset();
        editUserContainer.style.display = 'none';
    });

    // Add user form submission
    if (addUserForm) {
        addUserForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const age = document.getElementById('age').value.trim();
            const gender = document.getElementById('gender').value.trim();
            const role = document.getElementById('role').value.trim();

            if (!name || !email || !password || !gender) {
                alert('Please fill in all required fields.');
                return;
            }

            const userData = {
                name, email, password,
                age: age ? parseInt(age) : 0,
                gender,
                role: role || 'user'
            };

            try {
                const response = await fetch('create_user.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(userData)
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    alert(result.message);
                    addUserForm.reset();
                    fetchUsers();
                } else {
                    alert(`Error adding user: ${result.message || response.statusText}`);
                }
            } catch (error) {
                console.error('Error adding user:', error);
                alert(`Could not add user: ${error.message}`);
            }
        });
    }

    // Initial fetch
    fetchUsers();
});