function openRentForm(itemName, rentalPrice) {
    // Set the item name and rental price in the form
    document.getElementById('item-name').value = itemName;
    document.getElementById('rental-price').value = rentalPrice;
    
    // Open the rent modal
    document.getElementById('rent-modal').style.display = 'block';
}

function closeRentForm() {
    // Close the rent modal
    document.getElementById('rent-modal').style.display = 'none';
}

// Handling the form submission to confirm the rental
document.getElementById('rent-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const itemName = document.getElementById('item-name').value;
    const rentalPrice = document.getElementById('rental-price').value;
    const rentalPeriod = document.getElementById('rental-period').value;

    const totalPrice = parseInt(rentalPrice.replace(/\D/g, '')) * rentalPeriod; // Convert to number and calculate total

    alert(`You have rented ${itemName} for ${rentalPeriod} days. Total price: Rp ${totalPrice.toLocaleString()}`);
    closeRentForm();
});