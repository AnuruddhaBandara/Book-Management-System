<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BackupSystemData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:backup';
    protected $description = 'Backup system data into another database every week';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting system data backup...');

        // Assuming you have a "books" table
        $books = DB::connection('mysql')->table('books')->get();

        // Clear the backup table first (optional)
        DB::connection('mysql_backup')->table('books')->truncate();

        // Insert data into the backup database
        foreach ($books as $book) {
            DB::connection('mysql_backup')->table('books')->insert((array) $book);
        }

        $this->info('System data backup completed.');
    }
}
