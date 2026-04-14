<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\Districts;
use App\Models\Api\Provinces;
use App\Http\Traits\BackendApiTraits;
/**
 * Class DistrictsRepository
 *
 * @package App\Repositories
 */
class DistrictsRepository
{
    use BackendApiTraits;
    private $districts;
    private $provinces;
    public function __construct(Districts $districts, Provinces $provinces)
    {
        $this->districts = $districts;
        $this->provinces = $provinces;
    }

    public function index($params)
    {      
        try {
            $model = $this->districts->select(['*'])
            ->whereNull('deleted_at')
            ->where('status',$this->districts->Active());
            if(empty($params)) {
                $model = $model -> where($params);    
            }
            $model = $model -> get();
            // Kiểm tra dữ liệu
            if(!empty($model)) {
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách Quận/ Huyện thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách Quận/ Huyện không thành công'
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
            $model = $this->districts->where('id',(int)$id)
                    ->whereNull('deleted_at')
                    ->where('status',$this->districts->Active())
                    ->first();
            if(!empty($model)) {
                $data = [
                    'code' => 200,
                    'message' => 'Xem chi tiết Quận/ Huyện thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Không tìm thấy Quận/ Huyện có Id: ' . $id,
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
            $model = $this->districts->where('name',$params['name'])->first();
            if(empty($model) || $model == null) {
                $add = $this->districts->insert($params);
                if($add == true) {
                    $data = [
                        'code' => 200,
                        'message' => 'Thêm mới Quận/ Huyện thành công',
                        'data' => $model
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Thêm mới quận/ huyện không thành công',
                    ];
                } 
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tên Quận/ Huyện đã tồn tại! Vui lòng chọn Quận/ huyện khác',
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
            $data['updated_by'] = $this->districts->UPDATED_BY();
            $model = $this->districts->where('id', (int)$id)->first()->update($data);
            if($model == true) {
                $data = [
                    'code' => 200,
                    'message' => 'Thêm mới Quận/ Huyện thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Thêm mới quận/ huyện không thành công',
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
            $model = $this->districts->find($id)->update([
                'status' => $this->districts->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->districts->DELETED_BY()
            ]);  
            if($model == true) {
                $data = [
                    'code' => 200,
                    'message' => 'Thêm mới Quận/ Huyện thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Thêm mới quận/ huyện không thành công',
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

    public function getStoreDistrictsApi(){
        
        // Lấy toàn bộ danh sách
        $params = [];
        $url = 'https://provinces.open-api.vn/api/d';
        $res = json_decode($this->apiDistricts($url));
        foreach ($res as $item) {            
            $params[] = [
                'name' => $item -> name,
                'type' => $item -> division_type,
                'slug' => $item -> codename,
                'provinces_id' => $item -> province_code,
                'status' => 1,
                'created_by' => $this->districts->CREATED_BY()
              ];
        }
        // Thực hiện insert vào db
        $model = Districts::insert($params);
        if($model == true) {
            $data = [
                'code' => 200,
                'message' => 'Đã thêm mới Tỉnh/ Quận Huyện thành công'
            ];
        }
        else {
            $data = [
                'code' => 201,
                'message' => 'Đã thêm mới Tỉnh/ Quận Huyện không thành công'
            ];
        }
        return $data; 
        
    }

}