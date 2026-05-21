<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Sede;
use Illuminate\Database\Seeder;

class SedeSeeder extends Seeder
{
    public function run(): void
    {
        $grupos = [
            ['school_slug'=>'ier-bobal','sedes'=>[
                ['name'=>'C.E.R. Bobal La Playa','codigo_dane'=>'205490000331','address'=>'Vda. Bobal La Playa','is_main'=>true,'location_lat'=>8.407778,'location_lng'=>-76.740833],
                ['name'=>'C.E.R. Sevilla','codigo_dane'=>'205490002171','address'=>'Vda. Sevilla','is_main'=>false,'location_lat'=>8.431111,'location_lng'=>-76.708056],
                ['name'=>'C.E.R. El Carlos','codigo_dane'=>'205490001591','address'=>'Vda. El Carlos','is_main'=>false,'location_lat'=>8.387138,'location_lng'=>-76.732615],
                ['name'=>'C.E.R. Bobalcarito','codigo_dane'=>'205490000454','address'=>'Vda. Bobalcarito','is_main'=>false,'location_lat'=>8.427500,'location_lng'=>-76.680833],
            ]],
            ['school_slug'=>'ier-mellito','sedes'=>[
                ['name'=>'C.E.R. Mellito Arriba','codigo_dane'=>'205490000357','address'=>'Vda. Mellito Arriba','is_main'=>true,'location_lat'=>8.539250,'location_lng'=>-76.589472],
                ['name'=>'C.E.R. El Carreto','codigo_dane'=>'205490002287','address'=>'Vda. El Carreto','is_main'=>false,'location_lat'=>8.416944,'location_lng'=>-76.579167],
                ['name'=>'E.R. Alto del Rosario','codigo_dane'=>'205490001795','address'=>'Vda. Alto del Rosario','is_main'=>false,'location_lat'=>8.563333,'location_lng'=>-76.624167],
                ['name'=>'Colegio de Desarrollo Rural Necocli','codigo_dane'=>'205490001400','address'=>'Correg. Mellito','is_main'=>false,'location_lat'=>8.547222,'location_lng'=>-76.670556],
                ['name'=>'E.R. Mellito Abajo','codigo_dane'=>'205490000047','address'=>'Correg. Mellito','is_main'=>false,'location_lat'=>8.546763,'location_lng'=>-76.672241],
                ['name'=>'E.R.I. El Cedro','codigo_dane'=>'205490002279','address'=>'Vda. El Cedro','is_main'=>false,'location_lat'=>8.601111,'location_lng'=>-76.710000],
                ['name'=>'E.R. San Joaquin','codigo_dane'=>'205490001680','address'=>'Vda. San Joaquin','is_main'=>false,'location_lat'=>8.558056,'location_lng'=>-76.693889],
                ['name'=>'C.E.R. Carlos Franco','codigo_dane'=>'205490000420','address'=>'Vda. Piedrecitas','is_main'=>false,'location_lat'=>8.512462,'location_lng'=>-76.699285],
                ['name'=>'E.R. Merced 31 de Julio','codigo_dane'=>'205490000136','address'=>'Vda. La Merced','is_main'=>false,'location_lat'=>8.596944,'location_lng'=>-76.667500],
            ]],
            ['school_slug'=>'ier-caribia','sedes'=>[
                ['name'=>'I.E.R. Caribia','codigo_dane'=>'205490000462','address'=>'Correg. Caribia','is_main'=>true,'location_lat'=>8.503171,'location_lng'=>-76.670574],
                ['name'=>'C.E.R. Gariton','codigo_dane'=>'205490000560','address'=>'Vda. Gariton','is_main'=>false,'location_lat'=>8.556082,'location_lng'=>-76.712968],
                ['name'=>'C.E.R. Buenos Aires','codigo_dane'=>'205490800027','address'=>'Vda. Buenos Aires','is_main'=>false,'location_lat'=>8.502229,'location_lng'=>-76.673289],
                ['name'=>'C.E.R. Alto Carito o Brazo Izquierdo','codigo_dane'=>'205490000667','address'=>'Vda. Alto Carito','is_main'=>false,'location_lat'=>8.449368,'location_lng'=>-76.698529],
                ['name'=>'C.E.R. Limoncillo','codigo_dane'=>'205490000586','address'=>'Vda. Limoncillo','is_main'=>false,'location_lat'=>8.477500,'location_lng'=>-76.671389],
                ['name'=>'C.E.R. Almacigo Abajo','codigo_dane'=>'205490000489','address'=>'Vda. Almacigo Abajo','is_main'=>false,'location_lat'=>8.543614,'location_lng'=>-76.739903],
                ['name'=>'C.E.R. Guacamaya','codigo_dane'=>'205490000403','address'=>'Vda. Guacamaya','is_main'=>false,'location_lat'=>8.522939,'location_lng'=>-76.719043],
            ]],
            ['school_slug'=>'ier-antonio-roldan-betancur','sedes'=>[
                ['name'=>'C.E.R. El Lejano','codigo_dane'=>'205490005499','address'=>'Vda. El Lejano','is_main'=>true,'location_lat'=>8.453111,'location_lng'=>-76.759278],
            ]],
            ['school_slug'=>'ier-eduardo-espitia-romero','sedes'=>[
                ['name'=>'C.E.R. El Moncholo','codigo_dane'=>'205490000322','address'=>'Vda. El Moncholo','is_main'=>true,'location_lat'=>8.495000,'location_lng'=>-76.744444],
                ['name'=>'C.E.R. El Arizal','codigo_dane'=>'205490000811','address'=>'Vda. El Arizal','is_main'=>false,'location_lat'=>8.523936,'location_lng'=>-76.764076],
            ]],
            ['school_slug'=>'ier-totumo','sedes'=>[
                ['name'=>'Colegio El Totumo','codigo_dane'=>'205490001213','address'=>'Correg. El Totumo','is_main'=>true,'location_lat'=>8.332487,'location_lng'=>-76.743313],
                ['name'=>'C.E.R. Casa Blanca','codigo_dane'=>'205490000497','address'=>'Vda. Casa Blanca','is_main'=>false,'location_lat'=>8.371130,'location_lng'=>-76.756733],
                ['name'=>'C.E.R. Alto Caiman','codigo_dane'=>'205837000085','address'=>'Resg. Alto Caiman','is_main'=>false,'location_lat'=>8.423890,'location_lng'=>-76.791100],
                ['name'=>'C.E.R. La Ceibita','codigo_dane'=>'205490001299','address'=>'Vda. Ceibita','is_main'=>false,'location_lat'=>8.303889,'location_lng'=>-76.748333],
                ['name'=>'C.E.R. Tiwitikinia-Ipkitiwala','codigo_dane'=>'205490000781','address'=>'Resg. Caiman Nuevo','is_main'=>false,'location_lat'=>8.277500,'location_lng'=>-76.747778],
                ['name'=>'C.E.R. Nueva Estrella','codigo_dane'=>'205490000632','address'=>'Vda. La Cana','is_main'=>false,'location_lat'=>8.361667,'location_lng'=>-76.729722],
            ]],
            ['school_slug'=>'ier-la-comarca','sedes'=>[
                ['name'=>'E.R.I. La Comarca','codigo_dane'=>'205490002236','address'=>'Vda. La Comarca','is_main'=>true,'location_lat'=>8.440278,'location_lng'=>-76.640833],
                ['name'=>'E.R.I. Sinai','codigo_dane'=>'205490002317','address'=>'Vda. El Ecuador','is_main'=>false,'location_lat'=>8.410010,'location_lng'=>-76.615520],
                ['name'=>'E.R. Santa Rosa de Mulatos','codigo_dane'=>'205490001981','address'=>'Vda. Santa Rosa de Mulatos','is_main'=>false,'location_lat'=>8.494167,'location_lng'=>-76.673889],
                ['name'=>'E.R. Villa Nueva','codigo_dane'=>'205490000527','address'=>'Vda. Villa Nueva','is_main'=>false,'location_lat'=>8.451137,'location_lng'=>-76.611401],
                ['name'=>'E.R. Corcovado','codigo_dane'=>'205490000446','address'=>'Vda. Corcovado','is_main'=>false,'location_lat'=>8.491389,'location_lng'=>-76.640000],
                ['name'=>'E.R. San Isidro','codigo_dane'=>'205490000284','address'=>'Vda. San Isidro','is_main'=>false,'location_lat'=>8.466198,'location_lng'=>-76.602152],
                ['name'=>'C.E.R. Villa Sonia','codigo_dane'=>'205490002163','address'=>'Vda. Villa Sonia','is_main'=>false,'location_lat'=>8.430000,'location_lng'=>-76.620000],
            ]],
            ['school_slug'=>'ier-las-changas','sedes'=>[
                ['name'=>'Colegio Las Changas','codigo_dane'=>'205490000900','address'=>'Correg. Las Changas','is_main'=>true,'location_lat'=>8.548585,'location_lng'=>-76.575442],
                ['name'=>'E.R.I. Mulaticos La Union','codigo_dane'=>'205490002023','address'=>'Vda. Mulatico La Union','is_main'=>false,'location_lat'=>8.527582,'location_lng'=>-76.569088],
                ['name'=>'E.R.I. Sucio Arriba','codigo_dane'=>'205490001906','address'=>'Vda. Sucio Arriba','is_main'=>false,'location_lat'=>8.561389,'location_lng'=>-76.606944],
                ['name'=>'E.R.I. La Salada','codigo_dane'=>'205490001825','address'=>'Vda. La Salada','is_main'=>false,'location_lat'=>8.510556,'location_lng'=>-76.570556],
                ['name'=>'E.R. Pitamorrial','codigo_dane'=>'205490001809','address'=>'Vda. Pitamorrial','is_main'=>false,'location_lat'=>8.360000,'location_lng'=>-76.751944],
                ['name'=>'E.R. Pitamorrial Arriba','codigo_dane'=>'205490001736','address'=>'Vda. Pitamorrial Arriba','is_main'=>false,'location_lat'=>8.579722,'location_lng'=>-76.578889],
                ['name'=>'E.R. El Cativo','codigo_dane'=>'205490001558','address'=>'Vda. El Cativo','is_main'=>false,'location_lat'=>8.538056,'location_lng'=>-76.596944],
                ['name'=>'C.E.R. Nuestra Senora del Carmen','codigo_dane'=>'205490000772','address'=>'Vda. Sucio Laureles','is_main'=>false,'location_lat'=>8.573333,'location_lng'=>-76.605000],
                ['name'=>'C.E.R. Vale Pavas','codigo_dane'=>'205490001353','address'=>'Vda. Vale Pavas','is_main'=>false,'location_lat'=>8.459167,'location_lng'=>-76.732778],
                ['name'=>'C.E.R. Botijuela','codigo_dane'=>'205490000438','address'=>'Vda. Botijuela','is_main'=>false,'location_lat'=>8.497473,'location_lng'=>-76.715312],
                ['name'=>'C.E.R. El Vale','codigo_dane'=>'205490000390','address'=>'Vda. El Vale','is_main'=>false,'location_lat'=>8.469970,'location_lng'=>-76.719800],
            ]],
            ['school_slug'=>'ier-mulaticos-y-piedrecitas','sedes'=>[
                ['name'=>'I.E.R. Mulaticos Piedrecitas','codigo_dane'=>'205490000594','address'=>'Vda. Mulaticos','is_main'=>true,'location_lat'=>8.528889,'location_lng'=>-76.570556],
                ['name'=>'C.E.R. Mi Patria','codigo_dane'=>'205490000012','address'=>'Vda. Mi Patria','is_main'=>false,'location_lat'=>8.366667,'location_lng'=>-76.550000],
                ['name'=>'C.E.R. La Meseta','codigo_dane'=>'205490800132','address'=>'Vda. La Meseta','is_main'=>false,'location_lat'=>8.515231,'location_lng'=>-76.729814],
                ['name'=>'C.E.R. Sucio Arriba Parte Alta','codigo_dane'=>'205490800086','address'=>'Vda. Sucio Arriba Parte Alta','is_main'=>false,'location_lat'=>8.473089,'location_lng'=>-76.728135],
                ['name'=>'C.E.R. Semana Santa Arriba','codigo_dane'=>'205490800078','address'=>'Vda. Semana Santa Arriba','is_main'=>false,'location_lat'=>8.450336,'location_lng'=>-76.724358],
                ['name'=>'C.E.R. La Joba','codigo_dane'=>'205490800060','address'=>'Vda. La Joba','is_main'=>false,'location_lat'=>8.560010,'location_lng'=>-76.732255],
                ['name'=>'C.E.R. El Descanso','codigo_dane'=>'205490800035','address'=>'Vda. El Tigre','is_main'=>false,'location_lat'=>8.511459,'location_lng'=>-76.760064],
                ['name'=>'C.E.R. Bocas de Iguana','codigo_dane'=>'205490800019','address'=>'Vda. Bocas de Iguana','is_main'=>false,'location_lat'=>8.469804,'location_lng'=>-76.799777],
                ['name'=>'C.E.R. Algodon Arriba','codigo_dane'=>'205490800001','address'=>'Vda. Algodon Arriba','is_main'=>false,'location_lat'=>8.445280,'location_lng'=>-76.738054],
                ['name'=>'C.E.R. Nuevo Oriente','codigo_dane'=>'205490002091','address'=>'Vda. Nuevo Oriente','is_main'=>false,'location_lat'=>8.300000,'location_lng'=>-76.440000],
                ['name'=>'C.E.R. La Magdalena','codigo_dane'=>'205490002074','address'=>'Vda. La Magdalena','is_main'=>false,'location_lat'=>8.310000,'location_lng'=>-76.350000],
                ['name'=>'C.E.R. El Triunfo','codigo_dane'=>'205490001965','address'=>'Vda. El Triunfo','is_main'=>false,'location_lat'=>8.572234,'location_lng'=>-76.790253],
                ['name'=>'C.E.R. San Rafael II','codigo_dane'=>'205490001884','address'=>'Vda. San Rafael II','is_main'=>false,'location_lat'=>8.481111,'location_lng'=>-76.537222],
                ['name'=>'C.E.R. Santa Isabel','codigo_dane'=>'205490001752','address'=>'Vda. Santa Isabel','is_main'=>false,'location_lat'=>8.551667,'location_lng'=>-76.555556],
                ['name'=>'C.E.R. Cienaga Mulaticos','codigo_dane'=>'205490001302','address'=>'Vda. Cienaga Mulaticos','is_main'=>false,'location_lat'=>8.495339,'location_lng'=>-76.533014],
                ['name'=>'C.E.R. Aguas Vivas','codigo_dane'=>'205490001272','address'=>'Vda. Aguas Vivas','is_main'=>false,'location_lat'=>8.210000,'location_lng'=>-76.410000],
                ['name'=>'C.E.R. Yoki Cenizosa','codigo_dane'=>'205490000764','address'=>'Vda. Yoki Cenizosa','is_main'=>false,'location_lat'=>8.461944,'location_lng'=>-76.788056],
                ['name'=>'C.E.R. El Bejuco','codigo_dane'=>'205490000608','address'=>'Vda. El Bejuco','is_main'=>false,'location_lat'=>8.568931,'location_lng'=>-76.733146],
                ['name'=>'C.E.R. Almacigo Arriba','codigo_dane'=>'205490000373','address'=>'Vda. Almacigo Arriba','is_main'=>false,'location_lat'=>8.320000,'location_lng'=>-76.450000],
                ['name'=>'C.E.R. La Escoba','codigo_dane'=>'205490000365','address'=>'Vda. La Escoba','is_main'=>false,'location_lat'=>8.250000,'location_lng'=>-76.430000],
                ['name'=>'C.E.R. El Chejal','codigo_dane'=>'205490000306','address'=>'Vda. El Chejal','is_main'=>false,'location_lat'=>8.500000,'location_lng'=>-76.630000],
                ['name'=>'C.E.R. Semana Santa','codigo_dane'=>'205490000292','address'=>'Vda. Semana Santa','is_main'=>false,'location_lat'=>8.260000,'location_lng'=>-76.470000],
                ['name'=>'C.E.R. Santa Fe del Tuntun','codigo_dane'=>'205490000187','address'=>'Vda. Santa Fe del Tuntun','is_main'=>false,'location_lat'=>8.430556,'location_lng'=>-76.654167],
                ['name'=>'C.E.R. Yoky Nueva Luz','codigo_dane'=>'205490000110','address'=>'Vda. Yoki Nueva Luz','is_main'=>false,'location_lat'=>8.310598,'location_lng'=>-76.690629],
                ['name'=>'C.E.R. El Algodon','codigo_dane'=>'205490000039','address'=>'Vda. El Algodon','is_main'=>false,'location_lat'=>8.425098,'location_lng'=>-76.556713],
                ['name'=>'C.E.R. Vena de Palma','codigo_dane'=>'205490000021','address'=>'Vda. Vena de Palma','is_main'=>false,'location_lat'=>8.300000,'location_lng'=>-76.360000],
                ['name'=>'C.E.R. Brisas del Rio','codigo_dane'=>'205490002180','address'=>'Vda. Brisas del Rio','is_main'=>false,'location_lat'=>8.414420,'location_lng'=>-76.631065],
            ]],
            ['school_slug'=>'ier-mulatos','sedes'=>[
                ['name'=>'I.E.R. Mulatos','codigo_dane'=>'205490000128','address'=>'Correg. Mulatos','is_main'=>true,'location_lat'=>8.635477,'location_lng'=>-76.720748],
                ['name'=>'E.R.I. La Yaya','codigo_dane'=>'205490002031','address'=>'Vda. La Yaya','is_main'=>false,'location_lat'=>8.641434,'location_lng'=>-76.672185],
                ['name'=>'E.R. El Pensamiento','codigo_dane'=>'205490002015','address'=>'Vda. Calle Larga','is_main'=>false,'location_lat'=>8.615278,'location_lng'=>-76.691111],
                ['name'=>'E.R.I. Iguanita Vijao','codigo_dane'=>'205490000888','address'=>'Vda. Iguanita Vijao','is_main'=>false,'location_lat'=>8.625833,'location_lng'=>-76.651667],
                ['name'=>'C.E.R. La Gran Colombia','codigo_dane'=>'205490800051','address'=>'Vda. La Gran Colombia','is_main'=>false,'location_lat'=>8.432149,'location_lng'=>-76.761284],
                ['name'=>'C.E.R. Indio Vijao','codigo_dane'=>'205490800116','address'=>'Vda. Indio Vijao','is_main'=>false,'location_lat'=>8.511798,'location_lng'=>-76.741181],
            ]],
            ['school_slug'=>'ier-pueblo-nuevo','sedes'=>[
                ['name'=>'Colegio Pueblo Nuevo','codigo_dane'=>'205490000161','address'=>'Correg. Pueblo Nuevo','is_main'=>true,'location_lat'=>8.413008,'location_lng'=>-76.645470],
                ['name'=>'E.R. Comejen','codigo_dane'=>'205490001604','address'=>'Vda. El Comejen','is_main'=>false,'location_lat'=>8.386111,'location_lng'=>-76.678889],
                ['name'=>'C.E.R. Loma de Piedra','codigo_dane'=>'205490000179','address'=>'Vda. Loma de Piedra','is_main'=>false,'location_lat'=>8.426888,'location_lng'=>-76.653201],
                ['name'=>'C.E.R. Bella Vista','codigo_dane'=>'205490800124','address'=>'Vda. Bella Vista','is_main'=>false,'location_lat'=>8.463617,'location_lng'=>-76.776506],
            ]],
            ['school_slug'=>'ier-san-sebastian','sedes'=>[
                ['name'=>'I.E.R. San Sebastian de Uraba','codigo_dane'=>'205490000730','address'=>'Vda. San Sebastian de Uraba','is_main'=>true,'location_lat'=>8.482014,'location_lng'=>-76.794659],
                ['name'=>'E.R. El Hoyito','codigo_dane'=>'205490001957','address'=>'Vda. El Hoyito','is_main'=>false,'location_lat'=>8.468528,'location_lng'=>-76.794639],
                ['name'=>'C.E.R. Rio Necocli','codigo_dane'=>'205490000519','address'=>'Vda. El Rio Necocli','is_main'=>false,'location_lat'=>8.486667,'location_lng'=>-76.801389],
                ['name'=>'Marimonda','codigo_dane'=>'205490000314','address'=>'Vda. Marimonda','is_main'=>false,'location_lat'=>8.480000,'location_lng'=>-76.685763],
                ['name'=>'C.E.R. Caballo o Candelaria','codigo_dane'=>'205490001396','address'=>'Vda. El Caballo','is_main'=>false,'location_lat'=>8.511234,'location_lng'=>-76.812267],
                ['name'=>'C.E.R. Lechugal','codigo_dane'=>'205490000837','address'=>'Vda. El Lechugal','is_main'=>false,'location_lat'=>8.565762,'location_lng'=>-76.870678],
                ['name'=>'C.E.R. Hermanos Romero','codigo_dane'=>'205490800108','address'=>'Sin direccion','is_main'=>false,'location_lat'=>8.437092,'location_lng'=>-76.756287],
            ]],
            ['school_slug'=>'ier-tulapita','sedes'=>[
                ['name'=>'I.E.R. Tulapita','codigo_dane'=>'205490001337','address'=>'Vda. Tulapita','is_main'=>true,'location_lat'=>8.368889,'location_lng'=>-76.621667],
                ['name'=>'E.R.I. Islita Central','codigo_dane'=>'205490005651','address'=>'Vda. Islita Central','is_main'=>false,'location_lat'=>8.343735,'location_lng'=>-76.569092],
                ['name'=>'E.R.I. La Cenizosa','codigo_dane'=>'205490002155','address'=>'Vda. La Cenizosa','is_main'=>false,'location_lat'=>8.390556,'location_lng'=>-76.628056],
                ['name'=>'E.R.I. El Barro Arriba','codigo_dane'=>'205490002058','address'=>'Vda. Barro Arriba','is_main'=>false,'location_lat'=>8.357222,'location_lng'=>-76.683889],
                ['name'=>'E.R. Alonso de Ojeda','codigo_dane'=>'205490001515','address'=>'Vda. Culebriada','is_main'=>false,'location_lat'=>8.391690,'location_lng'=>-76.614967],
                ['name'=>'E.R. La Invasion','codigo_dane'=>'205490001329','address'=>'Vda. El Volcan','is_main'=>false,'location_lat'=>8.372568,'location_lng'=>-76.631210],
                ['name'=>'E.R. La Pitica','codigo_dane'=>'205490001264','address'=>'Vda. La Pitica','is_main'=>false,'location_lat'=>8.624411,'location_lng'=>-76.573174],
                ['name'=>'E.R.I. Santa Fe de la Islita','codigo_dane'=>'205490000233','address'=>'Vda. Santa Fe de la Islita','is_main'=>false,'location_lat'=>8.367340,'location_lng'=>-76.597998],
                ['name'=>'C.E.R. La Coroza','codigo_dane'=>'205490002309','address'=>'Vda. La Coroza','is_main'=>false,'location_lat'=>8.329362,'location_lng'=>-76.610002],
                ['name'=>'C.E.R. Cielo Azul','codigo_dane'=>'205490001507','address'=>'Vda. Cielo Azul','is_main'=>false,'location_lat'=>8.309660,'location_lng'=>-76.615843],
                ['name'=>'C.E.R. El Indio','codigo_dane'=>'205490000748','address'=>'Vda. El Indio Tulapa','is_main'=>false,'location_lat'=>8.298934,'location_lng'=>-76.692274],
                ['name'=>'C.E.R. Yoky Cerro Machena','codigo_dane'=>'205490000624','address'=>'Vda. Yoky Cerro Machena','is_main'=>false,'location_lat'=>8.346389,'location_lng'=>-76.659167],
                ['name'=>'C.E.R. El Paraiso','codigo_dane'=>'205490000004','address'=>'Vda. El Paraiso Tulapa','is_main'=>false,'location_lat'=>8.345376,'location_lng'=>-76.607882],
            ]],
            ['school_slug'=>'ier-zapata','sedes'=>[
                ['name'=>'E.R. La Iguana','codigo_dane'=>'205490001973','address'=>'Vda. Iguana Central','is_main'=>true,'location_lat'=>8.632500,'location_lng'=>-76.618889],
                ['name'=>'E.R.I. Giganton','codigo_dane'=>'205490002112','address'=>'Vda. Giganton','is_main'=>false,'location_lat'=>8.703889,'location_lng'=>-76.629444],
                ['name'=>'E.R.I. Zapatica','codigo_dane'=>'205490002104','address'=>'Vda. Zapatica','is_main'=>false,'location_lat'=>8.678611,'location_lng'=>-76.624167],
                ['name'=>'E.R.I. Los Naranjos','codigo_dane'=>'205490001931','address'=>'Vda. Los Naranjos','is_main'=>false,'location_lat'=>8.661667,'location_lng'=>-76.617500],
                ['name'=>'E.R.I. Iguana Porvenir','codigo_dane'=>'205490000713','address'=>'Vda. Iguana Porvenir','is_main'=>false,'location_lat'=>8.613333,'location_lng'=>-76.592222],
            ]],
            ['school_slug'=>'ier-mello-villavicencio','sedes'=>[
                ['name'=>'I.E.R. Mello Villavicencio','codigo_dane'=>'205490000098','address'=>'Correg. Mello Villavicencio','is_main'=>true,'location_lat'=>8.455556,'location_lng'=>-76.566111],
                ['name'=>'C.E.R. La Esmeralda','codigo_dane'=>'205490002210','address'=>'Vda. El Gorgojito','is_main'=>false,'location_lat'=>8.416944,'location_lng'=>-76.579167],
                ['name'=>'C.E.R. El Reparo','codigo_dane'=>'205490001817','address'=>'Vda. El Reparo','is_main'=>false,'location_lat'=>8.481111,'location_lng'=>-76.537222],
                ['name'=>'C.E.R. Nueva Esperanza','codigo_dane'=>'205490000705','address'=>'Vda. Nueva Esperanza','is_main'=>false,'location_lat'=>8.433889,'location_lng'=>-76.535556],
                ['name'=>'C.E.R. Vara Santa','codigo_dane'=>'205490000225','address'=>'Vda. Vara Santa','is_main'=>false,'location_lat'=>8.481306,'location_lng'=>-76.546417],
                ['name'=>'C.E.R. Santa Rosa de los Palmares','codigo_dane'=>'205490001469','address'=>'Vda. Santa Rosa de los Palmares','is_main'=>false,'location_lat'=>8.505524,'location_lng'=>-76.610965],
                ['name'=>'C.E.R. La Palmera','codigo_dane'=>'205490000195','address'=>'Vda. Santa Rosa de las Palmeras','is_main'=>false,'location_lat'=>8.462500,'location_lng'=>-76.507500],
            ]],
            ['school_slug'=>'ier-indigena-jose-elias-suarez','sedes'=>[
                ['name'=>'I.E.R. Indigena Jose Elias Suarez','codigo_dane'=>'205490001639','address'=>'Resg. El Volao','is_main'=>true,'location_lat'=>8.551667,'location_lng'=>-76.555556],
                ['name'=>'C.E.R. Indigenista Vara Santa','codigo_dane'=>'205490002333','address'=>'Resg. El Volao','is_main'=>false,'location_lat'=>8.545334,'location_lng'=>-76.558093],
                ['name'=>'C.E.R. Mulatico Palestina','codigo_dane'=>'205490000853','address'=>'Vda. Mulatico Palestina','is_main'=>false,'location_lat'=>8.532367,'location_lng'=>-76.554017],
                ['name'=>'Bocas de Palmitas','codigo_dane'=>'205490800167','address'=>'Comunidad Indigena Bocas de Palmitas','is_main'=>false,'location_lat'=>null,'location_lng'=>null],
                ['name'=>'Caracoli','codigo_dane'=>'205490800141','address'=>'Comunidad Indigena Caracoli','is_main'=>false,'location_lat'=>null,'location_lng'=>null],
            ]],
        ];

        $total = 0;
        foreach ($grupos as $grupo) {
            $school = School::where('slug', $grupo['school_slug'])->first();
            if (!$school) {
                $this->command->warn("Colegio no encontrado: {$grupo['school_slug']}");
                continue;
            }
            foreach ($grupo['sedes'] as $data) {
                Sede::updateOrCreate(
                    ['codigo_dane' => $data['codigo_dane']],
                    array_merge($data, ['school_id' => $school->id])
                );
                $total++;
            }
            $this->command->info("OK {$school->name} — {$school->sedes()->count()} sedes.");
        }
        $this->command->info("Total: {$total} sedes registradas.");
    }
}
