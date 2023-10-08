@extends('layouts.app')

@section('content')
<script>
    window.items = @json($items);
</script>
<div class="container-fluid"> <!-- Full width container -->
    <div class="row">
        <div class="col-12 text-center">
            <h1>{{ $title }}</h1>
        </div>
    </div>
    <div class="row">
        <!-- Items Section -->
        <div class="col-lg-8 col-md-12 col-sm-12 item-section">
            <div class="row">
                @foreach($items as $item)
                <div class="col-lg-2 col-md-3 col-sm-6 mb-3 d-flex align-items-stretch">
                    <button class="btn btn-primary btn-block item-button flex-fill d-flex flex-column justify-content-center" data-item-id="{{ $item->id }}" data-item-price="{{ $item->price }}">
                        {{ $item->name }} <br> {{ $item->price }} Gil
                    </button>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Transaction List Section -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="transaction-list bg-white p-3 rounded shadow-sm">
                <h4>Transaction</h4>
                <ul id="transaction-list" class="list-group collapse"> <!-- Collapsed by default -->
                    <!-- Items will be added here dynamically using jQuery -->
                </ul>
                <div class="mt-3">
                    <strong>Total: </strong><span id="total-price">0</span> Gil
                </div>
                <button id="finalize-transaction" class="btn btn-success btn-block mt-3">Finish Transaction</button>
                <button id="toggle-transaction-list" class="btn btn-light btn-block mt-3 d-lg-none">
                    <i class="bi bi-chevron-up"></i> Show/Hide Transaction
                </button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="user-id" value="{{ auth()->id() }}">

<script>
    $(document).ready(function() {
        let total = 0;

        // Set up CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Collapse the transaction list on mobile by default
        if ($(window).width() <= 767.98) {
            $('#transaction-list').addClass('collapse');
        } else {
            $('#transaction-list').removeClass('collapse');
        }

        $('.item-button').click(function() {
            const itemId = $(this).data('item-id');
            const itemPrice = parseFloat($(this).data('item-price'));
            const itemName = $(this).text();

            // Check if item is already in the list
            const existingItem = $(`#item-${itemId}`);
            if (existingItem.length) {
                const quantity = parseInt(existingItem.data('quantity')) + 1;
                existingItem.data('quantity', quantity);
                existingItem.find('.item-quantity').text(quantity);
                existingItem.find('.item-total-price').text((itemPrice * quantity).toFixed(2) + " Gil"); // Update total price for the item
            } else {
                const listItem = `
                    <li class="list-group-item d-flex justify-content-between align-items-center" id="item-${itemId}" data-item-id="${itemId}" data-quantity="1">
                        <div>
                            ${itemName.split(" - ")[0]} <br>
                            <small>Quantity: <span class="item-quantity">1</span></small>
                        </div>
                        <div>
                            <span class="item-total-price">${itemPrice.toFixed(2)} Gil</span>
                            <button class="btn btn-sm btn-danger ml-2 remove-item">x</button>
                        </div>
                    </li>
                `;
                $('#transaction-list').append(listItem);
            }

            // Update total
            total += itemPrice;
            $('#total-price').text(total.toFixed(2));
        });

        // Remove item from transaction list
        $(document).on('click', '.remove-item', function() {
            const listItem = $(this).closest('li');
            const itemPrice = parseFloat(listItem.data('item-price'));
            const quantity = parseInt(listItem.data('quantity'));

            // Update total
            total -= itemPrice * quantity;
            $('#total-price').text(total.toFixed(2));

            listItem.remove();
        });

        // Toggle transaction list (only for mobile and medium)
        $('#toggle-transaction-list').click(function() {
            $('#transaction-list').collapse('toggle');
        });

        // Finalize transaction
        $('#finalize-transaction').click(function() {
            const userId = $('#user-id').val();
            const items = [];

            $('#transaction-list li').each(function() {
                const itemId = $(this).data('item-id');
                const quantity = $(this).data('quantity');
                items.push({ id: itemId, quantity: quantity });
            });

            const data = {
                user_id: userId,
                items: items
            };

            $.post('/transactions', data, function(response) {
                // Refresh the page to see the notification
                location.reload();
            });
        });
    });
</script>

<style>
    .item-button {
        height: 100px; /* Adjust this value if needed */
        margin: 1px; /* Small margin around each button */
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .item-button {
            height: calc(100% + 10px); /* Adjusting the height */
        }
    }

    @media (max-width: 991.98px) { <!-- Adjusted for medium devices too -->
        .item-button {
            height: auto;
        }

        .transaction-list {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .item-section {
            padding-bottom: 230px; /* Adjusted padding to ensure no scrollbar */
        }

        #transaction-list {
            max-height: 200px; /* Adjust this value if needed */
            overflow-y: auto;
        }

        #toggle-transaction-list {
            display: block; /* Show the button on mobile and medium devices */
        }
    }
</style>
@endsection
