<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\Information;

/** 
 *
 * @package App\Repositories
 */
class InformationRepository
{

    private $information;

    public function __construct(Information $information)
    {
         $this->information = $information;
    }

    public function index($params)
    {      
        try {
            $model =   $this->information ->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',  $this->information->Active());
            if(empty($params)){
                $model = $model -> where ($params);
            }
            $model = $model -> get();
            if(!empty($model))
            {
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách thông tin thành công',
                    'data' => $model

                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách thông tin không thành công',
                    'data' => null
                ];
            }

        } catch (\Exception $e) {
            $data = [
                'code' => 202,
                'message' => $e -> getMessage(),
                'data' => null
            ];
        } 
        return $data;
    }

    public function edit($id)
    {
      
        try {
            $model =   $this->information -> select('*') -> where('id',$id)->first();
            if(!empty($model))
            {
                $data = [
                    'code' => 200,
                    'message' => 'Tải chi tiết thông tin thành công',
                    'data' => $model

                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải chi tiết thông tin không thành công',
                    'data' => null
                ];
            }
        } catch (\Exception $e) {
                $data = [
                    'code' => 202,
                    'message' => $e -> getMessage(),
                    'data' => null
                ];
        } 
        return $data;
    }

    public function create($params)
    {  
        try {            
            $model =  $this->information->select('*')
                    ->where('name',$params['name'])
                    ->where('identity_card', $params['identity_card'])
                    ->first();
            if(empty($model))
            {
                $add =  $this->information->insert($params);
                if($add == true)
                {                                        
                    $data = [
                        'code' => 200,
                        'message' => 'Thêm mới thông tin thành công',
                        'data' => $model

                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Thêm mới thông tin không thành công',
                        'data' => null
                    ];
                }                
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Thông tin đã tồn tại! Vui lòng chọn thông tin khác',
                    'data' => null
                ];
            }

        } catch (\Exception $e) {            
            $data = [
                'code' => 202,
                'message' => $e -> getMessage(),
                'data' => null
            ];
        }          
        return $data;
    }

    public function update($data, $id)
    {           
        try {
            $data['updated_by'] = $this->information ->UPDATED_BY();
            $model =  $this->information->where('id', (int)$id)->first()->update($data);    
            if($model == true)
                {                                        
                    $data = [
                        'code' => 200,
                        'message' => 'Cập nhật thông tin thành công',
                        'data' => $model
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Cập nhật thông tin không thành công',
                        'data' => null
                    ];
                }      
        } catch (\Exception $e) {            
                    $data = [
                        'code' => 202,
                        'message' => $e -> getMessage(),
                        'data' => null
                    ];
        }                
        return $data;
    }
    public function delete($id)
    {       
        try {
            $model =  $this->information->find($id)->update([
                'status' =>   $this->information ->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' =>   $this->information ->DELETED_BY()
            ]);  
            if($model == true)
                {                                        
                    $data = [
                        'code' => 200,
                        'message' => 'Xóa bỏ thông tin thành công',
                        'data' => $model
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Xóa bỏ thông tin không thành công',
                        'data' => null
                    ];
                }            
        } catch (\Exception $e) {          
                $data = [
                    'code' => 202,
                    'message' => $e -> getMessage(),
                    'data' => null
                ];
        }
        return $data;
    }

}