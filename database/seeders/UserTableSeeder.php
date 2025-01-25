<?php

namespace Database\Seeders;

use App\Models\Documentos;
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
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'paciente')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());

        $user = new User();
        $user->name = "Pablo";
        $user->last_name = "Ceballos";
        $user->document = "61123441";
        $user->adress = "Cra 13 # 76a - 26";
        $user->email = "pabloceballos6334@gmail.com";
        $user->tel = "3163466636";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'paciente')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());

        $user = new User();
        $user->name = "Andrea";
        $user->last_name = "Salazar";
        $user->document = "46722352";
        $user->adress = "Avenida 6 con calle 12";
        $user->email = "andrea8734@gmail.com";
        $user->tel = "3157838391";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'paciente')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());

        $user = new User();
        $user->name = "Marlon";
        $user->last_name = "Cardona";
        $user->document = "18749133";
        $user->adress = "Calle 60 Nte # 3b 5";
        $user->email = "mcardona3141@gmail.com";
        $user->tel = "317849123";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'paciente')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());

        $user = new User();
        $user->name = "Laura";
        $user->last_name = "Saavedra";
        $user->document = "163619342";
        $user->adress = "Cra 34a # 12 bis";
        $user->email = "lsavedra3445@gmail.com";
        $user->tel = "3179040131";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'paciente')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());

        $user = new User();
        $user->name = "Farid";
        $user->last_name = "Noguera";
        $user->document = "E412562";
        $user->adress = "Av los Campones 34";
        $user->email = "farid2003@gmail.com";
        $user->tel = "+34684642112";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'paciente')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());

        $user = new User();
        $user->name = "Esteban";
        $user->last_name = "Gonzalez Ceballos";
        $user->document = "1104804532";
        $user->adress = "Cra 12e";
        $user->email = "estebangonzalez@gmail.com";
        $user->tel = "3162380774";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'diseno_sonrisa')->first());

        $user = new User();
        $user->name = "Julian Andres";
        $user->last_name = "Cifuentes Villada";
        $user->document = "1006053806";
        $user->adress = "Cra 21e # 43 - 50";
        $user->email = "cifu@gmail.com";
        $user->tel = "3177100525";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'endodoncia')->first()); 

        $user = new User();
        $user->name = "Adriana";
        $user->last_name = "Lozano Zamorano";
        $user->document = "66840413";
        $user->adress = "Cra 54 # 32a - 24";
        $user->email = "alz@gmail.com";
        $user->tel = "3174125345";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'periodoncia')->first()); 

        $user = new User();
        $user->name = "Johns James";
        $user->last_name = "Giron Lozano";
        $user->document = "94431707";
        $user->adress = "Cra 74 # 23b - 46";
        $user->email = "joarasan@gmail.com";
        $user->tel = "3152341665";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'cirugia_oral')->first()); 

        $user = new User();
        $user->name = "Camila";
        $user->last_name = "Rosero Noguera";
        $user->document = "94145634";
        $user->adress = "Cra 17f # 31 - 23";
        $user->email = "camirn@gmail.com";
        $user->tel = "318123991";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'coronas_protesis')->first()); 

        $user = new User();
        $user->name = "Daniela";
        $user->last_name = "Rincon";
        $user->document = "1103513412";
        $user->adress = "Cra 35 # 12b - 65";
        $user->email = "danirincon1984@gmail.com";
        $user->tel = "3173568241";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'calzas_blancas')->first()); 

        $user = new User();
        $user->name = "Sebastian";
        $user->last_name = "Mayor";
        $user->document = "1008267231";
        $user->adress = "Cra 47 # 3c - 43";
        $user->email = "smayor1941@gmail.com";
        $user->tel = "3152893412";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'ortodoncia')->first());

        $user = new User();
        $user->name = "Juan David";
        $user->last_name = "Diaz";
        $user->document = "1094238442";
        $user->adress = "Cra. 76 #14-2 a 14-154";
        $user->email = "juandavid1970@gmail.com";
        $user->tel = "3177492241";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());
        $user->especialidades()->attach(Especialidad::where('name', 'higiene')->first());

        $user = new User();
        $user->name = "Andres Mauricio";
        $user->last_name = "Muñoz Puyo";
        $user->document = "12345678";
        $user->adress = "Cra 105 #12b-118";
        $user->email = "andrespuyo@gmail.com";
        $user->tel = "3106017492";
        $user->password = "norig2003";
        $user->tratamiento_datos = "si";
        $user->estado = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'admin')->first()); 
        $user->documentos()->attach(Documentos::where('name', 'CC')->first());
        
    }
}
