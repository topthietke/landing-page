<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\TrainingProcesses;

/**
 * Class TrainingProcessesRepository
 *
 * @package App\Repositories
 */
class TrainingProcessesRepository
{

    private $trainingProcesses;

    public function __construct(TrainingProcesses $trainingProcesses)
    {
       $this->trainingProcesses = $trainingProcesses;
    }

    public function index($params)
    {      
        try {
            $model = $this->trainingProcesses->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',$this->trainingProcesses->Active());
            if(empty($params)) $model = $model -> where($params);
            $model = $model -> get();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách kỹ năng thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách kỹ năng không thành công'
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
            $model = $this->trainingProcesses->where('id',$id)->first();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách kỹ năng thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách kỹ năng không thành công'
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
            $model =$this->trainingProcesses
                   ->where('information_id',$data['information_id']) 
                   ->where('school_name',$data['school_name'])
                   ->first();
            if(empty($model)) {
                $add =$this->trainingProcesses->insert($data);
                if($add == true) {
                    $data = [
                        'code' => 200,
                        'message' => 'Quá trình đào tạo được thêm mới thành công'
                    ];                                     
                }
                else{
                    $data = [
                        'code' => 201,
                        'message' => 'Quá trình đào tạo được thêm mới không thành công'
                    ];                                     
                }               
            }
            else{
                $name = isset($data['information_name']) ? $data['information_name'] : $data['information_id'];
                $data = [
                    'code' => 201,
                    'message' => 'Ứng viên ' . $name . ' đã đăng ký ' .  $data['school_name'] . ' vào danh sách'
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
            $data['updated_by'] = $this->trainingProcesses->UPDATED_BY();
            $model =$this->trainingProcesses->where('id', (int)$id)->first()->update($data);
            if($model == true) {
                $data = [
                    'code' => 200,
                    'message' => 'Quá trình đào tạo được cập nhật thành công'
                ];                                     
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Quá trình đào tạo được cập nhật không thành công'
                ];                                     
            }      
        } catch (\Exception $e) {            
            $data = [
                'code' => 202,
                'message' => $e -> getMessage()
            ]; 
        }                
        return $data ;
    }
    public function delete($id)
    {       
        try {
            $model =$this->trainingProcesses->find($id)->update([
                'status' => $this->trainingProcesses->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->trainingProcesses->DELETED_BY()
            ]);
            if($model == true) {
                $data = [
                    'code' => 200,
                    'message' => 'Quá trình đào tạo được cập nhật thành công'
                ];                                     
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Quá trình đào tạo được cập nhật không thành công'
                ];                                     
            }              
        } catch (\Exception $e) {          
            $data = [
                'code' => 202,
                'message' => $e -> getMessage()
            ];  
        }
        return $data ;
    }

}