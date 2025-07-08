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

    fetchUsers();
});