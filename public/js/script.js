// adminPanel page -----------------------------
document.getElementById('menuButton').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar.style.display === 'none' || sidebar.style.display === '') {
        sidebar.style.display = 'block';
    } else {
        sidebar.style.display = 'none';
    }
});

// document.getElementById('sidebarToggle').addEventListener('click', function() {
//     document.getElementById('sidebar').classList.toggle('sidebar-hidden');
// });

const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
const mainContent = document.querySelector('.flex-grow-1');

sidebarToggle.addEventListener('click', function() {
  sidebar.classList.toggle('sidebar-expanded');
  mainContent.classList.toggle('main-content-expanded');
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
