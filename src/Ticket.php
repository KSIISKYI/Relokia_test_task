<?php

namespace App;

use App\Loaders\{GroupDataLoader, UserDataLoader, CompanyDataLoader};

class Ticket
{
    public $ticket_id;
    public $description;
    public $status;
    public $priority;
    public $submitter_id;
    public $submitter_name;
    public $submitter_email;
    public $requester_id;
    public $requester_name;
    public $requester_email;
    public $group_id;
    public $group_name;
    public $compan_id;
    public $company_name;

    public function __construct(array $ticketData)
    {
        $creditals = [
            $_ENV['URL'], 
            $_ENV['EMAIL'],
            $_ENV['PASSWORD'], 
            $_ENV['TOKEN']
        ];

        $groupLoader = new GroupDataLoader(...$creditals);
        $userLoader = new UserDataLoader(...$creditals);
        $companyLoader = new CompanyDataLoader(...$creditals);

        $submitter = $userLoader->sendRequest($ticketData['submitter_id']);
        $requester = $userLoader->sendRequest($ticketData['requester_id']);
        $group = $groupLoader->sendRequest($ticketData['group_id']);

        $this->ticket_id = $ticketData['id'];
        $this->description = $ticketData['description'];
        $this->status = $ticketData['status'];
        $this->priority = $ticketData['priority'];
        $this->submitter_id = $ticketData['submitter_id'];
        $this->submitter_name = $submitter['user']['name'];
        $this->submitter_email = $submitter['user']['email'];
        $this->requester_id = $ticketData['requester_id'];
        $this->requester_name = $requester['user']['name'];
        $this->requester_email = $requester['user']['email'];
        $this->group_id = $ticketData['group_id'];
        $this->group_name = $group['group']['name'];
        $this->compan_id = $ticketData['organization_id'];
        $this->company_name = $ticketData['organization_id'];
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
