<?php

namespace App\Repositories;
use App\Models\Api\DesiredJobs;

/**
 * Class DesiredJobsRepository
 *
 * @package App\Repositories
 */
class DesiredJobsRepository
{

    private $desiredJobs;

    public function __construct(DesiredJobs $desiredJobs)
    {
        $this->desiredJobs = $desiredJobs;
    }

    public function index($params)
    {      
        
        try {
            $model = $this->desiredJobs->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',  $this->desiredJobs->Active());                    
            if(!empty($params)){
                $model = $model -> where($params);    
            }
            $model = $model ->get();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách công việc mong muốn thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách công việc mong muốn không thành công',
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

    public function edit($id)
    {   
        try {
            $model =  $this->desiredJobs -> where('status',  $this->desiredJobs->Active()) 
            -> whereNull('deleted_at')
            -> where('id',$id)->first();     
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải chi tiết công việc mong muốn thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải chi tiết công việc mong muốn không thành công',
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

    public function create($params)
    {  
        if(empty($params)) {
            return [
                'code' => 201,
                'message' => 'Dữ liệu thêm mới không đầy đủ! Vui lòng kiểm tra lại',
                'data' => null
            ];
        }
        try {        
            $model = $this->desiredJobs 
                ->where('content',$params['content'])
                ->first();
                if(empty($model)){
                    $add =  $this->desiredJobs->insert($params);
                    if($add == true)
                    {
                        $data = [
                            'code' => 200,
                            'message' => 'Thêm mới Công việc mong muốn thành công',
                            'data' => $model
                        ];
                    }
                    else {
                        $data = [
                            'code' => 201,
                            'message' => 'Thêm mới Công việc mong muốn không thành công',
                            'data' => null
                        ];
                    }
                        
                }
                else {
                        $data = [
                            'code' => 201,
                            'message' => 'Nội dung đã tồn tại! Vui lòng kiểm tra lại',
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
            $params['updated_by'] = $this->desiredJobs->UPDATED_BY();            
            $model = $this->desiredJobs->where('id', (int)$id)->first()->update($params);  
            if($model == true){
                $data = [
                    'code' => 200,
                    'message' => ' Cập nhật công việc mong muốn thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => ' Cập nhật công việc mong muốn không thành công',
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
            $model = $this->desiredJobs
                -> where('id', (int)$id)
                -> where('status',$this->desiredJobs->Active()) 
                -> whereNull('deleted_at')
                -> first()
                -> update([
                    'status' => $this->desiredJobs->InActive(),
                    'deleted_by' => $this->desiredJobs->DELETED_BY(),
                    'deleted_at' => date('Y-m-d H:i:s')
                ]);
            
            if(isset($model) && $model != null) {
                 $data = [
                        'code' => 200,
                        'message' => 'Xóa bỏ công việc mong muốn thành công',
                        'data' => $model
                ];                
            }
            else {
                $data = [
                'code' => 201,
                'message' => 'Xóa bỏ công việc mong muốn không thành công',
                ];
            }
        } catch (\Exception $e) {          
            $data = [
                'code' => 202,
                'message' => ' Cập nhật công việc mong muốn không thành công',
            ]; 
        }
        return $data;
    }

}