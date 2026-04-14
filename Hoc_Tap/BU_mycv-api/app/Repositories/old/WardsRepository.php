<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\Wards;
use App\Http\Traits\BackendApiTraits;
/**
 * Class WardsRepository
 *
 * @package App\Repositories
 */
class WardsRepository
{
use BackendApiTraits;
    private $wards;

    public function __construct(Wards $wards)
    {
        $this->wards = $wards;
    }

    public function index($params)
    {      
        try {
            $model =  $this->wards->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status', $this->wards->Active());
                    if(empty($params)) $model = $model -> where($params);
                    $model = $model -> get();
                    
            if($model === null) {           
                
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách Phường / Xã thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 202,
                    'message' => 'Không tìm thấy bản ghi này',
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

    public function edit($id)
    {
      
        try {
            $model =  $this->wards->where('id',$id)->first();
            if($model === null) {            
                
                $res = [
                    'code' => 200,
                    'message' => 'Tải danh sách Phường / Xã thành công',
                    'data' => $model
                ];
            }
            else {
                $res = [
                    'code' => 201,
                    'message' => 'Không tìm thấy bản ghi này',
                ];
            }
        } catch (\Exception $e) {
            $res = [
                'code' => 202,
                'message' => $e -> getMessage(),

            ];
        } 
        return $res;
    }

    public function create($data)
    {  
        try {
            $add = null;
            $model = $this->wards->where('name',$data['name'])->first();
            if($model === null) {            
                $add = $this->wards->insert($data);      
                if($add == true){
                    $res = [
                        'code' => 200,
                        'message' => 'Phường / Xã này đã được thêm mới thành công'
                    ];
                }
                else {
                    $res = [
                        'code' => 201,
                        'message' => 'Phường / Xã này thêm mới không thành công'
                    ];
                }
            }
            else {
                $res = [
                    'code' => 201,
                    'message' => 'Kỹ năng này đã tồn tại trên hệ thống'
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

    public function update($data, $id)
    {           
        try {
            $data['updated_by'] =  $this->wards->UPDATED_BY();
            $model = $this->wards->where('id', (int)$id)->first()->update($data);    
        } catch (\Exception $e) {            
            return $e -> getMessage();
        }                
        return $model;
    }
    public function delete($id)
    {       
        try {
            $model = $this->wards->find($id)->update([
                'status' =>  $this->wards->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' =>  $this->wards->DELETED_BY()
            ]);            
        } catch (\Exception $e) {          
            return $e->getMessage();
        }
        return $model;
    }
    public function getStoreWardsApi(){
        // Lấy toàn bộ danh sách
        try {
            $data = [];
            $url = 'https://provinces.open-api.vn/api/w';
            $res = json_decode($this->apiDistricts($url));      
            foreach ($res as $item) {            
                $data[] = [
                    'name' => $item -> name,
                    'type' => $item -> division_type,
                    'slug' => $item -> codename,
                    'districts_id' => $item -> district_code,
                    'status' => 1,
                    'created_by' =>$this->wards->CREATED_BY()
                  ];
            }        
            
            // Thực hiện insert vào db
            $model = Wards::insert($data);
            if($model == true) {
                $result = [
                    'code' => 200,
                    'message' => 'Đã thêm mới Phường/ Xã Huyện thành công'
                ];
            }
            else {
                $result = [
                    'code' => 201,
                    'message' => 'Đã thêm mới Phường/ Xã Huyện thành công'
                ];
            }
        } catch (\Exception $e) {
            $result = [
                'code' => 202,
                'message' => $e ->getMessage()
            ];
        }
        return $result;
        

        
    }

}