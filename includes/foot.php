</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let seatCheckboxes = document.querySelectorAll('.seats');
        let totalAmountDisplay = document.querySelector('.total-amount-value');

        let seatPrice = 200;
        let totalAmount = 0;

        seatCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                let seatLabel = checkbox.nextElementSibling;
                let seatId = checkbox.id.split('-');
                let rowNumber = seatId[1]; // Assuming seat_id is used as rowNumber
                let seatLetter = seatId[2]; // Assuming seat_id is used as seatLetter
                let selectedSeats = document.querySelectorAll('.seats:checked').length;

                if (selectedSeats > 5) {
                    checkbox.checked = false;
                    return;
                }

                if (checkbox.checked) {
                    totalAmount += seatPrice;
                    seatLabel.style.backgroundColor = '#bada55';
                    // Update seat status to occupied in the database
                    updateSeatStatus(rowNumber, seatLetter, 'occupied');
                } else {
                    totalAmount -= seatPrice;
                    seatLabel.style.backgroundColor = '#F42536';
                    // Update seat status to available in the database
                    updateSeatStatus(rowNumber, seatLetter, 'available');
                }

                totalAmountDisplay.innerHTML = totalAmount;
            });
        });
    });

    function updateSeatStatus(rowNumber, seatLetter, status) {
        let updateStatusUrl = '<?php echo $_SERVER['PHP_SELF']; ?>';

        fetch(updateStatusUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `rowNumber=${rowNumber}&seatLetter=${seatLetter}&status=${status}`,
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Seat status updated successfully:', data);
            })
            .catch(error => {
                console.error('Error updating seat status:', error);
            });
    }

    function generateInvoice() {
        let selectedSeats = document.querySelectorAll('.seats:checked');
        if (selectedSeats.length === 0) {
            alert('Please select at least one seat before making a payment.');
            return;
        }

        let numberOfSeats = selectedSeats.length;
        let seatNumbers = Array.from(selectedSeats).map(seat => seat.nextElementSibling.innerHTML).join(', ');
        let totalAmount = document.querySelector('.total-amount-value').innerHTML;

        window.location.href = `invoice.php?seatNumbers=${seatNumbers}&numberOfSeats=${numberOfSeats}&totalAmount=${totalAmount}`;
    }
</script>

</html>