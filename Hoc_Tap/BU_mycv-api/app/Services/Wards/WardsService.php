<?php

namespace App\Services\Wards;
use Illuminate\Http\Request;
use App\Repositories\WardsRepository;
use App\Services\Wards\WardsInterface;

/**
 * Class UserService
 *
 * @package App\Services
 */
class WardsService implements WardsInterface
{
    protected $wardsRepository;
    public function __construct(WardsRepository $wardsRepository)
   {
       $this->wardsRepository = $wardsRepository;
   }
   public function getWardsList(Request $request){
        $params = $request -> all();
        return $this->wardsRepository->index($params);        
   }
   public function getWardsById($id){        
    return $this->wardsRepository->edit($id);
   }
   public function getWardsCreate(Request $request){ 
        $data = $request -> all(); 
        return $this->wardsRepository->create($data);      
        
   }
   public function getWardsUpdate(Request $request, $id){
        $params = $request -> all();        
        return $this->wardsRepository->update($params, $id);
       
   }
   public function getWardsDelete($id){   
    
    $model = $this->wardsRepository->delete($id);
    return [
        'code' => 200,
        'message' => 'Danh mục đã được xóa thành công',        
    ];
   }
   public function getStoreWardsApi(){
        return  $this->wardsRepository->getStoreWardsApi();
   }
}