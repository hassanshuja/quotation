<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EloquentTagRepository;
use App\Repositories\EloquentMetaRepository;
use App\Repositories\EloquentPostRepository;
use App\Repositories\EloquentJobcardRepository;
use App\Repositories\EloquentQuotesRepository;
use App\Repositories\EloquentProjectRepository;
use App\Repositories\EloquentProjectManagerRepository;
use App\Repositories\EloquentLabourRateRepository;
use App\Repositories\EloquentMaterialRateRepository;
use App\Repositories\EloquentRoleRepository;
use App\Repositories\EloquentUserRepository;
use App\Repositories\EloquentVatRepository;
use App\Repositories\EloquentReportsRepository;
use App\Repositories\EloquentSettingsRepository;
use App\Repositories\EloquentInvoicesRepository;
use App\Repositories\Contracts\TagRepository;
use App\Repositories\Contracts\MetaRepository;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\ProjectRepository;
use App\Repositories\Contracts\ProjectManagerRepository;
use App\Repositories\Contracts\LabourRateRepository;
use App\Repositories\Contracts\MaterialRateRepository;
use App\Repositories\Contracts\JobcardRepository;
use App\Repositories\Contracts\QuotesRepository;
use App\Repositories\Contracts\RoleRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\VatRepository;
use App\Repositories\Contracts\ReportsRepository;
use App\Repositories\Contracts\SettingsRepository;
use App\Repositories\Contracts\InvoicesRepository;
use App\Repositories\EloquentAccountRepository;
use App\Repositories\Contracts\AccountRepository;
use App\Repositories\EloquentFormSettingRepository;
use App\Repositories\EloquentRedirectionRepository;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Repositories\Contracts\FormSettingRepository;
use App\Repositories\Contracts\RedirectionRepository;
use App\Repositories\EloquentFormSubmissionRepository;
use App\Repositories\Contracts\FormSubmissionRepository;
use App\Repositories\EloquentDistrictRepository;
use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\EloquentSubDistrictRepository;
use App\Repositories\Contracts\SubDistrictRepository;
use App\Repositories\EloquentClientsRepository;
use App\Repositories\Contracts\ClientsRepository;
use App\Repositories\EloquentStatusReportRepository;
use App\Repositories\Contracts\StatusReportRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Relation::morphMap([
            'post' => Post::class,
            'user' => User::class,
        ]);

        if (config('app.url_force_https')) {
            // Force SSL if isSecure does not detect HTTPS
            URL::forceScheme('https');
        }
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        // Dusk, if env is appropriate
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }

        $this->app->bind(
            UserRepository::class,
            EloquentUserRepository::class
        );

        $this->app->bind(
            AccountRepository::class,
            EloquentAccountRepository::class
        );

        $this->app->bind(
            RoleRepository::class,
            EloquentRoleRepository::class
        );

        $this->app->bind(
            MetaRepository::class,
            EloquentMetaRepository::class
        );

        $this->app->bind(
            FormSettingRepository::class,
            EloquentFormSettingRepository::class
        );

        $this->app->bind(
            FormSubmissionRepository::class,
            EloquentFormSubmissionRepository::class
        );

        $this->app->bind(
            RedirectionRepository::class,
            EloquentRedirectionRepository::class
        );

        $this->app->bind(
            PostRepository::class,
            EloquentPostRepository::class
        );

        $this->app->bind(
            JobcardRepository::class,
            EloquentJobcardRepository::class
        );

        $this->app->bind(
            ProjectRepository::class,
            EloquentProjectRepository::class
        );
        $this->app->bind(
          QuotesRepository::class,
          EloquentQuotesRepository::class
        );


        $this->app->bind(
            ProjectManagerRepository::class,
            EloquentProjectManagerRepository::class
        );

        $this->app->bind(
            LabourRateRepository::class,
            EloquentLabourRateRepository::class
        );

        $this->app->bind(
            MaterialRateRepository::class,
            EloquentMaterialRateRepository::class
        );

        $this->app->bind(
            VatRepository::class,
            EloquentVatRepository::class
        );

        $this->app->bind(
            ReportsRepository::class,
            EloquentReportsRepository::class
        );

        $this->app->bind(
            SettingsRepository::class,
            EloquentSettingsRepository::class
        );

        $this->app->bind(
            InvoicesRepository::class,
            EloquentInvoicesRepository::class
        );

        $this->app->bind(
            TagRepository::class,
            EloquentTagRepository::class
        );

        $this->app->bind(
            DistrictRepository::class,
            EloquentDistrictRepository::class
        );

        $this->app->bind(
            SubDistrictRepository::class,
            EloquentSubDistrictRepository::class
        );

        $this->app->bind(
            ClientsRepository::class,
            EloquentClientsRepository::class
        );
        $this->app->bind(
            StatusReportRepository::class,
            EloquentStatusReportRepository::class
        );
    }
}
