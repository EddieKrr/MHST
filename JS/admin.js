document.addEventListener('DOMContentLoaded', () => {
    const tbody = document.getElementById('tbody');

    async function fetchUsers(){
        try {
            const response = await fetch('read_users.php');

            if (!response.ok) {
                throw new Error('HTTP error! status: ${response.status}');
                }
                const users = await response.json();

                tbody.innerHTML = ''; // Clear existing rows

                if (users.error) {
                    console.error("Server Error: ", users.error);
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


                users.forEach(user=> {
                    const row = tbody.insertRow();
                    row.insertCell().textContent = user.id;
                    row.insertCell().textContent = user.name;
                    row.insertCell().textContent = user.email;
                    row.insertCell().textContent = '********';
                    row.insertCell().textContent = user.age;
                    row.insertCell().textContent = user.gender;
                    row.insertCell().textContent = user.role;

                    const actionsCell = row.insertCell();

                    const editButton = document.createElement('button');
                    editButton.textContent = 'Edit';
                    editButton.classList.add('edit-btn');

                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Delete';
                    deleteButton.classList.add('delete-btn');

                    actionsCell.appendChild(editButton);
                    actionsCell.appendChild(deleteButton);
                });

            
        } catch (error) {
            console.error('Fetch error: ', error);
            const row = tbody.insertRow();
            const cell = row.insertCell();
            cell.colSpan = 8;
            cell.textContent = `Error fetching users: ${error.message}`;
            cell.style.color = 'red';
        }
    }

    const addUserForm = document.getElementById('addUser');
    addUserForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const name= document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const age = document.getElementById('age').value.trim();
        const gender = document.getElementById('gender').value.trim();
        const role = document.getElementById('role').value.trim();

        if (!name || !email || !password || !gender){
            alert('Please fill in all fields.');
            return;
        }

        const UserData = {
            name: name,
            email: email,       
            password: password,
            age: parseInt(age) || 0,
            gender: gender,
            role: role || 'user'
        };

        try {
            const response = await fetch('create_user.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(UserData)
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status} - ${errorText}`);
            }

            const result = await response.json();

            if (result.success){
                alert(result.message);
                addUserForm.reset();
                fetchUsers();
            }else{
                alert(`Error adding user: ${result.message}`);
            }
        } catch (error) {
            console.error(`Error adding user: ${error}`);
            alert(`Could not add user: ${error.message}`);
        }
    });

    fetchUsers();
});