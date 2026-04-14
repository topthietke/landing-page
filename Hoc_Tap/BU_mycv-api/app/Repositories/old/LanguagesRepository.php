<?php

namespace App\Repositories;
use App\Models\Api\Languages;
use JetBrains\PhpStorm\Language;

/**
 * Class LanguagesRepository
 *
 * @package App\Repositories
 */
class LanguagesRepository
{

    private $languages;
    public function __construct(Languages $languages)
    {
        $this->languages = $languages;
    }
    public function storeLangauages($data){        
        return $this->languages->insert($data);
    }
    public function index($params)
    {      
        try {
            $model = $this->languages->select('*')
                    ->whereNull('deleted_at')
                    ->where('status', $this->languages->Active());
            if(empty($params))  $model =  $model -> where($params);
            $model =  $model ->get();
            if(count($model) > 0){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách không thành công',
                ];
            }
        } catch (\Exception $e) {
            $data = [
                'code' => 202,
                'message' => $e->getMessage(),
            ];
        } 
        return $data;
    }
    public function edit($id)
    {        
        try {
            $model = $this->languages->where('id',$id)
                    ->whereNull('deleted_at')
                    ->where('status', $this->languages->Active())
                    ->first();  
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách không thành công',
                ];
            }          
        } catch (\Exception $e) {
            $data = [
                'code' => 202,
                'message' => $e->getMessage(),
            ];
        } 
        return $data;
    }

    public function create($data)
    {   
        try {            
            $model = $this->languages->where('name',$data['name'])->first();
            if(empty($model)){
                $add = $this->languages->insert($data);                
                if($add == true) {                       
                    $data = [
                        'code' => 200,
                        'message' => 'Thêm mới ngôn ngữ thành công',
                    ];
                } 
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Thêm mới ngôn ngữ không thành công',
                    ];
                }    

            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Ngôn ngữ này đã tồn tại! Vui lòng chọn ngôn ngữ khác',
                ];
            }                           
                
        } catch (\Exception $e) {
            $data = [
                'code' => 202,
                'message' => $e -> getMessage(),
            ];
        }
        return $data;
    }
    public function update($data, $id)
    { 
        try {
            $data['updated_by']  = $this->languages->UPDATED_BY();
            $model = $this->languages->where('id', (int)$id)->first()->update($data);           
            if($model == true) {                       
                $data = [
                    'code' => 200,
                    'message' => 'Cập nhật ngôn ngữ thành công',
                ];
            } 
            else {
                $data = [
                    'code' => 201,
                    'message' => ' Cập nhật ngôn ngữ không thành công',
                ];
            }    
          
        } catch (\Exception $e) {            
            $data = [
                'code' => 202,
                'message' =>  $e -> getMessage()
            ];
            
        }                
        return $data;
    }
    public function delete($id)
    {        
        
        try {
            $model = $this->languages->find($id)->update([
                'status' => $this->languages->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->languages->DELETED_BY()
            ]);
            if($model == true) {                       
                $data = [
                    'code' => 200,
                    'message' => 'Cập nhật ngôn ngữ thành công',
                ];
            } 
            else {
                $data = [
                    'code' => 201,
                    'message' => ' Cập nhật ngôn ngữ không thành công',
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
}