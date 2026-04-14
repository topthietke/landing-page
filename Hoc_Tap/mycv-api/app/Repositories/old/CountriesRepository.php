<?php

namespace App\Repositories;
use App\Models\Api\Countries;

/**
 * Class LanguagesRepository
 *
 * @package App\Repositories
 */
class CountriesRepository
{

    private $countries;
    public function __construct(Countries $countries)
    {
        $this->countries = $countries;
    }

    public function storeCountries($params){      
        try {
            $model = $this->countries->insert($params);
            if($model === true){
                $data = [
                    'code' => 200,
                    'message' => 'Thêm mới danh sách quốc gia thành công'
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Thêm mới danh sách quốc gia không thành công'
                ];
            }
        } catch (\Exception $e) {
                $data = [
                    'code' => 202,
                    'message' => $e -> getMessage()
                ];
        }  
        
        return $data;
        
    }
    
    public function index($params)
    {      
        try {
            $model = $this->countries->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',$this->countries->Active());
            if(isset($params) && !empty($params)){
                $model = $model -> where($params);
            }            
                $model = $model->get();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách quốc gia thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách quốc gia không thành công',
                    'data' => null
                ];
            }
        } catch (\Exception $e) {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách quốc gia không thành công',
                    'data' => null
                ];
        } 
        return $data;
    }

    public function edit($id)
    {      
        try {
            $model = $this->countries->where('id',$id)
                    ->whereNull('deleted_at')
                    ->where('status', $this->countries->Active())
                    ->first();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Xem chi tiết quốc gia thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Xem chi tiết quốc gia không thành công',
                    'data' => null
                ];
            }
        } 
        catch (\Exception $e) {
            $data = [
                    'code' => 202,
                    'message' => $e->getMessage(),
                    'data' => null
            ];
        } 
            return $data;
    }

    public function create($params)
    {          
        
        try {            
            $model = $this->countries ->where('slug',$params['slug']) ->first();
            if(empty($model)){
                $add = $this->countries->insert($params);
                if($add == true){
                    $data = [
                        'code' => 200,
                        'message' => 'Thêm mới quốc gia thành công'
                    ];
                }
                else{
                    $data = [
                        'code' => 201,
                        'message' => 'Thêm mới quốc gia không thành công'
                    ];
                }
                
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Quôc gia này đã tồn tại vui lòng chọn quốc gia khác'                    
                ];
            }
        } catch (\Exception $e) {            
            $data = [
                'code' => 202,
                'message' => $e -> getMessage()
               
            ];
        }          
        return $data;
    }

    public function update($params, $id)
    {     
        
        try {
            $params['updated_by'] = $this->countries->UPDATED_BY();
            $model =$this->countries->where('id', (int)$id)->first()->update($params);   
            if($model == true){
                $data = [
                    'code' => 200,
                    'message' => 'Cập nhật quốc gia thành công'
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Cập nhật quốc gia không thành công'
                ];
            } 
        } catch (\Exception $e) {            
            $data = [
                'code' => 201,
                'message' => $e -> getMessage()
            ];
        }                
        return $data;
    }
    public function delete($id)
    {   
        try {
            $model =$this->countries->where('id',$id)->first()
            ->update([
                'status' => $this->countries->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->countries->DELETED_BY()
            ]);            
            if($model == true){
                $data = [
                    'code' => 200,
                    'message' => 'Xóa bỏ quốc gia thành công'
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Xóa bỏ quốc gia không thành công'
                ];
            } 
        } catch (\Exception $e) {          
            $data = [
                'code' => 200,
                'message' => $e -> getMessage()
            ];
        }
        return $data;
    }
}