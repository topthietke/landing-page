<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\Projects;

/**
 * Class ProjectsRepository
 *
 * @package App\Repositories
 */
class ProjectsRepository
{

    private $projects;

    public function __construct(Projects $projects)
    {
        $this->projects = $projects;
    }

    public function index($params)
    {      
        try {
            $model = $this->projects->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',$this->projects->Active());
            if(empty($params))  $model =  $model -> where($params);
            $model =  $model ->get();
            if(count($model) > 0){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách không thành công',
                ];
            }
        } catch (\Exception $e) {
            $data = [
                'code' => 202,
                'message' => $e->getMessage(),
            ];
        } 
        return $data;
    }

    public function edit($id)
    {
      
        try {
            $model = $this->projects->where('id',$id)
            ->whereNull('deleted_at')
            ->where('status',$this->projects->Active())
            ->first();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Dự án được thêm mới thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Không tìm thấy bản ghi này'
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

    public function create($data)
    {          
        try {      
            $model = $this->projects->where('name',$data['name'])->first();
            if($model == null) {            
                $add = $this->projects->insert($data);
                if($add == true)  {
                    $data = [
                        'code' => 200,
                        'message' => 'Dự án được thêm mới thành công'
                    ];
                }
                else{
                    $data = [
                        'code' => 201,
                        'message' => 'Dự án được thêm mới thành công'
                    ];
                }
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tên dự án đã tồn tại! Vui lòng chọn tên khác'
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
            $params['updated_by'] = $this->projects->UPDATED_BY();            
            $model = $this->projects->where('id', (int)$id)->first()->update($params); 
            if($model == true){
                $data = [
                    'code' => 200,
                    'message' => 'Dự án được cập nhật thành công'
                ];  
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => "Dự án cập nhật không thành công"
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
    public function delete($id)
    {       
        try {
            $model = $this->projects->find($id)
            
            ->update([
                'status' => $this->projects->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->projects->DELETED_BY()
            ]);     
            if($model == true){
                $data = [
                    'code' => 200,
                    'message' => 'Dự án hủy bỏ thành công'
                ];  
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => "Dự án hủy bỏ không thành công"
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

}