
// adminPanel page -----------------------------
document.getElementById('menuButton').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar.style.display === 'none' || sidebar.style.display === '') {
        sidebar.style.display = 'block';
    } else {
        sidebar.style.display = 'none';
    }
});

const sidebarToggle = document.getElementById('sidebarToggle');
const mainContent = document.querySelector('.flex-grow-1');
const sidebar = document.querySelector('.sidebar-hidden');
// const sidebar = document.getElementById('sidebar');

sidebarToggle.addEventListener('click', function() {
    mainContent.classList.toggle('main-content-expanded');
  sidebar.classList.toggle('sidebar-expanded');
});


// login page ----------------------------------
function handleLogin() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email && password) {
        console.log('Email:', email);
        console.log('Password:', password);
        alert('Login successful!');
    } else {
        alert('Please enter both email and password.');
    }
}
