<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\Experience;

/**
 * Class ExperienceRepository
 *
 * @package App\Repositories
 */
class ExperienceRepository
{

    private $experience;

    public function __construct(Experience $experience)
    {
        $this->experience = $experience;
    }

    public function index($params)
    {      
        try {
            $model = $this->experience->select('*')
                    ->whereNull('deleted_at')
                    ->where('status',$this->experience->Active());                    
            if(!empty($params)) {
                $model = $model -> where($params);
            }
                $model = $model -> get();
            if(!empty($model))
            {
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách kinh nghiệm thành công',
                    'data' => $model

                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách kinh nghiệm không thành công',
                    'data' => null
                ];
            }
        } catch (\Exception $e) {
            $data = [
                'code' => 202,
                'message' => $e -> getMessage(),
                'data' => null
            ];
            
        } 
        return $data;
    }

    public function edit($id)
    {
      
        try {
            $model = $this->experience->where('id',$id)->first();
            if(!empty($model))
            {
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách kinh nghiệm thành công',
                    'data' => $model

                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách kinh nghiệm không thành công',
                    'data' => null
                ];
            }
        } catch (\Exception $e) {
            $data = [
                'code' => 201,
                'message' => $e -> getMessage(),
                'data' => null
            ];
            
        } 
        return $data;
    }

    public function create($params)
    {  
        
        try {              
            $model = $this->experience->where('informations_id',(int)$params['informations_id'])
                    ->where('content',$params['content'])->first();      
            if(empty($model) === true) {            
                $add = $this->experience->insert($params);
                if($add === true) {
                    $data = [
                        'code' => 200,
                        'message' => "Dữ liệu thêm thành công"
                       ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Dữ liệu thêm không thành công'
                       ];
                }
            }
            else {
                    $data = [
                        'code' => 201,
                        'message' => 'Nội dung đã tồn tại! Vui lòng thêm nội dung khác'
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
            $data['updated_by'] = $this->experience->UPDATED_BY();
            $model = $this->experience->where('id', (int)$id)->first()->update($data);  
            if(!empty($model))
            {
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách kinh nghiệm thành công',
                    'data' => $model

                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách kinh nghiệm không thành công',
                    'data' => null
                ];
            } 
        } catch (\Exception $e) {            
            $data = [
                'code' => 201,
                'message' => $e -> getMessage(),
                'data' => null
            ];
            
        }                
        return $data;
    }
    public function delete($id)
    {       
        try {
            $model = $this->experience->find($id)
            ->whereNull('deleted_at')
            ->where('status', $this->experience->Active())
            ->update([
                'status' => $this->experience->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->experience->DELETED_BY()
            ]);
            if(!empty($model))
            {
                $data = [
                    'code' => 200,
                    'message' => 'Xóa danh sách kinh nghiệm thành công',
                    'data' => $model

                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Xóa danh sách kinh nghiệm không thành công',
                    'data' => null
                ];
            }        
        } catch (\Exception $e) {          
            $data = [
                'code' => 202,
                'message' => $e ->getMessage(),
                'data' => null
            ];
        }
            return $data;
    }

}