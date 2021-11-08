<?php


namespace App\Console\Commands;

use App\Models\Link;
use App\Services\ICategoryService;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class newCategoryCommand extends Command
{   

     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a New Category';

    protected $categoryService;

     /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ICategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Category name');
        $parent_id = $this->ask('Parent Category id');
        $categoryInputs = array('name' => $name, 'category_parent_id' => $parent_id);
        try{
            $category = $this->categoryService->createCategory($categoryInputs);
            if(isset($category) && !empty($category)){
                $this->output->write('Category Inserted Successfully.', false);
            } 
        }
        catch(Exception $e){
            $this->output->write('Problem in insertion category message :'. $e->getMessage(), false);
        }
        return 0;
    }

}