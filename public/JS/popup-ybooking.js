console.log("popup-ybooking.js loaded");

// Define variables in the global scope once
const confirmationPopup = document.getElementById("confirmationPopup");
const successPopup = document.getElementById("successPopup");
const cancelButton = document.getElementById("cancelButton");
const confirmButton = document.getElementById("confirmButton");
const closeSuccessButton = document.getElementById("closeSuccessButton");
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Function to show the confirmation popup and set the booking ID
function showConfirmationPopup(bookingId) {
    confirmationPopup.style.display = "block";
    confirmButton.setAttribute("data-booking-id", bookingId);
}

// Function to close the confirmation popup
function closeConfirmationPopup() {
    confirmationPopup.style.display = "none";
}

// Function to show the success popup
function showSuccessPopup() {
    successPopup.style.display = "block";
}

// Function to close the success popup
function closeSuccessPopup() {
    successPopup.style.display = "none";
}

// Event listener for the "No" button in the confirmation popup
cancelButton.addEventListener("click", closeConfirmationPopup);

// Event listener for the "Yes" button in the confirmation popup
confirmButton.addEventListener("click", () => {
    const bookingId = confirmButton.getAttribute("data-booking-id");
    // Check if bookingId is valid
    if (!bookingId) {
        console.error("Booking ID is missing.");
        return;
    }

    // Send an AJAX POST request to cancel the booking
    fetch(`/cancelbooking/${bookingId}`, {
        method: "POST",
        headers: {
            "X-CSRF-Token": csrfToken,
            "Content-Type": "application/json",
        },
        body: JSON.stringify({}),
    })
    .then((response) => response.json())
    .then((data) => {
        console.log(data); // Log the response data to the console
        if (data.success) {
            // Booking canceled successfully, close the confirmation popup and show the success popup
            closeConfirmationPopup();
            showSuccessPopup();
        } else {
            // Handle the case where booking cancellation failed
            console.error("Booking cancellation failed.");
        }
    })
    .catch((error) => {
        console.error("Error during booking cancellation:", error);
    });
});

// Event listener for the "OK" button in the success popup
closeSuccessButton.addEventListener("click", () => {
    // Reload the current page to refresh the content
    window.location.reload();
});

// Event delegation for cancel buttons
document.addEventListener("click", (event) => {
    if (event.target.classList.contains("cancel")) {
        const bookingId = event.target.getAttribute("data-booking-id");
        if (bookingId) {
            showConfirmationPopup(bookingId);
        }
    }
});
