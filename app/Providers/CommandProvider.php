<?php

namespace App\Providers;

use Pgraph\Command\CommandProvider as Provider;

class CommandProvider extends Provider
{
    /**
     * Register your custom commands.
     *
     * @return void
     */
    public function commands(): void
    {
        // $this->register(CommandClassName::class, [callable $assembler = null]); 
    }
}