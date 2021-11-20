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

class CreateSystemApprovals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_approvals', function (Blueprint $table) {
            $table->id();

            /**
             * Can be from any transaction / document / data
             *
             * @example:
             *  authorizeable_id 1
             *  authorizeable_type Neo\System\Models\Transactions | Neo\System\Models\Media
             */
            $table->unsignedBigInteger('approvable_id');
            $table->string('approvable_type');

            $table->softDeletes();
            $table->userStamps();
            $table->softUserStamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_approvals');
    }
}
