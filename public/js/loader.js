// document.getElementById('fetchDataButton').addEventListener('click', fetchData);

// async function fetchData() {
//     const loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
//     const resultDiv = document.getElementById('result');

//     // Show loading modal
//     loadingModal.show();
//     resultDiv.innerHTML = '';

//     try {
//         const response = await fetch('/sync-test');
//         const data = await response.json();

//         resultDiv.innerHTML = JSON.stringify(data, null, 2);
//         console.log(data);
//     } catch (error) {
//         console.error('Error fetching data:', error);
//         resultDiv.innerHTML = 'Error fetching data.';
//     } finally {
//         // Hide loading modal
//         loadingModal.hide();
//         // window.location.href = 'http://127.0.0.1:8000/sync-test';
//     }
// }

document.getElementById('fetchDataButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default anchor click behavior
    const loadingModal = document.getElementById('loadingModal');

    // Show the loading modal
    loadingModal.style.display = 'block';

    // Make the fetch request
    fetch('/sync-test')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Assuming the response is JSON
        })
        .then(data => {
            // Check if the response indicates success
            if (data === 'success') {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Data is synced successfully",
                    showConfirmButton: false,
                    timer: 1500
                  });
            } else {
                // console.error('Unexpected response:', data);
                Swal.fire({
                    position: "center",
                    icon: "warning",
                    title: "Something Went wrong",
                    showConfirmButton: false,
                    timer: 1500
                  });
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        })
        .finally(() => {
            // Close the loading modal
            loadingModal.style.display = 'none';
            setTimeout(() => {
             // Use setTimeout for demo purposes
                window.location.reload();
            }, 1500);
        });
});


