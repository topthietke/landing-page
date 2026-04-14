<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\TranslateSystems;

/**
 * Class TranslateSystemsRepository
 *
 * @package App\Repositories
 */
class TranslateSystemsRepository
{

    private $translateSystems;

    public function __construct(TranslateSystems $translateSystems)
    {
        $this->translateSystems = $translateSystems;
    }

    public function index($params)
    {      
        try {
            $model =$this->translateSystems->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',$this->translateSystems->Active());
            if(empty($params)) $model = $model -> where($params);
            $model = $model -> get();
            if(!empty($model)) {
                $data = [
                    'code ' => 200,
                    'message' => 'Tải danh sách thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code ' => 201,
                    'message' => 'Tải danh sách không thành công',
                    'data' => $model
                ];
            }
        } catch (\Exception $e) {
            $data = [
                'code ' => 202,
                'message' => $e -> getMessage(),                
            ];
        } 
        return $data;
    }

    public function edit($id)
    {     
        try {
            $model = $this->translateSystems->where('id',$id)->first();    
            if(!empty($model)) {
                $data = [
                    'code ' => 200,
                    'message' => 'Tải danh sách thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code ' => 201,
                    'message' => 'Tải danh sách không thành công',
                    'data' => $model
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

    public function create($data)
    {  
        try {            
            $model = $this->translateSystems->where('slug',$data['slug'])->first();
            if(empty($model)) {
                $add = $this->translateSystems->insert($data);                
                if($add == true) {
                    $res = [
                        'code' => 200,
                        'message' => 'Hệ đào tạo được thêm mới thành công'
                    ];                                     
                }
                else{
                    $res = [
                        'code' => 201,
                        'message' => 'Hệ đào tạo được thêm mới không thành công'
                    ];                                     
                }               
            }
            else{                
                $res = [
                    'code' => 201,
                    'message' => 'Hệ đào tạo đã tồn tại! Vui lòng chọn hệ đào tạo khác'
                ];
            }
        } catch (\Exception $e) {            
            $res = [
                'code' => 202,
                'message' =>  $e -> getMessage()
            ];
        }          
        return $res;
    }

    public function update($data, $id)
    {           
        try {
            $data['updated_by'] =$this->translateSystems->UPDATED_BY();
            $model = $this->translateSystems->where('id', (int)$id)->first()->update($data);
            if($model == true) {                
                $res = [
                    'code' => 200,
                    'message' => 'Hệ đào tạo được cập nhật thành công'
                ];
            }
            else{                
                $res = [
                    'code' => 201,
                    'message' => 'Hệ đào tạo được cập nhật không thành công'
                ];
            }
        } catch (\Exception $e) {            
                $res = [
                    'code' => 201,
                    'message' => $e -> getMessage()
                ];
        }                
        return $res;
    }
    public function delete($id)
    {       
        try {
            $model = $this->translateSystems->find($id)->update([
                'status' =>$this->translateSystems->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' =>$this->translateSystems->DELETED_BY()
            ]);
            if($model == true) {                
                $res = [
                    'code' => 200,
                    'message' => 'Hệ đào tạo được xóa bỏ thành công'
                ];
            }
            else{                
                $res = [
                    'code' => 201,
                    'message' => 'Hệ đào tạo được xóa bỏ không thành công'
                ];
            }            
        } catch (\Exception $e) {          
            $res = [
                'code' => 202,
                'message' => $e -> getMessage()
            ];
        }
        return $res;
    }

}