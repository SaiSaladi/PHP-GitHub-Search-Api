<?php

/*
ApiController for rendering the form Search Page and processing
the data in the Response from Curl and storing in the database
and rendering the Table results Page.
*/

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Value;
class ApiController extends Controller
{
    public function results(Request $request)
    {   
        $fields = array();
        $values = array();
        $page = 1;
        $flag = 1;       
        
        try{
        $search = $request::get('search');
        $search = htmlentities($search, ENT_QUOTES, 'UTF-8', false);
        while($flag != 0)
        {
//creating curl request and passing in dynamically the search value
//Passing only the userid with the request, so can call only 10 times per minute
            
            $curl_url = 'https://api.github.com/search/repositories?q='.$search.'&sort=stars&order=desc&page='.$page;        
            $curl = curl_init($curl_url);
            curl_setopt_array($curl,array( CURLOPT_RETURNTRANSFER=>1, CURLOPT_USERAGENT=>'saladiphp'));
            $output = curl_exec($curl);
            curl_close($curl);
            $output = json_decode($output);    
            $obj1 = $output->{'items'};
            
//if the $obj1 is empty we have reached the end of the results
            
            if (empty($obj1))
                $flag = 0;
            $page++;
            if ($flag !=0)
            {
                $i = 0;
                $j = 0;
                $array = array($obj1);
                foreach( $array as $k=>$v)
                foreach( $v as $k1=>$v1)
                {
                    foreach($v1 as $k2=>$v2)
                    {
                        $fields[]=$k2;
                        $fields = array_unique($fields);
                        $values[$i][$k2]=$v1->$k2;
                        $j++;
//69 is the number of fields in the response data
                        
                        if ($j==69)
                        {
                            $i++;
                            $j=0;
                        }
                    }
                }


//Storing Values in Database table (Values)        
                $x = 0;

                while($x<count($values)){
//To check duplicate records updated instead of inserted
                    $checkval = \App\value::where('id',$values[$x]['id'])->first();
                        if ($checkval){
                            $checkval->name = $values[$x]['name'];
                            $checkval->html_url = $values[$x]['html_url'];
                            $checkval->made_at = $values[$x]['created_at'];
                            $checkval->pushed_at = $values[$x]['pushed_at'];
                            $checkval->description = $values[$x]['description'];
                            $checkval->stargazers_count = $values[$x]['stargazers_count'];
                            $checkval->save();
                            $x++;        
                        }
                        else{
//To insert new values                            
                            $value = new Value;
                            $value->id = $values[$x]['id'];
                            $value->name = $values[$x]['name'];
                            $value->html_url = $values[$x]['html_url'];
                            $value->made_at = $values[$x]['created_at'];
                            $value->pushed_at = $values[$x]['pushed_at'];
                            $value->description = $values[$x]['description'];
                            $value->stargazers_count = $values[$x]['stargazers_count'];
                            $value->save();
                            $x++;
                        }
                }
                
                unset($fields);
                unset($values);
            }
        }    
        }
        finally{
        $values = \App\value::paginate(10);
        return view('GitApi.results', compact('values'));
        }
        
    }   
    
    public function search()
    {
        
        return view('GitApi.search');
        
    }   
    
}