document.addEventListener('DOMContentLoaded', () => {
    fetch('fetch_direction.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data); 
        document.getElementById('lastDirection').innerText = `Last direction: ${data.direction}`;
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
