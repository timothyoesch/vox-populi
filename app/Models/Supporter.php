<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;

class Supporter extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, Notifiable;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'configuration_id' => 'integer',
        'customFields' => 'array',
    ];

    public function configuration(): BelongsTo
    {
        return $this->belongsTo(Configuration::class);
    }


    /**
     * Define what to log into actrivitiy log
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    /**
     * Get customField value from customField name
     */
    public function getCustomField($name)
    {
        $fieldId = CustomField::where('name', $name)->first()->id;
        if (!$fieldId) {
            return false;
        }
        return collect($this->customFields)->where('customField_id', $fieldId)->first()['value'] ?? null;
    }

    /**
     * Set customField value from customField name
     */
    public function setCustomField($name, $value, $store = false)
    {
        $fieldId = CustomField::where('name', $name)->first()->id;
        if (!$fieldId) {
            return false;
        }
        // Check if customField already exists
        $customFields = $this->customFields;
        if (collect($this->customFields)->where('customField_id', $fieldId)->first()) {
            foreach ($customFields as $key => $field) {
                if ($field['customField_id'] == $fieldId) {
                    $customFields[$key]['value'] = $value;
                }
            }
        } else {
            $customField = [
                'customField_id' => $fieldId,
                'value' => $value
            ];
            $customFields[] = $customField;
        }
        $this->customFields = $customFields;
        if ($store) {
            $this->save();
        }
    }

    /**
     * Set customFields through array of values
     */
    public function setCustomFields(array $customFields, bool $store = false)
    {
        foreach ($customFields as $name => $value) {
            $this->setCustomField($name, $value, false);
        }
        if ($store) {
            $this->save();
        }
    }

    /**
     * Mark Email as verified
     */
    public function markEmailAsVerified() : void
    {
        $this->email_verified_at = now();
        $this->save();
    }

    /**
     * Change default query to only show supporters from user's configurations unless super_admin
     */
    public function newQuery()
    {
        $query = parent::newQuery();
        if (!auth()->user()) {
            return $query;
        }
        if (!auth()->user()->hasRole('super_admin')) {
            $query->whereHas('configuration', function ($query) {
                $query->whereIn('id', auth()->user()->configurations->pluck('id'));
            });
        }
        return $query;
    }
}
