<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dep1=new Department();	$dep1->id='1';	$dep1->name_tbl='Amazonas';	$dep1->save();
        $dep2=new Department();	$dep2->id='2';	$dep2->name_tbl='Ancash';	$dep2->save();
        $dep3=new Department();	$dep3->id='3';	$dep3->name_tbl='Apurimac';	$dep3->save();
        $dep4=new Department();	$dep4->id='4';	$dep4->name_tbl='Arequipa';	$dep4->save();
        $dep5=new Department();	$dep5->id='5';	$dep5->name_tbl='Ayacucho';	$dep5->save();
        $dep6=new Department();	$dep6->id='6';	$dep6->name_tbl='Cajamarca';	$dep6->save();
        $dep7=new Department();	$dep7->id='7';	$dep7->name_tbl='Callao';	$dep7->save();
        $dep8=new Department();	$dep8->id='8';	$dep8->name_tbl='Cusco';	$dep8->save();
        $dep9=new Department();	$dep9->id='9';	$dep9->name_tbl='Huancavelica';	$dep9->save();
        $dep10=new Department();	$dep10->id='10';	$dep10->name_tbl='Huanuco';	$dep10->save();
        $dep11=new Department();	$dep11->id='11';	$dep11->name_tbl='Ica';	$dep11->save();
        $dep12=new Department();	$dep12->id='12';	$dep12->name_tbl='Junin';	$dep12->save();
        $dep13=new Department();	$dep13->id='13';	$dep13->name_tbl='La Libertad';	$dep13->save();
        $dep14=new Department();	$dep14->id='14';	$dep14->name_tbl='Lambayeque';	$dep14->save();
        $dep15=new Department();	$dep15->id='15';	$dep15->name_tbl='Lima';	$dep15->save();
        $dep16=new Department();	$dep16->id='16';	$dep16->name_tbl='Loreto';	$dep16->save();
        $dep17=new Department();	$dep17->id='17';	$dep17->name_tbl='Madre de Dios';	$dep17->save();
        $dep18=new Department();	$dep18->id='18';	$dep18->name_tbl='Moquegua';	$dep18->save();
        $dep19=new Department();	$dep19->id='19';	$dep19->name_tbl='Pasco';	$dep19->save();
        $dep20=new Department();	$dep20->id='20';	$dep20->name_tbl='Piura';	$dep20->save();
        $dep21=new Department();	$dep21->id='21';	$dep21->name_tbl='Puno';	$dep21->save();
        $dep22=new Department();	$dep22->id='22';	$dep22->name_tbl='San Martin';	$dep22->save();
        $dep23=new Department();	$dep23->id='23';	$dep23->name_tbl='Tacna';	$dep23->save();
        $dep24=new Department();	$dep24->id='24';	$dep24->name_tbl='Tumbes';	$dep24->save();
        $dep25=new Department();	$dep25->id='25';	$dep25->name_tbl='Ucayali';	$dep25->save();
    }
}
