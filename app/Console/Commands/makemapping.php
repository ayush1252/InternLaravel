<?php

namespace App\Console\Commands;
use App\car as car;
use Elasticsearch\ClientBuilder as ES;

use Illuminate\Console\Command;

class makemapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:makemapping';

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
        //

        $client = ES::create()->build();
        $settings=json_decode('{
                                  "analysis": {
                                     "filter": {
                                        "nGram_filter": {
                                           "type": "nGram",
                                           "min_gram": 2,
                                           "max_gram": 20,
                                           "token_chars": [
                                              "letter",
                                              "digit",
                                              "punctuation",
                                              "symbol"
                                           ]
                                        }
                                     },
                                     
                                      "analyzer": {
                                        "nGram_analyzer": {
                                           "type": "custom",
                                           "tokenizer": "whitespace",
                                           "filter": [
                                              "lowercase",
                                              "asciifolding",
                                              "nGram_filter"
                                           ]
                                        },
                                        "whitespace_analyzer": {
                                           "type": "custom",
                                           "tokenizer": "whitespace",
                                           "filter": [
                                              "lowercase",
                                              "asciifolding"
                                           ]
                                        }
                                     }
                                  }
                               }');
        $params = [
            'index' => 'test_index',
            'body' => [
                        'settings' => $settings
                        ]
        ];
        $onemapping=json_decode('{
                                  "_all": {
                                            "analyzer": "nGram_analyzer",
                                            "search_analyzer": "whitespace_analyzer"
                                         },
                                      "properties": {
                                        "lid": {
                                            "type": "integer",
                                            "index": false,
                                            "include_in_all": false
                                         },
                                         "photos":{
                                           "type": "text",
                                           "index": false,
                                           "include_in_all": false
                                         },
                                         "kms_driven":{
                                           "type": "keyword"
                                         },
                                         "category_name":{
                                           "type": "keyword"
                                         },
                                         "make": {
                                            "type": "text"
                                         },
                                         "model": {
                                            "type": "text"
                                         },
                                         "year":{
                                           "type": "keyword"
                                         },
                                         "trim":{
                                           "type": "text",
                                           "boost": 2
                                         },
                                         "exterior_color":{
                                           "type": "keyword"
                                         },
                                         "body_type":{
                                           "type": "text"
                                         },
                                         "fuel_type":{
                                           "type": "text"
                                         },
                                         "location":{
                                           "type": "text"
                                           
                                         },
                                         "listing_alias":{
                                           "type": "text",
                                           "include_in_all": false,
                                           "index": false
                                         },
                                         "product_title":{
                                           "type": "text",
                                           "include_in_all": false,
                                           "index": false
                                         }
                                         
                                      
                                      }
                                }');    

        // Create the index
        $response = $client->indices()->create($params);
        var_dump($response);

        $users = car::distinct()->get(['category_name']);
        foreach($users as $user)
        {
           $current_vehcile_type=$user["attributes"][0];
            $params = [
                'index' => 'test_index',
                'type' => $current_vehcile_type,
                'body' => [
                    $current_vehcile_type => $onemapping   
                ]
            ];
        $response=$client->indices()->putMapping($params);
        var_dump ($response);
        }

    }
}
