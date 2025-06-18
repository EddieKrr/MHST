const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});

function handleCredentialResponse(response) {
    // Send the JWT token to the server
    fetch("google-auth.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ credential: response.credential })
    })
    .then(res => res.text())
    .then(data => {
        if (data === "success") {
            window.location.href = "index.html";
        } else {
            alert("Google login failed: " + data);
        }
    });
}