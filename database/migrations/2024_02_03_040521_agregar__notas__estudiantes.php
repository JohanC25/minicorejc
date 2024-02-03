<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        $estudiantes = DB::table('estudiantes')->get();

        foreach ($estudiantes as $estudiante) {
            for ($i = 0; $i < 10; $i++) {
                $day = rand(1, 28);
                $month = rand(1, 2);
                $randomDate = Carbon::create(2024, $month, $day);

                if ($month == 2 && $day > 28) {
                    $randomDate = Carbon::create(2024, $month, 28);
                }

                DB::table('notas')->insert([
                    'nota' => rand(1, 10),
                    'fecha_ingresada' => $randomDate->format('Y-m-d'),
                    'id_estudiante' => $estudiante->id,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
