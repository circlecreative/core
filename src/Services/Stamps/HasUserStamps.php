<?php
/*
 * This file is part of the NEO ERP Application.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         PT. Lingkar Kreasi (Circle Creative)
 * @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */

namespace Neo\Core\Services\Stamps;

use Neo\Core\Observers\UserStampObserver;

trait HasUserStamps
{
    /**
     * Bootstrap the trait.
     *
     * @return void
     */
    public static function bootHasUserStamps()
    {
        static::observe(UserStampObserver::class);
    }

    /**
     * Get the user that created the model.
     *
     */
    public function creator()
    {
        return $this->belongsTo(
            config('master.users_model'),
            config('master.created_by_column'),
            config('master.users_table_column_id_name')
        );
    }

    /**
     * Get the user that edited the model.
     *
     */
    public function editor()
    {
        return $this->belongsTo(
            config('master.users_model'),
            config('master.updated_by_column'),
            config('master.users_table_column_id_name')
        );
    }

    /**
     * Get the user that deleted the model.
     *
     */
    public function destroyer()
    {
        return $this->belongsTo(
            config('master.users_model'),
            config('master.deleted_by_column'),
            config('master.users_table_column_id_name')
        );
    }

    /**
     * Has the model loaded the SoftDeletes trait.
     *
     * @return bool
     */
    public function usingSoftDeletes()
    {
        return $usingSoftDeletes = in_array(
            'Illuminate\Database\Eloquent\SoftDeletes',
            class_uses_recursive(
                get_called_class()
            )
        );
    }
}
