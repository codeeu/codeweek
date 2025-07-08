<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MatchmakingProfileFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'support_types',
        'types',
        'locations',
        'languages',
        'support_activities',
        'digital_expertise_areas',
        'target_school_types',
        'time_commitment',
        'can_start_immediately',
        'format',
        'want_updates',
        'agree_to_be_contacted_for_feedback',
        'query',
        'start_time',
        'topics',
    ];

    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    protected function support_types($types): Builder
    {
        if (empty($types)) {
            return $this->builder;
        }
        
        return $this->builder->whereIn('type', $types);
    }

    protected function locations($countries): Builder
    {
        if (empty($countries)) {
            return $this->builder;
        }
        return $this->builder->whereIn('country', $countries);
    }
    
    protected function types($values): Builder
    {
        if (empty($values)) {
            return $this->builder;
        }
        logger($values);
        return $this->builder->where(function ($q) use ($values) {
            foreach ($values as $value) {
                $q->orWhereJsonContains('organisation_type', $value);
            }
        });
    }

    protected function languages($languages): Builder
    {
        if (empty($languages)) {
            return $this->builder;
        }
        return $this->builder->where(function ($q) use ($languages) {
            foreach ($languages as $lang) {
                $q->orWhereJsonContains('languages', $lang);
            }
        });
    }

    protected function support_activities($activities): Builder
    {
        if (empty($activities)) {
            return $this->builder;
        }
        return $this->builder->where(function ($q) use ($activities) {
            foreach ($activities as $activity) {
                $q->orWhereJsonContains('support_activities', $activity);
            }
        });
    }

    protected function target_school_types($types): Builder
    {
        if (empty($types)) {
            return $this->builder;
        }
        return $this->builder->where(function ($q) use ($types) {
            foreach ($types as $type) {
                $q->orWhereJsonContains('target_school_types', $type);
            }
        });
    }

    protected function time_commitment($commitments): Builder
    {
        if (empty($commitments)) {
            return $this->builder;
        }
        return $this->builder->where(function ($q) use ($commitments) {
            foreach ($commitments as $commitment) {
                $q->orWhereJsonContains('time_commitment', $commitment);
            }
        });
    }

    protected function format($formats): Builder
    {
        if (empty($formats)) {
            return $this->builder;
        }
        return $this->builder->whereIn('format', $formats);
    }

    protected function can_start_immediately($flag): Builder
    {
        if (is_null($flag)) {
            return $this->builder;
        }
        return $this->builder->where('can_start_immediately', (bool)$flag);
    }

    protected function want_updates($flag): Builder
    {
        if (is_null($flag)) {
            return $this->builder;
        }
        return $this->builder->where('want_updates', (bool)$flag);
    }

    protected function agree_to_be_contacted_for_feedback($flag): Builder
    {
        if (is_null($flag)) {
            return $this->builder;
        }
        return $this->builder->where('agree_to_be_contacted_for_feedback', (bool)$flag);
    }

    protected function start_time($start): Builder
    {
        if (empty($start)) {
            return $this->builder;
        }
        return $this->builder->where('start_time', '>=', $start);
    }

    protected function topics($values): Builder
    {
        if (empty($values)) {
            return $this->builder;
        }
        return $this->builder->where(function ($q) use ($values) {
            foreach ($values as $value) {
                $q->orWhereJsonContains('digital_expertise_areas', $value);
            }
        });
    }

    protected function query($q)
    {
        if (empty($q)) {
            return $this->builder;
        }
        return $this->builder->where(function ($builder) use ($q) {
            $builder->where('first_name', 'LIKE', "%$q%")
                ->orWhere('last_name', 'LIKE', "%$q%")
                ->orWhere('organisation_name', 'LIKE', "%$q%")
                ->orWhere('organisation_mission', 'LIKE', "%$q%")
                ->orWhere('description', 'LIKE', "%$q%");
        });
    }
}
