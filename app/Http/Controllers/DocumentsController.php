<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\car as car;
use Elasticsearch\ClientBuilder as ES;

class DocumentsController extends Controller
{
    //
     
     public function show($str)
     {
     	$client = ES::create()->build();
     	$temp=json_decode('{
						  "query": {
						    "bool": {
						      "should": [
						        {
						          "match": {
						            "_all": {
						              "query": "",
						              "operator": "and",
						              "fuzziness": "auto"
						              
						            }
						          }
						        },
						        {
						          "match": {
						            "_all": {
						              "query": "",
						              "operator": "and",
						              "boost":5
						            }
						          }
						        }
						      ]
						    }
						  },
						  "aggs": {
						    
						    "type_aggregation": {
						      "terms": {
						        "field": "vehicle_type"
						      },
						      "aggs": {
						        "top_hits": {
						          "top_hits": {
						            "size": 5
						          }
						        }
						      }
						    }
						  }
						}',true);
						$temp["query"]["bool"]["should"][0]["match"]["_all"]["query"]=$str;
						$temp["query"]["bool"]["should"][1]["match"]["_all"]["query"]=$str;
     	$params = [
				    'index' => 'test_index',
				    'size'=> 5,
				    'body' => $temp
				];
		$results = $client->search($params);
		$finavalue=$results["hits"]["hits"];
		$searchresults=[];
		foreach($finavalue as $result)
		{
			$tempvariable;
			$tempvariable["category_name"]=$result["_source"]["category_name"];

			if(array_key_exists("location", $result["_source"]))
			$tempvariable["location"]=$result["_source"]["location"];
			else
			$tempvariable["location"]="Unknown";	

			if(array_key_exists("kms_driven", $result["_source"]))
			$tempvariable["kms_driven"]=$result["_source"]["kms_driven"];
			else
			$tempvariable["kms_driven"]="Unknown";


			if(array_key_exists("photos", $result["_source"]))
			$tempvariable["photos"]=$result["_source"]["photos"];
			else
			$tempvariable["photos"]="photos/listing/2015-10-14/0ec9db5e58c8439cab35147de1e7f62_web_thumb.png";


			if(array_key_exists("fuel_type", $result["_source"]))
			$tempvariable["fuel_type"]=$result["_source"]["fuel_type"];
			else
			$tempvariable["fuel_type"]="Unknown";


			$tempvariable["product_title"]=$result["_source"]["product_title"];
			$tempvariable["listing_alias"]=$result["_source"]["listing_alias"];
			array_push($searchresults, $tempvariable);
		}
		return ($searchresults);
     }
}
