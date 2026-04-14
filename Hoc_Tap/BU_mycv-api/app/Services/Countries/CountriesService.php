<?php

namespace App\Services\Countries;
use Illuminate\Http\Request;
use App\Http\Traits\BackendApiTraits;
use App\Repositories\CountriesRepository;
use App\Services\Countries\CountriesInterface;
use App\Helpers\Helper;
class CountriesService implements CountriesInterface
{    
    use BackendApiTraits;
    protected $countriesRepository;
    public function __construct(CountriesRepository $countriesRepository) {
        $this->countriesRepository = $countriesRepository;
    }  
   
    public function storeCountriesApi(){

        $url = 'https://restcountries.com/v3.1/all';
        $res = json_decode($this->apiCountries($url));   
       
        foreach ($res as $key => $item) {            
            if(!empty($item ->capital)) $capital = $item ->capital;
            else $capital = null;
            if(!empty($item->idd) && !empty($item->idd->root)) $phone_area_code = $item->idd->root . $item->idd->suffixes[0];
            else  $phone_area_code = null;            
            $data [] = [                
                'name' => $item -> name -> common?? null,
                'slug' =>  $item -> name -> common ? slug($item -> name -> common) : null,
                'symbol' => $item -> flag?? null,
                'official' => $item -> name -> official?? null,
                'capital' => $capital? $capital[0] : null,
                'region' => $item -> region?? null,
                'subregion' => $item -> subregion?? null,
                'phone_area_code' =>$phone_area_code?? null,
                'population' => $item -> population?? null,
                'flags' => $item -> flags -> png?? null,
                'coatOfArms' => $item ->coatOfArms -> png?? null,   
                'maps' => $item -> maps -> googleMaps?? null,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                // 'nativeName' => $item -> name -> nativeName?? null,                
                // 'currencies' => $item ->currencies?? null,                
                // 'languages' => $item -> languages?? null,
                // 'timezones' => $item -> timezones ? $item -> timezones : null,                

            ];
        }       
        
        $data = $this->countriesRepository->storeCountries($data);      
        return $data;
    }    

    public function getCountriesList($params){        
        $data =  $this->countriesRepository->index($params);
        return $data;        
   }
   public function getCountriesById($id){        
        $data =  $this->countriesRepository->edit($id);
        return $data;
        
   }
   public function getCountriesCreate($params){            
        $data =  $this->countriesRepository->create($params); 
        return $data;
   }
   public function getCountriesUpdate($params, $id){             
        $data =  $this->countriesRepository->update($params, $id);
        return $data;
   }
   public function getCountriesDelete($id){       
        $data = $this->countriesRepository->delete($id);
        return $data;

   }
}
