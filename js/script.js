document.addEventListener('DOMContentLoaded', (event) => {
    const modal = document.getElementById('registerModal');
    const link = document.getElementById('registerLink');
    const closeButton = document.querySelector('.close');

    link.onclick = function() {
        modal.style.display = 'block';
    }

    closeButton.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
});
