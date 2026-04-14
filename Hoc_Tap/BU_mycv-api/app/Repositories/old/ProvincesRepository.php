<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\Provinces;
use App\Http\Traits\BackendApiTraits;
/**
 * Class ProvincesRepository
 *
 * @package App\Repositories
 */
class ProvincesRepository
{ 
    use BackendApiTraits;
    private $provinces;

    public function __construct(Provinces $provinces)
    {
        $this->provinces = $provinces;
    }

    public function index($params)
    {      
        try {
            $model = $this->provinces->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',$this->provinces->Active())
                    ->get(); 
        } catch (\Exception $e) {
            return $e -> getMessage();
        } 
        return $model;
    }

    public function edit($id)
    {
        $data = null;
        try {
            $model = $this->provinces->select('*')->where('id', $id)->first();
            
            if (!empty($model) > 0) {
                $data = [
                    'code' => 200,
                    'message' => "Tải dữ liệu chi tiết thành công",
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => "Không tim thấy bản ghi này!",                  
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

    public function create($data)
    {  
       
        try {            
            $model = $this->provinces->where('name',$data['name'])->first();            
            if($model === null) {
                $create = $this->provinces->insert($data);
                if($create === true) {
                    $data = ['code' => 200, 'message' => "Thêm Thành phố / tỉnh thành công"];
                }
                else {
                     $data = ['code' => 201, 'message' => "Thêm Thành phố / tỉnh không thành công"];
                }
            }
            else
            {
                $data = ['code' => 201, 'message' => "Thành phố / tỉnh " . $data['name'] ." đã tồn tại! Vui lòng chọn Thành phố / tỉnh khác"];
            }
        } catch (\Exception $e) {
            $data = ['code' => 202, 'message' => $e->getMessage()];            
        }          
        return $data;
    }

    public function update($data, $id)
    {           
        try {
            $data['updated_by'] = $this->provinces->UPDATED_BY();
            $update = $this->provinces->where('id', (int)$id)                    
                    ->first()->update($data);     
            if($update === true) {
                $data = ['code' => 200, 'message' => "Thành phố / tỉnh cập nhật thành công"];
            }
            else {
                $data = ['code' => 201, 'message' => "Thành phố / tỉnh cập nhật không thành công"];
            }       
                        
        } catch (\Exception $e) {            
            $data = ['code' => 202, 'message' =>  $e -> getMessage()];
        }                
        return $data;
    }
    public function delete($id)
    {       
        try {
            $delete = $this->provinces->where('id', $id)->first();
            if(!empty($delete)) {
                $delete = $delete->update([
                    'status' => $this->provinces->InActive(),
                    'deleted_at' => date('Y-m-d H:i'),
                    'deleted_by' => $this->provinces->DELETED_BY()
                ]);   
                if($delete === true) {
                    $data = ['code' => 200, 'message' => "Thành phố / tỉnh xóa thành công"];
                }
                else {
                    $data = ['code' => 201, 'message' => "Thành phố / tỉnh xóa không thành công"];
                }       
            }
            else {
                $data = ['code' => 201, 'message' => "Không tìm thấy Thành phố / tỉnh thành này"];
            }
                   
        } catch (\Exception $e) {          
            $data = ['code' => 202, 'message' =>  $e -> getMessage()];
        }
        return $data;
    }
    public function getApiDataList(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $url = 'https://provinces.open-api.vn/api/p';        
        $res = json_decode($this->apiProvinces($url));
        $data = [];
        foreach ($res as $item) {            
            $data [] = [
                'name' => $item -> name,
                'type' => $item -> division_type,
                'slug' => $item -> codename,
                'status' => 1,
                'countries_id' => 1112,
                'code' => $item -> code,
                'phone_code' => $item -> phone_code,
                'created_at' => date('Y-m-d H:i'),
                'created_by' => $this->provinces->CREATED_BY(),                
            ];
        }
        $insert = $this->provinces->insert($data);
        return $insert;
    }
}