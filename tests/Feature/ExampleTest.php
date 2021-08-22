<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
     public function canProductBeAdded(){
         $this->post('product/',['name'=>'name','image_path'=>'path','price'=>'23','category_id'=>'1','description'=>'desc','origin_id'=>'1','brand_id'=>'2']);
         $response->assertOk();
         $this->assertCount(1,Product::all());
     }

}
