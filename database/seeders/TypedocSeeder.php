<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeDocument;

class TypedocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dep1=new TypeDocument();	$dep1->id='1';	$dep1->typedoc='dni';	$dep1->save();
        $dep2=new TypeDocument();	$dep2->id='2';	$dep2->typedoc='pasaporte';	$dep2->save();
        $dep3=new TypeDocument();	$dep3->id='3';	$dep3->typedoc='brevete';	$dep3->save();
        $dep4=new TypeDocument();	$dep4->id='4';	$dep4->typedoc='otro';	$dep4->save();
    }
 
}
