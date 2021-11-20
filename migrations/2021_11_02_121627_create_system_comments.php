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

class CreateSystemComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('sys_comments');

        Schema::create('sys_comments', function (Blueprint $table) {
            $table->id();
            /**
             * Can be from any table
             */
            $table->morphs('commentable');

            /**
             * Can be from organization or user
             *
             * @example:
             *  commenter_id 1
             *  commenter_type Neo\System\Models\Organization | Neo\System\Models\User
             */
            $table->morphs('commenter');

            $table->text('message');

            /**
             * When replying the origin replied message would be it's parent
             */
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
        Schema::dropIfExists('sys_comments');
    }
}
