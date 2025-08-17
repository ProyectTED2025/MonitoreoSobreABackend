<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mesa_geografia')->nullable();
            $table->integer('id_proceso_electoral')->nullable();
            $table->integer('codigo_mesa')->nullable();
            $table->bigInteger('num_mesa')->nullable();
            $table->integer('numero_mesa')->nullable();
            $table->integer('id_pais')->nullable();
            $table->string('nom_pais', 7)->nullable();
            $table->integer('dep')->nullable();
            $table->string('nom_dep', 10)->nullable();
            $table->integer('prov')->nullable();
            $table->string('nom_prov', 13)->nullable();
            $table->integer('circun')->nullable();
            $table->string('nom_circun', 10)->nullable();
            $table->integer('sec')->nullable();
            $table->string('nom_mun', 26)->nullable();
            $table->integer('id_loc')->nullable();
            $table->string('nom_loc', 51)->nullable();
            $table->integer('dist')->nullable();
            $table->string('nom_dist', 12)->nullable();
            $table->integer('zona')->nullable();
            $table->string('nom_zona', 31)->nullable();
            $table->integer('reci')->nullable();
            $table->string('nom_reci', 69)->nullable();
            $table->integer('ci_not_e')->nullable();
            $table->string('nom_not_e', 10)->nullable();
            $table->integer('inscritos_habilitados')->nullable();

            // campos booleanos extra
            $table->boolean('listado_indice')->default(false);
            $table->boolean('copias_actas')->default(false);
            $table->string('observaciones', 500)->nullable();
            $table->unsignedBigInteger('id_user')->nullable();

            $table->timestamps();
        });

        $sqlFile = resource_path('db/mesas.sql');

        if (file_exists($sqlFile)) {
            DB::unprepared(file_get_contents($sqlFile));
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
