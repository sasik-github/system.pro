<?php

namespace App\Console\Commands;

use App\SMS\SMSGateway;
use Illuminate\Console\Command;

class SendSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send {telephone} {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms to a telephone number';

    /**
     * @var SMSGateway
     */
    private $SMSGateway;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SMSGateway $SMSGateway)
    {
        parent::__construct();

        $this->SMSGateway = $SMSGateway;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $telephone = $this->argument('telephone');
        $message = $this->argument('message');

        $this->SMSGateway->send($telephone, $message);
    }
}
