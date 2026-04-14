<?php 

namespace App\Services\TrainingProcesses;
use Illuminate\Http\Request;
interface TrainingProcessesInterface
{    
    public function getTrainingProcessesList(array  $params);
    public function getTrainingProcessesById($id);
    public function getTrainingProcessesCreate(array $params);
    public function getTrainingProcessesUpdate(array $params, $id);
    public function getTrainingProcessesDelete($id);
}