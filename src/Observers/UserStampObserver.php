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
namespace Neo\Core\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserStampObserver
{
    /**
     * Handle to the User "creating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function creating(Model $model)
    {
        $model->created_by = $this->getUsersPrimaryValue();
        $model->updated_by = $this->getUsersPrimaryValue();
    }

    /**
     * Handle to the User "updating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function updating(Model $model)
    {
        $model->updated_by = $this->getUsersPrimaryValue();
    }

    /**
     * Handle to the User "deleting" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function deleting(Model $model)
    {
        if ($model->usingSoftDeletes()) {
            $model->deleted_by = $this->getUsersPrimaryValue();
            $model->updated_by = $this->getUsersPrimaryValue();
            $this->saveWithoutEventDispatching($model);
        }
    }

    /**
     * Handle to the User "restoring" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function restoring(Model $model)
    {
        if ($model->usingSoftDeletes()) {
            $model->deleted_by = null;
            $model->updated_by = $this->getUsersPrimaryValue();
            $this->saveWithoutEventDispatching($model);
        }
    }

    /**
     * Saves a model by igoring all other event dispatchers.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return bool
     */
    private function saveWithoutEventDispatching(Model $model)
    {
        $eventDispatcher = $model->getEventDispatcher();

        $model->unsetEventDispatcher();
        $saved = $model->save();
        $model->setEventDispatcher($eventDispatcher);

        return $saved;
    }

    /**
     * Returns the primary value for the logged in user or null when
     * there is no logged in user.
     *
     * @return int|null
     */
    private function getUsersPrimaryValue()
    {
        if (! Auth::check()) {
            return null;
        }

        if (config('master.users_table_column_id_name') !== 'id') {
            return Auth::user()->{config('master.users_table_column_id_name')};
        }

        return Auth::id();
    }
}
