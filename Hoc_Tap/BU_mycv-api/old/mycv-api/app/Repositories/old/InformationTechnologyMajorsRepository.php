<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\InformationTechnologyMajors;

/**
 * Class InformationTechnologyMajorsRepository
 *
 * @package App\Repositories
 */
class InformationTechnologyMajorsRepository
{
    private $iTechnology;

    public function __construct(InformationTechnologyMajors $iTechnology)
    {
        $this->iTechnology = $iTechnology;
    }

    public function index($params)
    {      
        try {
            $data = null;
            $model = $this->iTechnology->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',$this->iTechnology->Active());
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
        $data = null;
        try {
            $model = $this->iTechnology->where('id',$id)->first();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải chi tiết thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải chi tiết không thành công'

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

    public function create($data)
    {  
        
        try {            
            $model = $this->iTechnology->select('*')->where('name',$data['name'])->first();                        
            if(empty($model)) {            
                $add = $this->iTechnology->insert($data);                  
                if($add == true){
                    $data = [
                        'code' => 200,
                        'message' => 'Chuyên ngành đã được thêm mới thành công'
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Chuyên ngành thêm mới không thành công'
                    ];
                }
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Chuyên ngành này đã tồn tại! Vui lòng kiểm tra lại'
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

    public function update($params, $id)
    {         
        $data = null;  
        try {
            $params['updated_by'] = $this->iTechnology->UPDATED_BY();            
            $model = $this->iTechnology->where('id', (int)$id)->first()->update($params);
            if($model == true) {
                $data =  [
                    'code' => 200,
                    'message' => 'Cập nhật danh sách thành công',
                ];
            }
            else {
                $data =  [
                    'code' => 201,
                    'message' => 'Cập nhật danh sách không thành công',
                  
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
    public function delete($id)
    {       
        $data = null;
        try {
            $model = $this->iTechnology->where('id',$id)
                ->where('status', $this->iTechnology->Active())
                ->whereNull('deleted_at')
                ->update([
                'status' => $this->iTechnology->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->iTechnology->DELETED_BY()
                ]);     
            
            if($model == true) {
                $data =  [
                    'code' => 200,
                    'message' => 'Xóa chuyên môn có mã '.$id.' thành công',
                ];
            }
            else {
                $data =  [
                    'code' => 201,
                    'message' => 'Xóa chuyên môn có mã '.$id.' không thành công',
                ];
            }      
        } catch (\Exception $e) {          
            $data =  [
                'code' => 202,
                'message' => $e->getMessage(),
            ];
        }
        return $data;
    }

}