<?php

require '../vendor/autoload.php';

use App\{Keeper, Ticket};

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

function run()
{
    $keeper = new Keeper('tickets.csv');

    $keeper->writeLine([
        'Ticket ID', 
        'Description', 
        'Status', 
        'Priority', 
        'Agent ID', 
        'Agent Name', 
        'Agent Email', 
        'Contact ID', 
        'Contact Name', 
        'Contact Email', 
        'Group ID', 
        'Group Name', 
        'Company ID', 
        'Company Name',
        'Comments'
    ]);

    $ticketLoader = new App\Loaders\TicketDataLoader(
        $_ENV['URL'], 
        $_ENV['EMAIL'], 
        10, 
        $_ENV['PASSWORD'], 
        $_ENV['TOKEN']
    );

    while (true) {
        $data = $ticketLoader->sendRequest();
        
        for($i = 0; $i < count($data['tickets']); $i++) {
            $ticket = new Ticket($data['tickets'][$i]);

            $keeper->writeLine($ticket->toArray());
        }

        if (!$data['next_page']) {
            break;
        }
    }
}

run();
