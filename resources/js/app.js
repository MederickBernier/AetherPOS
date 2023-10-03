import './bootstrap';
import '../css/app.css';

$(document).ready(function () {
    $('.select2').select2({
        theme: 'bootstrap'
    });

    initializeInventorySearch();

    $('.toast').toast({
        delay:5000
    }).toast('show');

    initializeProgressBar();
});

function initializeInventorySearch() {
    let allItems = window.items;

    $('#searchItem').on('keyup', function() {
        let query = $(this).val().toLowerCase();

        if (!allItems.length) {
            console.log("No items in the inventory.");
            $('.inventory-list').html('<div class="inventory-item">No items found in the inventory.</div>');
            return;
        }

        if (query.length === 0) {
            // If the search bar is cleared, show all items
            $('.inventory-item').show();
            $('#addItemForm').slideUp();
            return;
        }

        let filteredItems = allItems.filter(item => item.name.toLowerCase().includes(query));

        if (filteredItems.length === 0) {
            $('#addItemForm').slideDown();
            $('.inventory-item').hide();
        } else {
            $('#addItemForm').slideUp();
            $('.inventory-item').each(function(index, itemDiv) {
                let itemName = $(itemDiv).find('.item-header').text().trim();
                if (itemName.toLowerCase().includes(query)) {
                    $(itemDiv).show();
                } else {
                    $(itemDiv).hide();
                }
            });
        }
    });
}

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
