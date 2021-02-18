<?php

namespace App\Http\Requests;
use App\Rules\UniqueWithReleaseDate;
use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    private $genres = ['action', 'sci-fi', 'horror', 'comedy'];
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //filmovi sa istim nazivom i datumom objavljivanja ne mogu se dva puta dodati u bazu
            'title' => ['required','string', new UniqueWithReleaseDate($this->releaseDate)],
            //'title' => 'string|required',
            'director' => 'string|required',
            'duration' => 'integer|required|min:1|max:500',
            'releaseDate' => 'date|required',
            'imageUrl' => 'required|url',
            'genre' => 'required|string|in:' . implode(',', $this->genres),
        ];
    }
}

    
      
  