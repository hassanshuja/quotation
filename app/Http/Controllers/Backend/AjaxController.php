<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Contracts\TagRepository;
use App\Repositories\Contracts\LabourRateRepository;
use App\Repositories\Contracts\MaterialRateRepository;
use App\Repositories\Contracts\VatRepository;
use App\Repositories\Contracts\SettingsRepository;
use App\Repositories\Contracts\ProjectRepository;
use App\Repositories\Contracts\ProjectManagerRepository;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\QuotesRepository;
use App\Repositories\Contracts\JobcardRepository;
use Mcamara\LaravelLocalization\LaravelLocalization;
use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\Contracts\SubDistrictRepository;

use App\Models\Jobcard;
use App\Models\Settings;
use App\Models\Quotes;
use App\Models\Invoices;
use App\Models\ProjectManager;
use App\Models\User;
use App\Models\Clients;
use DB;
use Carbon\Carbon;

class AjaxController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $posts;

    /**
     * @var TagRepository
     */
    protected $tags;

    /**
     * @var LaravelLocalization
     */
    protected $localization;

    /**
     * AjaxController constructor.
     *
     * @param \App\Repositories\Contracts\PostRepository       $posts
     * @param TagRepository                                    $tags
     * @param \Mcamara\LaravelLocalization\LaravelLocalization $localization
     */
    public function __construct(PostRepository $posts, TagRepository $tags, LaravelLocalization $localization)
    {
        $this->posts = $posts;
        $this->tags = $tags;
        $this->localization = $localization;
    }

    /**
     * Global index search.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function search(Request $request)
    {
        $query = $request->get('q');

        return empty($query) ? [] : $this->posts->search($query)->take(50)->get();
    }

    /**
     * Search internal transatables routes.
     *
     * @param Request $request
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    public function routesSearch(Request $request)
    {
        $items = [];

        $routes = __('routes');

        foreach ($routes as $name => $uri) {
            $items[$name] = $uri;
        }

        return [
            'items' => $items,
        ];
    }

    /**
     * Search tags.
     *
     * @param Request $request
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    public function tagsSearch(Request $request)
    {
        $query = $request->get('q');

        $locale = app()->getLocale();

        return [
            'items' => $this->tags->query()
                ->where("name->{$locale}", 'like', "%$query%")
                ->pluck('name'),
        ];
    }

    /**
     * Search labour.
     *
     * @param Request $request
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    public function getLabourRates(LabourRateRepository $labour)
    {

        return [
            'ids' => $labour->query()
                ->where('id' ,'>' ,0)
                ->pluck('rate')
        ];
    }

    /**
     * Search material.
     *
     * @param Request $request
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    public function getMaterialRates(MaterialRateRepository $material)
    {

        return [
            'ids' => $material->query()
                ->where('id' ,'>' ,0)
                ->pluck('rate')
        ];
    }

    /**
     * Search vat.
     *
     * @param Request $request
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    public function getVatRates(VatRepository $vat)
    {

        return [
            'ids' => $vat->query()
                ->where('id' ,'>' ,0)
                ->pluck('rate')
        ];
    }

    /**
     * Search Project.
     *
     * @param Request $request
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    public function getProjects(ProjectRepository $project)
    {

        return $project->query()
                ->where('id' ,'>' ,0)
                ->select('id','name')->get();

    }
    // public function getProjectManager(ProjectManagerRepository $project_manager)
    public function getProjectManager(UserRepository $user)
    {
        // return $project_manager->query()
        //          ->where('id' , '>' ,0)
        //          ->select('id','name')->get();
        return ($user->query()->select('id','name')->whereHas('roles', function ($q) {
            //conditions from role table
            $q->Where('name', 'Project Manager');
        })->get());
    }

    public function getDistricts(DistrictRepository $district){

        return $district->query()
                    ->where('id','>',0) ->
                    select('id','name')->get();
    }


    public function getSubDistricts(SubDistrictRepository $subdistrict){

        return $subdistrict->query()
        ->where('id','>',0)->
        select('id','name')->get();
    }

    public function searchQuotes(QuotesRepository $quote, Request $request){
        $search = $request->get('q');
        if ($search) {
            return $quote->query()
                ->where('quotation_name' ,'LIKE' ,'%'. $search .'%')
                ->orWhere('quotation_digit' ,'LIKE' ,'%'. $search .'%')
                ->orWhere('quotation_number' ,'LIKE' ,'%'. $search .'%')
                ->orWhere('client_email' ,'LIKE' ,'%'. $search .'%')
                ->get();
        } else {
            return $quote->query()
                ->where('id' ,'>' ,0)
                ->get();
        }
    }

    public function searchQuotesInvoice(QuotesRepository $quote, Request $request, Invoices $invoice){
        $search = $request->get('q');
        $query = '';
        $selected_quotes = [];
        $all_invoices = $invoice::select('rows')->get();
        foreach($all_invoices as $invoice) {
          if($invoice->rows) {
            $rows = json_decode($invoice->rows);
            foreach($rows as $row) {
              if(isset($row->quotation)) {
                $selected_quotes[] = (int)$row->quotation_id;
              }
            }
          }
        }
        if ($search) {
            $query = $quote->query()
                ->where('quotation_name' ,'LIKE' ,'%'. $search .'%')
                // ->orWhere('quotation_digit' ,'LIKE' ,'%'. $search .'%')
                ->orWhere('quotation_number' ,'LIKE' ,'%'. $search .'%');
                // ->orWhere('client_email' ,'LIKE' ,'%'. $search .'%');
        } else {
            $query = $quote->query()
              ->where('id' ,'>' ,0);
        }
        if(count($selected_quotes) > 0) {
          $query->whereNotIn('id', $selected_quotes);
        }
        return $query->get();
    }
    
    public function searchLabours(LabourRateRepository $labour, Request $request){
        $search = $request->get('q');
        if ($search) {
            return $labour->query()
                ->where('name' ,'LIKE' ,'%'. $search .'%')
                ->orWhere('rate' ,'LIKE' ,'%'. $search .'%')
                ->get();
        } else {
            return $labour->query()
                ->where('id' ,'>' ,0)
                ->get();
        }
    }

    public function searchCompany(MaterialRateRepository $companypart, Request $request){
        $search = $request->get('q');
        if ($search) {
            return $companypart->query()
                ->where('name' ,'LIKE' ,'%'. $search .'%')
                ->orWhere('rate' ,'LIKE' ,'%'. $search .'%')
                ->get();
        } else {
            return $companypart->query()
                ->where('id' ,'>' ,0)
                ->get();
        }
    }


    public function searchClients(Clients $client, Request $request){
        $search = $request->get('q');
        if ($search) {
            return $users = Clients::where('first_name','LIKE', '%'. $search . '%')
            ->orwhere('last_name','LIKE', '%'. $search . '%')
            ->orwhere('business_name','LIKE', '%'. $search . '%')
            ->orwhere('email','LIKE', '%'. $search . '%')
            ->select('id','first_name','last_name','business_name','email', 'primary_phone', 'secondary_phone', 'street', 'town', 'region', 'postcode', 'notes')
            ->get();
        } else {
            return $users = Clients::where('id', '>', 0)
            ->select('id','first_name','last_name','business_name','email', 'primary_phone', 'secondary_phone', 'street', 'town', 'region', 'postcode','notes')
            ->get();
        }
        // if ($search) {
        //     return $users = User::whereHas('roles', function($q){
        //         $q->where('name', 'redactor');
        //     })
        //     ->where('name','LIKE', '%'. $search . '%')
        //     ->orwhere('email','LIKE', '%'. $search . '%')
        //     ->get();
        // } else {
        //     return $users = User::whereHas('roles', function($q){
        //         $q->where('name', 'redactor');
        //     })
        //     ->select('id','name','email')
        //     ->get();
        // }
    }

    public function getLabours(LabourRateRepository $labour)
    {
        return $labour->query()
        ->where('id' ,'>' ,0)
        ->select('id','name')->get();
    }


    public function getMaterials(MaterialRateRepository $material)
    {

        return $material->query()
                ->where('id' ,'>' ,0)
                ->select('id','name')->get();

    }

    public function getUsers(UserRepository $user)
    {

        return $user->query()
                ->where('id' ,'>' ,0)
                ->select('id','name')->get();

    }

    public function getTechnician(UserRepository $user)
    {

        return ($user->query()->select('id','name')->whereHas('roles', function ($q) {
            //conditions from role table
                 $q->Where('name', 'Technician/SubContractor');

             })->get());
        // exit;
        // return $user->query()
        //         ->where('id' ,'>' ,0)
        //         ->select('id','name')->get();

    }
    public function getTechniciansName(UserRepository $user)
    {

        $tchnician_name = $user->query()->whereHas('roles', function ($q) {
            //conditions from role table
                 $q->Where('name', 'Technician/SubContractor');

             })->groupBy('name')->pluck('name');
          // $na = $user::where('name',  'LIKE', "%{$request->get('keyword')}%")->groupBy('name')->pluck('name');

        return $tchnician_name;
        // exit;
        // return $user->query()
        //         ->where('id' ,'>' ,0)
        //         ->select('id','name')->get();

    }
    public function getManagerName(UserRepository $user, ProjectManager $project_managers, Request $request)
    {
          $val= $request->val;
          $project_manager_name = $user->query()->whereHas('roles', function ($q) {
            //conditions from role table
                 $q->Where('name', 'Project Manager');

             })->groupBy('name')->pluck('name');
        return $project_manager_name;
    }
      public function getStatus(UserRepository $user, Jobcard $jobcard, ProjectManager $project_managers, Request $request)
    {
          $val= $request->val;
          $status = $jobcard::where('status',  'LIKE', "%{$request->get('keyword')}%")->groupBy('status')->pluck('status');
        //$manager_name = $jobcard->query()->select('name')->where('name','val')->get();
        return $status;
        // exit;
        // return $user->query()
        //         ->where('id' ,'>' ,0)
        //         ->select('id','name')->get();

    }

    public function getAgeingStatus(UserRepository $user, Jobcard $jobcard, Invoices $invoice, Request $request)
    {
          $val= $request->val;
          $status = $invoice::where('invoice_status',  'LIKE', "%{$request->get('keyword')}%")->groupBy('invoice_status')->pluck('invoice_status');
        //$manager_name = $jobcard->query()->select('name')->where('name','val')->get();
        return $status;
        // exit;
        // return $user->query()
        //         ->where('id' ,'>' ,0)
        //         ->select('id','name')->get();

    }


    public function getAgeingName(UserRepository $user, Jobcard $jobcard, Invoices $invoice, Request $request)
    {
          $val= $request->val;
          $status = $invoice::where('client_name',  'LIKE', "%{$request->get('keyword')}%")->groupBy('client_name')->pluck('client_name');
        //$manager_name = $jobcard->query()->select('name')->where('name','val')->get();
        return $status;
        // exit;
        // return $user->query()
        //         ->where('id' ,'>' ,0)
        //         ->select('id','name')->get();

    }

    public function getQuotations(QuotesRepository $quotes)
    {

        return $quotes->query()
                ->where('id' ,'>' ,0)
                ->select('id','quotation_name')->get();

    }

    public function getJobcards(JobcardRepository $jobcard, Request $request)
    {
        $jobcard_id = $request->get('id');
        $quote_id = $request->get('quote_id');
        if($jobcard_id){
            return $jobcard->query()
                ->where('id' , $jobcard_id)
                ->select('id','jobcard_num','facility_name')->get();
        }
        if ($quote_id) {
          return $jobcard->query()
            ->where('quote_id' , $quote_id)
            ->orWhere('quote_id' , NULL)
            ->select('jobcard_num','id')->get();
        }
        else{
            return $jobcard->query()
                ->where('quote_id' , NULL)
                ->select('jobcard_num','id')->get();
        }


    }

    public function getVats(VatRepository $vat)
    {

        return $vat->query()
                ->where('id' ,'>' ,0)
                ->select('id','name')->get();

    }

    public function getProjectManagers(ProjectManagerRepository $project_manager, Request $request)
    {
        $project_id = $request->get('id');
        if($project_id){
            return $project_manager->query()
                ->where('project_id' , $project_id)
                ->select('id','name')->get();
        }
        else{
            return $project_manager->query()
                ->select('id','name')->get();
        }
    }

    public function getSettingsData()
    {
        $settings = Settings::orderBy('id', 'DESC')->first();
        return $settings;

    }

    public function getQuotationsRecentReference()
    {
        $quote = Quotes::orderBy('id', 'DESC')->first();
        return $quote;

    }

    public function getInvoicesRecentReference()
    {
        $invoice = Invoices::orderBy('id', 'DESC')->first();
        return $invoice;

    }
    /**
     * @param Request $request
     *
     * @return array
     */
    public function imageUpload(Request $request)
    {
        $uploadedImage = $request->file('upload');

        // Resize image below 600px width if needed
        $image = Image::make($uploadedImage->openFile())->widen(600, function ($constraint) {
            $constraint->upsize();
        });

        $imagePath = "/tmp/{$uploadedImage->getClientOriginalName()}";
        Storage::disk('public')->put($imagePath, $image->stream());

        return [
            'uploaded' => true,
            'url'      => "/storage{$imagePath}",
            'width'    => $image->width(),
            'height'   => $image->height(),
        ];
    }

    public function JobcardRemoveImage(Request $request, Jobcard $jobcard_model, JobcardRepository $jobcard) {
      $id = $request->id;
      $image_name = $request->image_name;
      $type = $request->type;
      $result = $jobcard->query()->where('id', $id)->select('*')->get();
      if ($type == 'before_pictures') {
        $before_pictures = json_decode($result[0]->before_pictures, true);
          foreach($before_pictures as $key => $value) {
            if ($value['image_name'] == $image_name) {
              array_splice($before_pictures, $key, 1);
            }
          }
          $update_jobcard = [
            'before_pictures' => json_encode($before_pictures)
          ];
          $before_pictures = json_encode($before_pictures);
          $save = $jobcard_model::where('id', $id)->update($update_jobcard);
          if ($save) {
            if(file_exists(public_path().$image_name)) {
              if(unlink(public_path().$image_name)){
                return response()->json([
                  'status'  => 200,
                  'image_delete' => $image_name
                ]);
              } else {
                return response()->json([
                  'status'  => 403
                ]);
              }
            }
          }
      }
      if ($type == 'after_pictures')  {
        $after_pictures = json_decode($result[0]->after_pictures, true);
        foreach($after_pictures as $key => $value) {
            if ($value['image_name'] == $image_name) {
              array_splice($after_pictures, $key, 1);
            }
        }
        $update_jobcard = ['after_pictures' => json_encode($after_pictures)];
        $after_pictures = json_encode($after_pictures);
        $save = $jobcard_model::where('id', $id)->update($update_jobcard);
        if ($save) {
            if(file_exists(public_path().$image_name)) {
                if(unlink(public_path().$image_name)){
                return response()->json([
                  'status'  => 200,
                  'image_delete' => $image_name
                ]);
              } else {
                return response()->json([
                  'status'  => 403
                ]);
              }
            }
        }
      }
      if ($type == 'attachment_receipt')  {
        $attachment_receipt = json_decode($result[0]->attachment_receipt, true);
        foreach($attachment_receipt as $key => $value) {
            if ($value['image_name'] == $image_name) {
              array_splice($attachment_receipt, $key, 1);
            }
        }
        $update_jobcard = ['attachment_receipt' => json_encode($attachment_receipt)];
        $attachment_receipt = json_encode($attachment_receipt);
        $save = $jobcard_model::where('id', $id)->update($update_jobcard);
        if ($save) {
            if(file_exists(public_path().$image_name)) {
                if(unlink(public_path().$image_name)){
                return response()->json([
                  'status'  => 200,
                  'image_delete' => $image_name
                ]);
              } else {
                return response()->json([
                  'status'  => 403
                ]);
              }
            }
        }
      }
    }


    public function CompleteJobcards( Request $request, Jobcard $jobcard){

        $completedJobcards = $jobcard::where( 'status', 'completed')->get();

       //$savedNewUser = $jobcard::whereDate('created_at', Carbon::today())->get();
        // $savedNewUser  =  $users::where('created_at','new Date().toISOString()');
        $completedJobcardsCount    =   $completedJobcards->count();

            if ($completedJobcardsCount) {
            return response()->json([
                'status' => 200,
                'completed_jobcards' => $completedJobcardsCount
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'response' => 'Something Went wrong, Please Try Again'
            ]);
        }
    }


    public function QuotedJobcards(Request $request, Quotes $quotes){
       //$completedJobcards = $quotes::where( 'status', 'completed')->get();
       $quotedJobcards = $quotes::select('quotes.jobcard_id')->join('jobcard', 'jobcard.id', '=', 'quotes.jobcard_id')
                        ->where('jobcard.status', 'Quoted')->count();

       //$savedNewUser = $jobcard::whereDate('created_at', Carbon::today())->get();
        // $savedNewUser  =  $users::where('created_at','new Date().toISOString()');
        // $quotedJobcardsCount    =   $quotedJobcards->count();
        // dd($quotedJobcards);

            if ($quotedJobcards) {
            return response()->json([
                'status' => 200,
                'quoted_jobcards' => $quotedJobcards
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'response' => 'Something Went wrong, Please Try Again'
            ]);
        }


    }

    public function UnallocatedJobcard(Request $request, Jobcard $jobcard){
       $unallocatedJobcards = $jobcard::where( 'status', 'received')->get();

       //$savedNewUser = $jobcard::whereDate('created_at', Carbon::today())->get();
        // $savedNewUser  =  $users::where('created_at','new Date().toISOString()');
        $unallocatedJobcardsCount    =   $unallocatedJobcards->count();

            if ($unallocatedJobcardsCount) {
            return response()->json([
                'status' => 200,
                'unallocated_jobcards' => $unallocatedJobcardsCount
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'response' => 'Something Went wrong, Please Try Again'
            ]);
        }

    }

    public function progressJobcard(Request $request, Jobcard $jobcard){


             //$completedJobcards = $quotes::where( 'status', 'completed')->get();
       $progressJobcards = $jobcard::select('contractor_id')->where('status', 'Assigned')->get();


       //$savedNewUser = $jobcard::whereDate('created_at', Carbon::today())->get();
        // $savedNewUser  =  $users::where('created_at','new Date().toISOString()');
        $progressJobcardsCount    =   $progressJobcards->count();

            if ($progressJobcardsCount) {
            return response()->json([
                'status' => 200,
                'progress_jobcards' => $progressJobcardsCount
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'response' => 'Something Went wrong, Please Try Again'
            ]);
        }


    }

    public function Quotedamount(Request $request, Quotes $quotes){

    $quotedamount = $quotes::join('jobcard', 'jobcard.id', '=', 'quotes.jobcard_id')
    ->where('jobcard.status', 'Quoted')->sum('quotes.total_amount');
                 ;



       //$qoutedamount = $quotes::select( 'total_amount')->get();
      // $qoutedamount = $quotes::sum('total_amount')->get();


       //$savedNewUser = $jobcard::whereDate('created_at', Carbon::today())->get();
        // $savedNewUser  =  $users::where('created_at','new Date().toISOString()');
        // $qoutedamountSum    =   sum($qoutedamount);

            if ($quotedamount) {
            return response()->json([
                'status' => 200,
                'quoted_amountSum' => $quotedamount
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'response' => 'Something Went wrong, Please Try Again'
            ]);
        }


    }
     public function Invoiceamount(Request $request, Invoices $invoice){

$invoiceamount = $invoice::select('total_amount')
                  ->sum('total_amount');

       //$qoutedamount = $quotes::select( 'total_amount')->get();
       //$qoutedamount = $invoice::sum('total_amount')->get();


       //$savedNewUser = $jobcard::whereDate('created_at', Carbon::today())->get();
        // $savedNewUser  =  $users::where('created_at','new Date().toISOString()');
       // $qoutedamountSum    =   sum($qoutedamount);

            if ($invoiceamount) {
            return response()->json([
                'status' => 200,
                'invoice_amount' => $invoiceamount
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'response' => 'Something Went wrong, Please Try Again'
            ]);
        }


    }


    public function InvoicedJobcard(Request $request, Jobcard $jobcard){
       $invoicedJobcards = $jobcard::where( 'status', 'invoiced')->get();

       //$savedNewUser = $jobcard::whereDate('created_at', Carbon::today())->get();
        // $savedNewUser  =  $users::where('created_at','new Date().toISOString()');
        $invoicedJobcardsCount    =   $invoicedJobcards->count();

            if ($invoicedJobcardsCount) {
            return response()->json([
                'status' => 200,
                'invoiced_jobcards' => $invoicedJobcardsCount
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'response' => 'Something Went wrong, Please Try Again'
            ]);
        }

    }


    public function jobcardreports(Request $request, Jobcard $jobcard, JobcardRepository $jobcard_rep) {
      $data = $jobcard_rep->query()
                ->select(
                    'id', 'jobcard_num', 'labour_paid',
                    'materials_paid', 'travelling_paid',
                    'quote_id', 'quote_amount', 'status',
                    DB::raw('(labour_paid + materials_paid + travelling_paid) as expenses')
                  )
                ->where('id', '>', 0)
                ->paginate($request->get('perPage'));
      return $data;
    }

    public function getInvoiceRecords(Invoices $invoice) {
      $today = Carbon::now();
      $upto_30 = (Carbon::now())->subDays(30);
      $upto_60 = (Carbon::now())->subDays(60);
      $upto_90 = (Carbon::now())->subDays(90);
      $upto_120 = (Carbon::now())->subDays(120);
      /*********** MONEY OWNED UPTO 30 ************/
      $less_30 = $invoice::whereIn('invoice_status', ['unpaid', 'overdue'])
                  ->where('created_at', '>', $upto_30)
                  ->sum('total_amount');

      /************ MONEY OWNED UPTO 60 ************/
      $plus_30 = $invoice::whereIn('invoice_status', ['unpaid', 'overdue'])
                  ->whereBetween('created_at', array($upto_60, $upto_30))
                  ->sum('total_amount');

      /************ MONEY OWNED UPTO 90 ************/
      $plus_60 = $invoice::whereIn('invoice_status', ['unpaid', 'overdue'])
                  ->whereBetween('created_at', array($upto_90, $upto_60))
                  ->sum('total_amount');

      /************ MONEY OWNED UPTO 120 ************/
      $plus_90 = $invoice::whereIn('invoice_status', ['unpaid', 'overdue'])
                  ->whereBetween('created_at', array($upto_120, $upto_90))
                  ->sum('total_amount');

      /************ MONEY OWNED MORE THAN 120 ************/
      $plus_120 = $invoice::whereIn('invoice_status', ['unpaid', 'overdue'])
                  ->where('created_at', '<', $upto_120)
                  ->sum('total_amount');

      /****************** TOTAL OWNED *******************/
      $total_owned = $less_30 + $plus_30 + $plus_60 + $plus_90 + $plus_120;
      $total_owned = number_format($total_owned, 2);

      /****************** TOTAL PAID *******************/
      $total_paid = $invoice::where('invoice_status', 'paid')->sum('total_amount');
      $total_paid = number_format($total_paid, 2);

      return response()->json([
        'status' => 200,
        'counts' => [
          'less_30' => $less_30,
          'plus_30' => $plus_30,
          'plus_60' => $plus_60,
          'plus_90' => $plus_90,
          'plus_120' => $plus_120
        ],
        'total_paid' => $total_paid,
        'total_owned' => $total_owned
      ]);
    }

}
