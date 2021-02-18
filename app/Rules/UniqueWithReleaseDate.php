<?php

namespace App\Rules;

use App\Models\Movie;
use Illuminate\Contracts\Validation\Rule;

class UniqueWithReleaseDate implements Rule
{
    private $releaseDate;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Movie::where($attribute, $value)
            ->where('releaseDate', $this->releaseDate)
            ->count() == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A movie with the same title and release date already exists.';
    }
}
