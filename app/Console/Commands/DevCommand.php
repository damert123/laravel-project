<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $vkUrl = 'https://vk.com/kan0xa';
        $tgUrl = 'https://t.me/username';
        $invalidUrl = 'https://gfdsgsdfg/gfdsgsdf';

        function validateVkUrl($url) {
            return preg_match('/^https:\/\/vk\.com\/[A-Za-z0-9_.-]+$/', $url);
        }

        function validateTgUrl($url) {
            return preg_match('/^https:\/\/t\.me\/[A-Za-z0-9_.-]+$/', $url);
        }

        echo "VK URL valid: " . (validateVkUrl($vkUrl) ? 'true' : 'false') . "\n";
        echo "TG URL valid: " . (validateTgUrl($tgUrl) ? 'true' : 'false') . "\n";
        echo "Invalid URL valid: " . (validateVkUrl($invalidUrl) ? 'true' : 'false') . "\n";
    }
}
