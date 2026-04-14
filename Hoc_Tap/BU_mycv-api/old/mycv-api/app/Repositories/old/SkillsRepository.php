<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\Skills;

/**
 * Class SkillsRepository
 *
 * @package App\Repositories
 */
class SkillsRepository
{

    private $skills;

    public function __construct(Skills $skills)
    {
        $this->skills = $skills;
    }

    public function index($params)
    {      
        try {
            $model = $this->skills->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status', $this->skills->Active());
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
            $model = $this->skills->where('id',$id)->first();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải chi tiết kỹ năng thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Không tìm thấy bản ghi có id: ' . $id
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
            $model = $this->skills->where('content',$data['content'])->first();
            
            if($model === null) {            
                $add = $this->skills->insert($data);
                if($add == true){
                    $data = [
                        'code' => 200,
                        'message' => 'Kỹ năng được thêm mới thành công'
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Kỹ năng được thêm mới không thành công'
                    ];
                }
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Kỹ năng này đã tồn tại trên hệ thống'
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
            $data['updated_by'] = $this->skills->UPDATED_BY();
            $model = $this->skills->where('id', (int)$id)->first()->update($data);
            if($model == true){
                $res = [
                    'code' => 200,
                    'message' => 'Kỹ năng được cập nhật thành công'
                ];
            }
            else {
                $res = [
                    'code' => 201,
                    'message' => 'Kỹ năng được cập nhật không thành công'
                ];
            }
        } catch (\Exception $e) {            
            $res = [
                'code' => 202,
                'message' =>  $e -> getMessage()
            ];
        }                
        return $res;
    }
    public function delete($id)
    {       
        try {
            $model = $this->skills->find($id)->update([
                'status' => $this->skills->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->skills->DELETED_BY()
            ]);    
            if($model == true){
                $res = [
                    'code' => 200,
                    'message' => 'Kỹ năng được xóa bỏ thành công'
                ];
            }
            else {
                $res = [
                    'code' => 201,
                    'message' => 'Kỹ năng được xóa bỏ không thành công'
                ];
            }        
        } catch (\Exception $e) {          
            $res = [
                'code' => 202,
                'message' =>  $e -> getMessage()
            ];
        }
        return $res;
    }

}