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

class CreateSystemAuthorities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_authorities', function (Blueprint $table) {
            $table->id();
            $table->string('endpoint');

            /**
             * Can be from organization or user
             *
             * @example:
             *  authorizeable_id 1
             *  authorizeable_type Neo\System\Models\Organization | Neo\System\Models\User
             */
            $table->unsignedBigInteger('authorizeable_id');
            $table->string('authorizeable_type');

            /**
             * GRANTED: User can view/read
             * WRITE: User can view/read, add new, copy, delete
             * DENIED: User can't access
             */
            $table->enum('permission', ['GRANTED', 'WRITE', 'DENIED']);

            /**
             * Additional scope permissions
             */
            $table->json('scope');
            $table->nestedSet();
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
        Schema::dropIfExists('sys_authorities');
    }
}
