<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\car as car;
use Elasticsearch\ClientBuilder as ES;

class ImportListings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:importlistings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        set_time_limit(500);
        //temporary counter
        //$count=0;
        $client = ES::create()->build();
         $users = car::all();
           foreach ($users as $user) {
             
            $temp=$user['attributes']; 
            unset($temp['_id']);
                 $params = [
                  'index' => 'test_index',
                  'type' => $temp['category_name'],
                  'id' => $temp['lid'],
                  'body' => $temp
                ];
             $response = $client->index($params);
             //Dummy value to count listed documents
             // $count=$count+1;
             // echo $count;
             // echo "\n";
         }        
         
                  
    }
}
