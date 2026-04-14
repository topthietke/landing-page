<?php

namespace App\Repositories;
use App\Models\Api\CareerGoals;
/**
 * Class CareerGoalsRepository
 *
 * @package App\Repositories
 */
class CareerGoalsRepository
{

    private $careerGoals;

    public function __construct(CareerGoals $careerGoals)
    {
        
        $this->careerGoals = $careerGoals;
    }
    public function index($params)
    {      
        try {
            $model = $this->careerGoals->whereNull('deleted_at')
                ->where('status',$this->careerGoals->ACTIVE())
                ->whereNull('deleted_at');
            if(!empty($params)) {
                $model = $model  -> where($params);
            }
            $model = $model -> get();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách Mục tiêu nghề nghiệp thành công',
                    'data' => $model
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách Mục tiêu nghề nghiệp không thành công' 
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
            $model = $this->careerGoals->where('id',(int)$id)
                    ->where('status', $this->careerGoals->Active())
                    ->whereNull('deleted_at')
                    ->first();    
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải chi tiết Mục tiêu nghề nghiệp thành công',
                    'data' => $model
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Tải chi tiết Mục tiêu nghề nghiệp không thành công'
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
        $params['status']  = $this->careerGoals->Active();
        $params['created_at']  = date('Y-m-d H:i:m');
        $params['created_by']  = $this->careerGoals->Active();
        try {            
            $model = $this->careerGoals
                    ->where('information_id',$params['information_id'])
                    ->where('information_name',$params['information_name']) 
                    ->where('short_term_goal',$params['short_term_goal'])
                    ->where('long_term_goal',$params['long_term_goal']) 
                    ->first();
           
            if(empty($model)) {            
                $add = $this->careerGoals->insert($params);
                if($add === true) {
                    $data = [
                        'code' => 200,
                        'message' => 'Thêm mới Mục tiêu nghề nghiệp thành công',                        
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Thêm mới Mục tiêu nghề nghiệp không thành công'                
                    ];
                }
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Nội dung thêm mới đã tồn tại! Vui lòng điền nội dung khác'                
                ];
            }            
           
        } catch (\Exception $e) {       
            $data = [
                'code' => 202,
                'message' => $e->getMessage()
            ];
        }    
        
        return $data;
    }

    public function update($data, $id)
    {   
           
            try {
                $data['updated_by'] = $this->careerGoals->UPDATED_BY();
                $update = $this->careerGoals->where('id', (int)$id)->first()->update($data);    
                if($update === true) {
                    $data = [
                        'code' => 200,
                        'message' => 'Cập nhật Mục tiêu nghề nghiệp thành công',                        
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Cập nhật Mục tiêu nghề nghiệp không thành công',
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
            $delete = $this->careerGoals->where('id',$id)
                ->whereNull('deleted_at')
                ->where('status', $this->careerGoals->Active())               
                ->update([
                'status' => $this->careerGoals->INACTIVE(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->careerGoals->DELETED_BY()
            ]);    
            if($delete === true || $delete == 1) {
                $data = [
                    'code' => 200,
                    'message' => 'Xóa bỏ Mục tiêu nghề nghiệp thành công',                        
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Xóa bỏ Mục tiêu nghề nghiệp không thành công',
                ];
            }                    
        } catch (\Exception $e) {          
            return $e->getMessage();
        }
        return $data;
    }

}