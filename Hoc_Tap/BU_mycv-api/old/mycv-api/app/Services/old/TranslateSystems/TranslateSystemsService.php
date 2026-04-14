<?php

namespace App\Services\TranslateSystems;
use Illuminate\Http\Request;
use App\Repositories\TranslateSystemsRepository;
use App\Services\TranslateSystems\TranslateSystemsInterface;

/**
 * Class UserService
 *
 * @package App\Services
 */
class TranslateSystemsService implements TranslateSystemsInterface
{
    protected $translateSystemsRepository;
    public function __construct(TranslateSystemsRepository $translateSystemsRepository)
   {
       $this->translateSystemsRepository = $translateSystemsRepository;
   }
   public function getTranslateSystemsList($params){
        return response() -> json( $this->translateSystemsRepository->index($params));      
   }
   public function getTranslateSystemsById($id){        
        return response() -> json($this->translateSystemsRepository->edit($id));
       
   }
   public function getTranslateSystemsCreate($params){                
        return response() -> json($this->translateSystemsRepository->create($params));
   }
   public function getTranslateSystemsUpdate($params, $id){        
        return response() -> json($this->translateSystemsRepository->update($params, $id));        
   }
   public function getTranslateSystemsDelete($id){       
        return response() -> json($this->translateSystemsRepository->delete($id));
   }
}