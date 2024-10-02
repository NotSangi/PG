<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Santiago";
        $user->last_name = "Giron Lozano";
        $user->document = "1005893342";
        $user->adress = "Cra 29 # 98 - 51";
        $user->email = "gironlozano1975@gmail.com";
        $user->tel = "3188048049";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->save();

        $user->roles()->attach(Role::where('name', 'paciente')->first());

        $user = new User();
        $user->name = "Esteban";
        $user->last_name = "Gonzalez Ceballos";
        $user->document = "1104804532";
        $user->adress = "Cra 12e";
        $user->email = "estebangonzalez@gmail.com";
        $user->tel = "3162380774";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'otorrino')->first());

        $user = new User();
        $user->name = "Julian Andres";
        $user->last_name = "Cifuentes Villada";
        $user->document = "1006053806";
        $user->adress = "Cra 21e # 43 - 50";
        $user->email = "cifu@gmail.com";
        $user->tel = "3177100525";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'aneste')->first()); 

        $user = new User();
        $user->name = "Adriana";
        $user->last_name = "Lozano Zamorano";
        $user->document = "66840413";
        $user->adress = "Cra 54 # 32a - 24";
        $user->email = "alz@gmail.com";
        $user->tel = "3174125345";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'aneste')->first()); 

        $user = new User();
        $user->name = "Johns James";
        $user->last_name = "Giron Lozano";
        $user->document = "94707431";
        $user->adress = "Cra 74 # 23b - 46";
        $user->email = "joarasan@gmail.com";
        $user->tel = "3152341665";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'aneste')->first()); 

        $user = new User();
        $user->name = "Camila";
        $user->last_name = "Rosero Noguera";
        $user->document = "94145634";
        $user->adress = "Cra 17f # 31 - 23";
        $user->email = "camirn@gmail.com";
        $user->tel = "318123991";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'aneste')->first()); 

        $user = new User();
        $user->name = "Andres Mauricio";
        $user->last_name = "Muñoz Puyo";
        $user->document = "12345678";
        $user->adress = "Cra 105 #12b-118";
        $user->email = "andrespuyo@gmail.com";
        $user->tel = "3106017492";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->save();

        $user->roles()->attach(Role::where('name', 'admin')->first()); 
        
    }
}
