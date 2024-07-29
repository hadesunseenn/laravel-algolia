<?php
namespace Laracore\LaravelAlgolia\Commands;

use Algolia\AlgoliaSearch\SearchClient;
use Illuminate\Console\Command;
 
class TestAlgoliaConnectionCommand extends Command
{
    protected $signature = 'laracore-algolia:test-algolia-connection';
 
    protected $description = 'Test Algolia connection';
 
    public function handle()
    {
        $this->info('Testing Algolia connection...');
        try {
            $algoliaClient = SearchClient::create(
                config('laracore-algolia.application_id'),
                config('laracore-algolia.admin_key')
            );
            $algoliaClient->listIndices();
            $this->info('Algolia connection successful!');
        } catch (\Exception $e) {
            $this->error('Algolia connection failed: ' . $e->getMessage());
        }
        
    }
}