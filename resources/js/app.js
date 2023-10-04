import './bootstrap';
import '../css/app.css';

$(document).ready(function () {

    $('.toast').toast({
        delay:5000
    }).toast('show');

    initializeProgressBar();
});

function initializeProgressBar() {
    let progressBarInterval = setInterval(updateProgressBar, 1000);

    function updateProgressBar() {
        let currentValue = parseFloat($('.progress-bar').attr('aria-valuenow'));
        let newValue = currentValue - 1.67;

        if (newValue < 0) newValue = 0;

        $('.progress-bar').css('width', newValue + '%').attr('aria-valuenow', newValue);

        if (newValue === 0) {
            clearInterval(progressBarInterval);
            progressBarInterval = setInterval(updateProgressBar, 1000);
        }
    }
}
