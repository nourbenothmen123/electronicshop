<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class ImportCategories extends Command
{
    protected $signature = 'import:categories {url}';
    protected $description = 'Import categories from a given API URL';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $url = $this->argument('url');
        $response = Http::get($url);

        if ($response->ok()) {
            $categories = $response->json();

            // Begin a database transaction
            DB::beginTransaction();
            try {
                $idMapping = $this->importCategories($categories);

                // Commit the transaction
                DB::commit();
                $this->info('Categories imported successfully.');
            } catch (\Exception $e) {
                // Rollback the transaction on failure
                DB::rollBack();
                $this->error('Failed to import categories: ' . $e->getMessage());
            }
        } else {
            $this->error('Failed to fetch categories from the API.');
        }
    }

    private function importCategories(array $categories)
    {
        // Sort categories so that parents are inserted before their children
        $sortedCategories = $this->sortCategories($categories);

        $idMapping = [];
        foreach ($sortedCategories as $category) {
            // Check if parent_id exists and map it to the new ID
            $parentId = $category['parent_id'] ?? null;
            if ($parentId && isset($idMapping[$parentId])) {
                $parentId = $idMapping[$parentId];
            }
               // Handle the category image
            //    $imagePath = null;
            //    if (isset($category['category_image'])) {
            //        $imagePath = $this->storeCategoryImage($category['category_image']);
            //    }
//             $imagePath = null;
// if (isset($category['category_image'])) {
//     $imagePath = $this->storeCategoryImage($category['category_image'], $category['category_image_name']);
// }
// if (isset($category['category_image'])) {
//     $imagePath = $this->storeCategoryImage($category['category_image']);
// }
            // Insert the category
            $newCategory = Category::create([
                'name' => $category['name'],
                'description' => $category['description'],
                'parent_id' => $parentId,
                'category_image' => $category['category_image'],
            ]);

            // Map the old ID to the new ID
            $idMapping[$category['id']] = $newCategory->id;
        }

        return $idMapping;
    }

    private function sortCategories(array $categories)
    {
        // Sort the categories so that parent categories come before their children
        $sorted = [];
        $categoriesById = [];

        // First, build a map of categories by ID
        foreach ($categories as $category) {
            $categoriesById[$category['id']] = $category;
        }

        // Helper function to add a category and its parents to the sorted list
        $addCategoryAndParents = function ($category) use (&$sorted, &$categoriesById, &$addCategoryAndParents) {
            if (isset($category['parent_id']) && $category['parent_id']) {
                $parent = $categoriesById[$category['parent_id']] ?? null;
                if ($parent && !in_array($parent, $sorted)) {
                    $addCategoryAndParents($parent);
                }
            }
            if (!in_array($category, $sorted)) {
                $sorted[] = $category;
            }
        };

        // Sort all categories
        foreach ($categories as $category) {
            $addCategoryAndParents($category);
        }

        return $sorted;
    }

    // private function storeCategoryImage($base64Image)
    // {
    //     // Decode the base64 encoded image
    //     $imageContents = base64_decode($base64Image);
        
    //     // Generate a unique name for the image
    //     $imageName = uniqid() . '.jpg'; // or any appropriate extension
        
    //     // Define the path where the image will be stored
    //     $path = 'category_images/' . $imageName;
        
    //     // Store the image in the public storage directory
    //     Storage::disk('public')->put($path, $imageContents);

    //     return $path;
    // }
    // private function storeCategoryImage($base64Image)
    // {
    //     // Decode the base64 encoded image
    //     $imageContents = base64_decode($base64Image);
        
    //     // Generate a unique name for the image
    //     $imageName = uniqid() . '.jpg'; // or any appropriate extension
        
    //     // Define the path where the image will be stored
    //     $path = 'images/' . $imageName;
        
    //     // Store the image in the public/images directory
    //     Storage::disk('public')->put($path, $imageContents);

    //     return $path;
    // }
    // private function storeCategoryImage($base64Image)
    // {
    //     // Decode the base64 encoded image
    //     $imageContents = base64_decode($base64Image);
        
    //     // Generate a unique name for the image
    //     $imageName = uniqid() . '.jpg'; // or any appropriate extension
        
    //     // Define the path where the image will be stored
    //     $path = 'images/' . $imageName; // Store in public/images
        
    //     // Store the image in the public/images directory
    //     file_put_contents(public_path($path), $imageContents);

    //     return $path;
    // }
//     private function storeCategoryImage($base64Image, $originalName)
// {
//     // Decode the base64 encoded image
//     $imageContents = base64_decode($base64Image);
    
//     // Define the path where the image will be stored
//     $path = 'images/' . $originalName; // Store in public/images
    
//     // Store the image in the public/images directory
//     file_put_contents(public_path($path), $imageContents);

//     return $path;
// }
// private function storeCategoryImage($base64Image)
// {
//     // Decode the base64 encoded image
//     $imageData = base64_decode($base64Image);
    
//     // Generate a unique name for the image
//     $imageName = uniqid() . '.jpg'; // or any appropriate extension
    
//     // Define the path where the image will be stored
//     $path = 'images/' . $imageName; // Store in public/images
    
//     // Store the image in the public/images directory
//     file_put_contents(public_path($path), $imageData);
//     // Log the path for debugging
//     \Log::info('Image path: ' . $path);

//     return $path;
// }
}
