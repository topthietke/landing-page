<?php

namespace App\Services\Languages;
use App\Services\Languages\LanguageInterface;
use App\Http\Traits\BackendApiTraits;
use App\Repositories\LanguagesRepository;
use Illuminate\Http\Request;

class LanguageService implements LanguageInterface
{    
    use BackendApiTraits;
    protected $languagesRepository;
    public function __construct(LanguagesRepository $languagesRepository) {
        $this->languagesRepository = $languagesRepository;
    }
   
    public function storeLanguageApi(){
        $url = 'https://restcountries.com/v3.1/all';
        $res = json_decode($this->apiLanguages($url));   
        
        foreach ($res as $key => $item) {            
            $params [] = [
                'name'       => $item -> name -> common,
                'code'       => $item -> flag,
                'status'     => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1
            ];
        }
        $data = $this->languagesRepository->storeLangauages($params);        
        return $data;
    }    
    public function getLanguageList($params){        
        $data = $this->languagesRepository->index($params);
        return [
            'code' => 200,
            'message' => "Tải ngôn ngữ ngôn ngữ thành công",
            'data' => $data
        ];
    }    

    public function getLanguagesById($id){
        $data = $this->languagesRepository->edit($id);
        return $data;
    }
    public function getLanguagesCreate($params){        
        $data = $this->languagesRepository->create($params);            
        return $data;
    }
    public function getLanguagesUpdate($params, $id){        
        $data = $this->languagesRepository->update($params, $id);
        return $data;
    }
    public function getLanguagesDelete($id){        
        $data = $this->languagesRepository->delete($id);
        return $data;
       
    }
}
