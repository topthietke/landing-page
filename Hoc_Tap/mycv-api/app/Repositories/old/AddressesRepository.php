<?php

namespace App\Repositories;

use App\Models\Address;

class addressRepository
{
    private $address;
    public function __construct(Address $address)
    {        
        $this->address = $address;
    }
    public function index($params) {      
        try {
            $model = $this->address->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',$this->address->ACTIVE());            
            if(isset($params) && $params != ""){
                $model = $model -> where($params);
            }        
                $model = $model -> get();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách hoạt động thành công',
                    'data' => $model
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách hoạt động không thành công'
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
            $model = $this->address->where('id', $id)->first();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải chi tiết địa chỉ thành công',
                    'data' => $model
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Không tìm thấy bản ghi này',
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

    public function create($params)
    {  
        try {
            $add = null;
            $model = $this->address
                    ->where('informations_id',$params['informations_id'])
                    ->where('countries_id',$params['countries_id'])
                    ->where('provinces_id',$params['provinces_id'])
                    ->where('districts_id',$params['districts_id'])
                    ->where('wards_id',$params['wards_id'])
                    ->where('address',$params['address'])
                    ->where('status',$this->address->ACTIVE())
                    ->first();

            if($model === null) {            
                $add = $this->address->insert($params);
                if($add == true){
                    $data = [
                        'code' => 200,
                        'message' => 'Thêm mới địa chỉ thành công',
                    ];
                }
                else{
                    $data = [
                        'code' => 201,
                        'message' => 'Thêm địa chỉ không thành công',
                    ];
                }
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Dữ liệu thêm mới đã tồn tại! Vui lòng kiểm tra lại dữ liệu',
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

    public function update($data, $id)
    {           
        try {
            $data['updated_by'] = $this->address->UPDATED_BY();
            $model = $this->address->where('id', (int)$id)->first()->update($data);
            if($model == true){
                $data = [
                    'code' => 200,
                    'message' => 'Cập nhật địa chỉ thành công',
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Cập nhật địa chỉ không thành công',
                ];
            }
        } catch (\Exception $e) {            
            $data = [
                'code' => 201,
                'message' => $e ->getMessage()
            ];
        }                
        return $data;
    }
    public function delete($id)
    {       
        try {
            $model = $this->address->where('id', $id)->update([
                'status' => $this->address->UPDATED_BY(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->address->DELETED_BY()
            ]);  
            if($model == true){
                $data = [
                    'code' => 200,
                    'message' => 'Xóa địa chỉ thành công',
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Xóa  địa chỉ không thành công',
                ];
            }                      
        } catch (\Exception $e) {          
                $data = [
                    'code' => 201,
                    'message' => 'Xóa  địa chỉ không thành công',
                ];
        }
        return $data;
    }

}