<?php

namespace App\Services\ForeignLanguages;
use Illuminate\Http\Request;
use App\Repositories\ForeignLanguagesRepository;
use App\Services\ForeignLanguages\ForeignLanguagesInterface;

/**
 * Class UserService
 *
 * @package App\Services
 */
class ForeignLanguagesService implements ForeignLanguagesInterface
{
    protected $foreignLanguagesRepository;
    public function __construct(ForeignLanguagesRepository $foreignLanguagesRepository)
   {
       $this->foreignLanguagesRepository = $foreignLanguagesRepository;
   }
   public function getForeignLanguagesList($params){        
        $data = $this->foreignLanguagesRepository->index($params);
        return $data;
   }
   public function getForeignLanguagesById($id){             
        $data = $this->foreignLanguagesRepository->edit($id);      
        return $data;
   }
   public function getForeignLanguagesCreate($params){                
        $data = $this->foreignLanguagesRepository->create($params);  
        return $data;
   }
   public function getForeignLanguagesUpdate($params, $id){        
        $data = $this->foreignLanguagesRepository->update($params, $id);
        return $data;
   }
   public function getForeignLanguagesDelete($id){   
        $data = $this->foreignLanguagesRepository->delete($id);
        return $data;
   }
} 