document.addEventListener('DOMContentLoaded', function() {
    const paymentOptions = document.querySelectorAll('#paymentOptions a');
    const upiDetails = document.getElementById('upiDetails');
    const scanQrDetails = document.getElementById('scanQrDetails');
    const verificationFormSection = document.getElementById('verificationFormSection');
    const amountField = document.getElementById('amount');

    paymentOptions.forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();

            // Reset all sections
            upiDetails.classList.add('d-none');
            scanQrDetails.classList.add('d-none');
            verificationFormSection.classList.add('d-none');

            // Remove active class from all options
            paymentOptions.forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');

            amountField.value = "4300";

            const selectedOption = this.getAttribute('data-option');
            if (selectedOption === 'upi') {
                upiDetails.classList.remove('d-none');
                verificationFormSection.classList.remove('d-none');
            } else if (selectedOption === 'scanQr') {
                scanQrDetails.classList.remove('d-none');
                verificationFormSection.classList.remove('d-none');
            }
        });
    });
});