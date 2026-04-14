<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
//Interface
use App\Services\Categories\CategoriesInterface;
use App\Services\Countries\CountriesInterface;
use App\Services\Provinces\ProvincesInterface;
use App\Services\Languages\LanguagesInterface;
use App\Services\Districts\DistrictsInterface;
use App\Services\Wards\WardsInterface;
use App\Services\Addresses\AddressesInterface;
use App\Services\Information\InformationInterface;
use App\Services\CategoriesDetails\CategoriesDetailsInterface;
use App\Services\CareerGoals\CareerGoalsInterface;
use App\Services\Histories\HistoriesInterface;
use App\Services\TranslateSystems\TranslateSystemsInterface;
use App\Services\TrainingProcesses\TrainingProcessesInterface;
use App\Services\Skills\SkillsInterface;
use App\Services\Activities\ActivitiesInterface;
use App\Services\Projects\ProjectsInterface;
use App\Services\Experience\ExperienceInterface;
use App\Services\InformationTechnologyMajors\InformationTechnologyMajorsInterface;
use App\Services\ForeignLanguages\ForeignLanguagesInterface;
use App\Services\Languages\LanguageInterface;
use App\Services\Users\UsersInterface;

//Service
use App\Services\Languages\LanguageService;
use App\Services\DesiredJobs\DesiredJobsInterface;
use App\Services\Categories\CategoriesService;
use App\Services\Countries\CountriesService;
use App\Services\Provinces\ProvincesService;
use App\Services\Languages\LanguagesService;
use App\Services\Districts\DistrictsService;
use App\Services\Wards\WardsService;
use App\Services\Addresses\AddressesService;
use App\Services\Information\InformationService;
use App\Services\CategoriesDetails\CategoriesDetailsService;
use App\Services\CareerGoals\CareerGoalsService;
use App\Services\Histories\HistoriesService;
use App\Services\TranslateSystems\TranslateSystemsService;
use App\Services\TrainingProcesses\TrainingProcessesService;
use App\Services\Skills\SkillsService;
use App\Services\Activities\ActivitiesService;
use App\Services\Projects\ProjectsService;
use App\Services\Experience\ExperienceService;
use App\Services\InformationTechnologyMajors\InformationTechnologyMajorsService;
use App\Services\ForeignLanguages\ForeignLanguagesService;
use App\Services\DesiredJobs\DesiredJobsService;
use App\Services\Users\UsersService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this -> app->bind(CategoriesInterface::class, CategoriesService::class);
        $this -> app->bind(CountriesInterface::class, CountriesService::class);
        $this -> app->bind(ProvincesInterface::class, ProvincesService::class);
        $this -> app->bind(LanguagesInterface::class, LanguagesService::class);
        $this -> app->bind(DistrictsInterface::class, DistrictsService::class);
        $this -> app->bind(WardsInterface::class, WardsService::class);
        $this -> app->bind(AddressesInterface::class, AddressesService::class);
        $this -> app->bind(InformationInterface::class, InformationService::class);
        $this -> app->bind(CategoriesDetailsInterface::class, CategoriesDetailsService::class);
        $this -> app->bind(CareerGoalsInterface::class, CareerGoalsService::class);
        $this -> app->bind(HistoriesInterface::class, HistoriesService::class);
        $this -> app->bind(TranslateSystemsInterface::class, TranslateSystemsService::class);
        $this -> app->bind(TrainingProcessesInterface::class, TrainingProcessesService::class);
        $this -> app->bind(SkillsInterface::class, SkillsService::class);
        $this -> app->bind(ActivitiesInterface::class, ActivitiesService::class);
        $this -> app->bind(ProjectsInterface::class, ProjectsService::class);
        $this -> app->bind(ExperienceInterface::class, ExperienceService::class);
        $this -> app->bind(InformationTechnologyMajorsInterface::class, InformationTechnologyMajorsService::class);
        $this -> app->bind(ForeignLanguagesInterface::class, ForeignLanguagesService::class);
        $this -> app->bind(DesiredJobsInterface::class, DesiredJobsService::class);
        $this -> app->bind(LanguageInterface::class, LanguageService::class);
        $this -> app->bind(UsersInterface::class, UsersService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      
    }
}
