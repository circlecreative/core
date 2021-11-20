<?php
/**
 * This file is part of the NEO ERP Application.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         PT. Lingkar Kreasi (Circle Creative)
 *  @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */
// ------------------------------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemApprovalsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_approvals_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('approval_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('step');
            $table->string('role');
            $table->softDeletes();
            $table->userStamps();
            $table->softUserStamps();
            $table->timestamps();

//            $table->foreign('approval_id')
//                ->references('id')
//                ->on('sys_approvals')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//            $table->foreign('user_id')
//                ->references('id')
//                ->on('sys_users')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_approvals_users');
    }
}
