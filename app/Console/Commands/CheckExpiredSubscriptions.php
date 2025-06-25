<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SubscriptionService;

class CheckExpiredSubscriptions extends Command
{
    protected $signature = 'subscriptions:check-expired';
    protected $description = 'Check and handle expired subscriptions';

    public function __construct(
        private SubscriptionService $subscriptionService
    ) {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Checking expired subscriptions...');
        
        $expiredCount = $this->subscriptionService->checkExpiredSubscriptions();
        
        $this->info("Processed {$expiredCount} expired subscriptions.");
        
        return Command::SUCCESS;
    }
}
