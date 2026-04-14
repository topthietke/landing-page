<?php 

namespace App\Services\CareerGoals;
use Illuminate\Http\Request;
interface CareerGoalsInterface
{    
    public function getCareerGoalsList($params);
    public function getCareerGoalsById($id);
    public function getCareerGoalsCreate($params);
    public function getCareerGoalsUpdate($params, $id);
    public function getCareerGoalsDelete($id);
}