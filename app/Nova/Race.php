<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class Race extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Race>
     */
    public static string $model = \App\Models\Race::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'date';
    public static $group = 'Race';
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','race_types.name', 'date'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            Date::make('Date')->sortable()->required(),
            BelongsTo::make('RaceType')->required()->sortable(),
            HasMany::make('Positions')->sortable(),
        ];
    }
}
