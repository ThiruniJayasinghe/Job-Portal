<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignKeyInApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['job_id']);

            // Add the new foreign key with cascade delete
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            // Drop the updated foreign key
            $table->dropForeign(['job_id']);

            // Restore the original foreign key without cascade delete
            $table->foreign('job_id')->references('id')->on('jobs');
        });
    }
}
