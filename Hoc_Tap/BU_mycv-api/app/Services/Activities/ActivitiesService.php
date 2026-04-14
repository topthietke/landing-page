<?php

namespace App\Services\Activities;

use App\Repositories\ActivitiesRepository;
use App\Services\Activities\ActivitiesInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class UserService$this->
 *
 * @package App\Services
 */
class ActivitiesService implements ActivitiesInterface
{
     protected $activitiesRepository;
     public function __construct(ActivitiesRepository $activitiesRepository)
     {
          $this->activitiesRepository = $activitiesRepository;
     }

    public function index($params){      
        try {
            
            $model = $this->activitiesRepository;
            if(isset($params['name'])) {
                $model = $model->where('name','%'. $params['name'].'%', 'LIKE');
            }
            $data = $model->orderBy('id', 'desc')->get();
            // dd($data);
            return $data;
        } catch (\Exception $e) {
            return [
                'code' => 202,
                'message' => $e->getMessage()
            ];
        } 
        
        // return $data;
    }

    public function details($id)
    {      
        try {
            $model = $this->activitiesRepository->where('id',$id)->first();
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

    public function create($params)
    {          
        try {   
            $add = $this->activitiesRepository->create($params);                  
            $model = $this->activitiesRepository->where('content', $params['content'])->first();            
            if(empty($model)) {            
                
                if($add === true) {
                    $data = [
                        'code' => 200,
                        'message' => 'Thêm mới hoạt động thành công',                        
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Thêm mới danh mục không thành công'                
                    ];
                }
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Nội dung thêm mới đã tồn tại! Vui lòng điền nội dung khác'                
                ];
            }
            return $data;
        } catch (\Exception $e) {            
            return [
                'code' => 202,
                'message' => $e -> getMessage()
            ];
        }          
        
    }

    public function update($data, $id)
    {           
        try {
            $data['updated_by'] = $this->activitiesRepository->UPDATED_BY();
            $model = $this->activitiesRepository->where('id', (int)$id)->first()->update($data);    
            if($model === true) {
                $data = [
                    'code' => 200,
                    'message' => 'Hoạt động này đã được cập nhật thành công',                        
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Hoạt động này đã được cập nhật không thành công',
                ];
            }
        } catch (\Exception $e) {            
            $data = [
                'code' => 201,
                'message' => $e -> getMessage(),
            ];
        }                
        return $data;
    }
    public function delete($id)
    {       
        try {
            $model = $this->activitiesRepository->find($id)->update([
                'status' => $this->activitiesRepository->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->activitiesRepository->DELETED_BY()
            ]); 
            if($model === true) {
                $data = [
                    'code' => 200,
                    'message' => 'Hoạt động này đã được xóa bỏ thành công',                        
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Hoạt động này đã được xóa bỏ không thành công',
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
