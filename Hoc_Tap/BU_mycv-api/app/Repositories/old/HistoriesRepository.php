<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\Histories;

/**
 * Class HistoriesRepository
 *
 * @package App\Repositories
 */
class HistoriesRepository
{

    private $histories;

    public function __construct(Histories $histories)
    {
        $this->histories = $histories;
    }

    public function index($params)
    {      
        try {
            $model = $this->histories->select(['*'])
                    ->whereNull('deleted_at')
                    ->where('status',$this->histories->Active());
            if(!empty($params)){
                $model = $model -> where($params);    
            }
            $model = $model ->get();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách lịch sử thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách lịch sử không thành công',
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
            $model = $this->histories->select('*')->where('id',$id)
                ->whereNull('deleted_at')
                ->where('status',$this->histories->Active())
                ->first();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh sách lịch sử thành công',
                    'data' => $model
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh sách lịch sử không thành công',
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
            $add = $this->histories->insert($data);         
            if($add == true){
                $data = [
                    'code' => 200,
                    'message' => 'Thêm mới lịch sử thành công'
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Thêm mới lịch sử không thành công',
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
            $data['updated_by'] = $this->histories->UPDATED_BY();
            $model = $this->histories->where('id', (int)$id)->first()->update($data);   
            if($model == true){
                $data = [
                    'code' => 200,
                    'message' => 'Cập nhật lịch sử thành công'
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Cập nhật lịch sử không thành công',
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
            $model = $this->histories->find($id)->update([
                'status' => $this->histories->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' => $this->histories->DELETED_BY()
            ]);
            if($model === true){
                $data = [
                    'code' => 200,
                    'message' => 'Xóa bỏ lịch sử thành công'
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Xóa bỏ lịch sử không thành công',
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

}