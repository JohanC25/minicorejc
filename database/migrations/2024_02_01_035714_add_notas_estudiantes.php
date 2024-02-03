<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $students = DB::table('estudiantes')->get();

        $dates = ['2023-01-10', '2023-03-15', '2023-05-20', '2023-08-25', '2023-11-30'];

        foreach ($students as $student) {
            foreach ($dates as $date) {
                DB::table('notas')->insert([
                    'nota' => rand(1, 10),
                    'fecha_ingresada' => $date,
                    'id_estudiante' => $student->id
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
