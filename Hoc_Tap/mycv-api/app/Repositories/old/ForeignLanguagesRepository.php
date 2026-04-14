<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\ForeignLanguages;

/**
 * Class ForeignLanguagesRepository
 *
 * @package App\Repositories
 */
class ForeignLanguagesRepository
{

    private $foreignLanguages;

    public function __construct(ForeignLanguages $foreignLanguages)
    {
        $this->foreignLanguages = $foreignLanguages;
    }

    public function index($params)
    {      
        try {
            $model = $this->foreignLanguages->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',$this->foreignLanguages->Active());
            if(empty($params)) {
                $model = $model -> where($params);
            }
            $model = $model ->get();
            if(!empty($model))
            {
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách kinh nghiệm thành công',
                    'data' => $model

                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách kinh nghiệm không thành công',
                    'data' => null
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

    public function edit($id)
    {
        
        try {
            $model = $this->foreignLanguages->select('*')->where('id',$id)->first();
            if(!empty($model))
            {
                $data = [
                    'code' => 200,
                    'message' => 'Tải chi tiết kinh nghiệm thành công',
                    'data' => $model

                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải chi tiết kinh nghiệm không thành công',
                    'data' => null
                ];
            }
        } catch (\Exception $e) {
            $data = [
                'code' => 202,
                'message' =>  $e -> getMessage(),
                'data' => null
            ];            
        } 
        return $data;
    }

    public function create($data)
    {          
        $data['created_at'] = date('Y-m-d H:i');
        $data['created_by'] = $this->foreignLanguages->CREATED_BY();
        try {                        
            $model = $this->foreignLanguages->where('name',$data['name'])->first();                      
            if($model == null) {            
               $add = $this->foreignLanguages->insert($data);  
                if($add == true) {
                    $data = [
                        'code' => 200,
                        'message' => 'Thêm mới ngoại ngữ thành công'
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Thêm mới ngoại ngữ không thành công'
                    ];
                }
            } 
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Ngoại ngữ này đã tồn tại! Vui lòng kiểm tra lại'
                ];
            }
        } catch (\Exception $e) {   
            $data = [
                'code' => 500,
                'message' => $e->getMessage()                
            ];                    
        }          
        return $data;
    }

    public function update($data, $id)
    {   
       
        try {
            $data['updated_at'] = date('Y-m-d H:i:s');                            
            $model = $this->foreignLanguages->where('id',(int)$id)
                    ->where('status', $this->foreignLanguages->Active())
                    ->whereNull('deleted_at')
                    ->first() -> update($data);
            
            if($model == true) {
               
                $data = [
                    'code' => 200,
                    'message' => 'Cập nhật ngoại ngữ thành công'
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Cập nhật ngoại ngữ không thành công'
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
    public function delete($id)
    {       
        try {
            $model = $this->foreignLanguages->where('id', $id)
                    ->where('status','<>', $this->foreignLanguages->InActive())
                    ->whereNull('deleted_at')
                    ->update([
                        'status' => $this->foreignLanguages->InActive(),
                        'deleted_at' => date('Y-m-d H:i'),
                        'deleted_by' => $this->foreignLanguages->DELETED_BY()
                    ]);   
              
            if($model == true) {
               
                $data = [
                    'code' => 200,
                    'message' => 'xóa bỏ ngoại ngữ thành công'
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'xóa bỏ ngoại ngữ không thành công'
                ];
            }         
        } catch (\Exception $e) {          
            $data = [
                'code' => 202,
                'message' => $e ->getMessage()
            ];
        }
        return $data;
    }

}