<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\Api\Categories;
use App\Models\Api\CategoriesDetails;

/**
 * Class CategoriesRepository
 *
 * @package App\Repositories
 */
class CategoriesRepository
{

    private $categories;
    private $categoriesDetails;

    public function __construct(Categories $categories, CategoriesDetails $categoriesDetails)
    {
        $this->categories = $categories;
        $this->categoriesDetails = $categoriesDetails;
    }

    public function index($params)
    {      
        $data = null;
        try {
            $model = $this->categoriesDetails->select(['*'])
            ->with('category', 'information')
            ->whereNull('deleted_at')
            ->where('status',$this->categories->Active());
            
            
            // $model = $this->categories->select(['*'])
            // ->whereNull('deleted_at')
            // ->where('status',$this->categories->Active());
            if(!empty($params)) {
                $model = $model -> where($params);
            }
            $model = $model->get();
            // dd($model);
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải danh mục thành công',
                    'data' => $model
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Tải danh mục không thành công',
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
            $model = $this->categories->where('id',$id)->first();
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải chi tiết danh mục thành công',
                    'data' => $model
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Tải chi tiết danh mục không thành công',
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

    public function create($params)
    {  
        try {
            $add = null;
            $model = $this->categories->where('cat_name_vi',$params['cat_name_vi'])->first();
            if(empty($model)) {            
                $add = $this->categories->insert($params);       
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
            $params['updated_by'] = $this->categories->UPDATED_BY();
            
            $model = $this->categories->where('id', (int)$id)->first()->update($params);
           
            if($model == true) {               
                $data = [
                    'code' => 200,
                    'message' => 'Cập nhật danh mục thành công',                        
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Cập nhật danh mục không thành công'                
                ];
            }    
        } catch (\Exception $e) {            
                $data = [
                    'code' => 202,
                    'message' => 'Cập nhật danh mục không thành công'                
                ];
        }                
        return $data;
    }
    public function delete($id)
    {       
        
        try {
            $model = $this->categories->where('id',$id)
                ->whereNull('deleted_at')
                ->where('status','<>', $this->categories->InActive())
                ->first()
                ->update([
                    'status' => $this->categories->InActive(),
                    'deleted_at' => date('Y-m-d H:i'),
                    'deleted_by' => $this->categories->DELETED_BY()
                ]);    
                if($model == true) {               
                    $data = [
                        'code' => 200,
                        'message' => 'Xóa bỏ danh mục thành công',                        
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Xóa bỏ danh mục không thành công'                
                    ];
                }          
        } catch (\Exception $e) {          
            return $e->getMessage();
        }
        return $data;
    }

}