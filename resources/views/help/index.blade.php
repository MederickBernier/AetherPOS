@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1>Help & Documentation</h1>
    </div>

    <!-- Table of Contents -->
    <div class="mb-5">
        <h3>Table of Contents</h3>
        <ul>
            <li><a href="#introduction"><i class="bi bi-info-circle-fill"></i> Introduction</a></li>
            <li><a href="#modules"><i class="bi bi-grid-fill"></i> Modules</a></li>
            <li><a href="#terms"><i class="bi bi-book-fill"></i> Terms & Definitions</a></li>
            <li><a href="#faq"><i class="bi bi-question-circle-fill"></i> Frequently Asked Questions</a></li>
        </ul>
    </div>

    <!-- Introduction -->
    <div id="introduction" class="mb-5">
        <h3>Introduction</h3>
        <p>
            Welcome to the Aether POS System, the premier transaction and inventory management solution crafted exclusively for Free Companies in Eorzea. As the backbone of Eorzean communities, Free Companies require specialized tools to manage their vast resources, events, and member benefits. Our platform is designed with this in mind, ensuring that FC leaders and members alike have a seamless and efficient experience.
        </p>
        <p>
            In the vibrant realm of Eorzea, Free Companies stand as pillars of camaraderie, collaboration, and commerce. The Aether POS System recognizes the unique challenges and opportunities that FCs face, offering tailored features to enhance their operations.
        </p>
        <p>
            Features at a Glance:
            <ul>
                <li>Inventory Management: Organize and track FC resources with ease, ensuring that members always have access to the items they need.</li>
                <li>Event-Based Pricing: Hosting an FC event? Adjust prices on the fly and offer special discounts to make the event memorable.</li>
                <li>User-Friendly Interface: Whether you're an FC leader or a new recruit, our platform is intuitive and straightforward.</li>
                <li>Special FC Member Transactions: Recognize and reward your members with the ability to process transactions at no cost during specific events.</li>
                <li>Detailed Transaction Logs: Maintain transparency within the FC by recording every transaction, from sales to member distributions.</li>
            </ul>
        </p>
        <p>
            The Aether POS System is more than just a tool; it's a partner in strengthening the bonds and operations of your Free Company. Explore its myriad features, and should you ever need guidance, our help section is here to assist you every step of the way.
        </p>
    </div>

   <!-- Modules -->
    <div id="modules" class="mb-5">
        <h3>Modules</h3>
        <div class="accordion" id="modulesAccordion">

            <!-- Point of Sale (POS) System -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingPOS">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePOS" aria-expanded="false" aria-controls="collapsePOS">
                        Point of Sale (POS) System
                    </button>
                </h2>
                <div id="collapsePOS" class="accordion-collapse collapse" aria-labelledby="headingPOS" data-bs-parent="#modulesAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Select items from the inventory to add to the transaction.</li>
                            <li>View total transaction amount in real-time.</li>
                            <li>Apply discounts or special pricing during events.</li>
                            <li>Finalize transactions with a single click.</li>
                            <li>How to use: Navigate to the POS interface, select items, adjust quantities, and click on "Finish Transaction".</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Inventory Management -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingInventory">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInventory" aria-expanded="false" aria-controls="collapseInventory">
                        Inventory Management
                    </button>
                </h2>
                <div id="collapseInventory" class="accordion-collapse collapse" aria-labelledby="headingInventory" data-bs-parent="#modulesAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Add new items to the inventory.</li>
                            <li>Update item details like name, price, and stock quantity.</li>
                            <li>Set restocking thresholds for notifications.</li>
                            <li>View out-of-stock or low-stock items.</li>
                            <li>How to use: Navigate to the Inventory section, use the "Add Item" button or select an existing item to edit its details.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Event Management -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingEvent">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEvent" aria-expanded="false" aria-controls="collapseEvent">
                        Event Management
                    </button>
                </h2>
                <div id="collapseEvent" class="accordion-collapse collapse" aria-labelledby="headingEvent" data-bs-parent="#modulesAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Create new events with start and end timestamps.</li>
                            <li>Associate special pricing or discounts with items during the event.</li>
                            <li>View all upcoming, ongoing, and past events.</li>
                            <li>How to use: Navigate to the Events section, use the "Create Event" button, and fill in the event details.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- User Management -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingUser">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                        User Management
                    </button>
                </h2>
                <div id="collapseUser" class="accordion-collapse collapse" aria-labelledby="headingUser" data-bs-parent="#modulesAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Add new users to the system.</li>
                            <li>Assign roles and permissions to users.</li>
                            <li>View and manage the list of all users.</li>
                            <li>How to use: Navigate to the Users section, use the "Add User" button or select an existing user to edit their roles and permissions.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Transaction History & Logs -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTransaction">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTransaction" aria-expanded="false" aria-controls="collapseTransaction">
                        Transaction History & Logs
                    </button>
                </h2>
                <div id="collapseTransaction" class="accordion-collapse collapse" aria-labelledby="headingTransaction" data-bs-parent="#modulesAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>View a detailed log of all transactions.</li>
                            <li>Filter transactions by date, user, or item.</li>
                            <li>Export transaction logs for external analysis.</li>
                            <li>How to use: Navigate to the Transaction Logs section and use the filters or search bar to find specific transactions.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FC Member Special Transactions -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFC">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFC" aria-expanded="false" aria-controls="collapseFC">
                        FC Member Special Transactions
                    </button>
                </h2>
                <div id="collapseFC" class="accordion-collapse collapse" aria-labelledby="headingFC" data-bs-parent="#modulesAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Recognize FC members during transactions.</li>
                            <li>Process transactions at no cost for FC members during specific events.</li>
                            <li>How to use: During a transaction, check the "FC Member Purchase" checkbox before finalizing the transaction.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Notifications & Alerts -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingNotifications">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNotifications" aria-expanded="false" aria-controls="collapseNotifications">
                        Notifications & Alerts
                    </button>
                </h2>
                <div id="collapseNotifications" class="accordion-collapse collapse" aria-labelledby="headingNotifications" data-bs-parent="#modulesAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Receive notifications for low stock items.</li>
                            <li>Get alerts for upcoming events or system updates.</li>
                            <li>How to use: Notifications will appear on the dashboard or can be accessed from the Notifications section.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Help & Documentation -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingHelp">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHelp" aria-expanded="false" aria-controls="collapseHelp">
                        Help & Documentation
                    </button>
                </h2>
                <div id="collapseHelp" class="accordion-collapse collapse" aria-labelledby="headingHelp" data-bs-parent="#modulesAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Access a comprehensive guide to using the application.</li>
                            <li>Find answers to frequently asked questions.</li>
                            <li>How to use: Navigate to this Help & Documentation section whenever you need guidance or have questions.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Terms & Definitions -->
    <div id="terms" class="mb-5">
        <h3>Terms & Definitions</h3>
        <div class="accordion" id="termsAccordion">

            <!-- Inventory Terms -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingInventoryTerms">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInventoryTerms" aria-expanded="false" aria-controls="collapseInventoryTerms">
                        Inventory
                    </button>
                </h2>
                <div id="collapseInventoryTerms" class="accordion-collapse collapse" aria-labelledby="headingInventoryTerms" data-bs-parent="#termsAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>Item Name:</strong> The unique identifier or title of an item in the inventory.</li>
                            <li><strong>Description:</strong> A brief summary or explanation about the item, detailing its characteristics or use.</li>
                            <li><strong>Quantity:</strong> The number of units of a particular item available in the inventory.</li>
                            <li><strong>Threshold:</strong> A predefined limit that, when the quantity of an item falls below, triggers a notification or alert indicating that the item is running low.</li>
                            <li><strong>Price:</strong> The cost of a single unit of the item in Gil.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Menus Terms -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingMenusTerms">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMenusTerms">
                        Menus
                    </button>
                </h2>
                <div id="collapseMenusTerms" class="accordion-collapse collapse" aria-labelledby="headingMenusTerms" data-bs-parent="#termsAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>Adjustment Type:</strong> The method used to modify the price of items during an event. This can be either a special price set for the event or a discount percentage applied to the original price.</li>
                            <li><strong>Special Price:</strong> A unique price set for an item specifically for the duration of an event.</li>
                            <li><strong>Discount:</strong> A percentage reduction applied to the original price of an item during an event.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Event Terms -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingEventTerms">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEventTerms">
                        Event
                    </button>
                </h2>
                <div id="collapseEventTerms" class="accordion-collapse collapse" aria-labelledby="headingEventTerms" data-bs-parent="#termsAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>Residential District:</strong> The specific region or area in Eorzea where the event is taking place.</li>
                            <li><strong>Ward:</strong> A subdivision within the residential district where the event is located.</li>
                            <li><strong>Plot:</strong> The exact location or piece of land within the ward where the event is held.</li>
                            <li><strong>Assigned Menu:</strong> The list of items, along with their adjusted prices or discounts, available for purchase during the event.</li>
                            <li><strong>Start Date & Time:</strong> The date and time when the event begins.</li>
                            <li><strong>End Date & Time:</strong> The date and time when the event concludes.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Management User Terms -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingManagementUserTerms">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseManagementUserTerms">
                        Management User
                    </button>
                </h2>
                <div id="collapseManagementUserTerms" class="accordion-collapse collapse" aria-labelledby="headingManagementUserTerms" data-bs-parent="#termsAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>Character First Name & Last Name:</strong> The in-game name of the user's character in Eorzea.</li>
                            <li><strong>Server:</strong> The specific game server on which the user's character resides.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Management Transactions Terms -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingManagementTransactionsTerms">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseManagementTransactionsTerms">
                        Management Transactions
                    </button>
                </h2>
                <div id="collapseManagementTransactionsTerms" class="accordion-collapse collapse" aria-labelledby="headingManagementTransactionsTerms" data-bs-parent="#termsAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>Total Amount:</strong> The total cost of the transaction. If it's 0, it indicates a complimentary transaction, typically for FC members during specific events. If there's a price, it represents the total amount paid for the items.</li>
                            <li><strong>is FC Member:</strong> Indicates whether the transaction was made by a Free Company member. If true, certain benefits or discounts might apply.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- POS Terms -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingPOSTerms">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePOSTerms">
                        POS (Point of Sale)
                    </button>
                </h2>
                <div id="collapsePOSTerms" class="accordion-collapse collapse" aria-labelledby="headingPOSTerms" data-bs-parent="#termsAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>Item List:</strong> A display of available items for purchase.</li>
                            <li><strong>Transaction List:</strong> A summary of items selected for purchase during a transaction.</li>
                            <li><strong>FC Member Purchase:</strong> A checkbox indicating whether the transaction is for a Free Company member, which might affect the total amount due.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Frequently Asked Questions -->
    <div id="faq" class="mb-5">
        <h3>Frequently Asked Questions</h3>
        <dl>
            <dt>What is the Aether POS System?</dt>
            <dd>The Aether POS System is a transaction and inventory management solution designed specifically for Free Companies in Eorzea. It helps manage inventory, events, user profiles, and transactions, ensuring a seamless experience for FC leaders and members.</dd>

            <dt>How do I add items to the inventory?</dt>
            <dd>Items can be added to the inventory through the "Inventory" module. Simply navigate to the module, click on "Add Item," and fill in the necessary details such as item name, description, price, and quantity.</dd>

            <dt>How do I adjust prices for specific events?</dt>
            <dd>You can adjust prices for specific events using the "Menus" module. When creating or editing a menu, you have the option to set special prices or discounts for items. These adjusted prices will be applied during events associated with that menu.</dd>

            <dt>Can I offer items for free during special events?</dt>
            <dd>Yes, you can set the price of items to zero during special events using the "Menus" module. This allows you to offer complimentary items to members during specific events.</dd>

            <dt>How do I track transactions made by FC members?</dt>
            <dd>All transactions are recorded and can be viewed in the "Management Transactions" module. This module provides detailed information about each transaction, including the user, items purchased, total amount, and associated event.</dd>

            <dt>What does the "FC Member Purchase" option in the POS module do?</dt>
            <dd>The "FC Member Purchase" option in the POS module allows you to process transactions for FC members at no cost during specific events. This is a special feature to recognize and reward FC members.</dd>

            <dt>How do I contact support if I encounter issues?</dt>
            <dd>If you face any issues or have further questions, you can reach out to our support team through Discord. Username: <strong>_neiwa</strong>.</dd>
        </dl>
    </div>
</div>
@endsection
