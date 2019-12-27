// Opening the modal using the button
document.getElementById('button').addEventListener('click',
    function () {
        document.querySelector('.bg-modal').style.display = 'flex';
    });

// Pressing the 'x' to close the modal
document.querySelector('.close').addEventListener('click',
    function () {
        document.querySelector('.bg-modal').style.display = 'none';
    });