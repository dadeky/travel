<?php

namespace App\Listeners;

use App\Events\PersonCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPersonCreatedNotification implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PersonCreated  $event
     * @return void
     */
    public function handle(PersonCreated $event)
    {
        // email the person that he or she was created
        $email = 1;
    }
}
