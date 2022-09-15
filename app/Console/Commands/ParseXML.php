<?php

namespace App\Console\Commands;

use App\Support\DbService;
use Illuminate\Console\Command;
use App\Support\XMLParser;

class ParseXML extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:parseXML {file=/app/storage/data/data.xml}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse XML file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $parser = new XMLParser($this->argument('file'));
        $dbService  = new DbService;

        $dbService->upsert($parser->parse());
        $dbService->purgeDb($parser->getIds());

        return 0;
    }
}
