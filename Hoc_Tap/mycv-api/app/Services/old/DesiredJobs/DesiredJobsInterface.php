<?php 

namespace App\Services\DesiredJobs;
use Illuminate\Http\Request;
interface DesiredJobsInterface
{    
    public function getDesiredJobsList($params);
    public function getDesiredJobsById($id);
    public function getDesiredJobsCreate($params);
    public function getDesiredJobsUpdate($params, $id);
    public function getDesiredJobsDelete($id);
}