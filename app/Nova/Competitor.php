<?php

namespace App\Nova;

use Laravel\Nova\Fields\HasManyThrough;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Competitor extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Competitor>
     */
    public static string $model = \App\Models\Competitor::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';
    public static $group = 'Admin';
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name','number'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param NovaRequest $request
     *
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->sortable()->required(),
            HasManyThrough::make('Classes', 'competitorClass', 'App\Nova\CompetitorClass'),
            Select::make('Class')->searchable()->options([
                'Enduro' => 'Enduro',
                'Mini mods' => 'Mini mods',
                'Sport Compact' => 'Sport Compact',
                '8 Cylinders' => '8 Cylinders',
                '4 Cylinders Open' => '4 Cylinders Open',
                'STR' => 'STR',
                'Women' => 'Women'
            ])->required(),
            /*Number::make('Score', function () {
                $scoreRules = \App\Models\ScoreRule::where('race_type_id', $this->race->race_type_id)->where('position', $this->position)->get()->pluck('points')->toArray();
                if (is_array($scoreRules) && !empty($scoreRules)) {
                    $score = $scoreRules[0];
                } else {
                    $score = 0;
                }

                return $score;
            })*/
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
