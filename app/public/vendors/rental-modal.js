const rentalModalContainer = document.getElementById('rental-modal-container');
const rentalCart = document.getElementById('rental-cart');
const rentalCloseButton = document.getElementById('rental-close-button');
const rentalCancelButton = document.getElementById('modal-cancel-button');

rentalCart.addEventListener('click', () => {
    rentalModalContainer.classList.add('show');  
});

rentalCloseButton.addEventListener('click', () => {
    rentalModalContainer.classList.remove('show');
});

rentalCancelButton.addEventListener('click', () => {
    rentalModalContainer.classList.remove('show');
});
