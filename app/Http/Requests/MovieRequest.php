<?php

namespace App\Http\Requests;

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
            'title' => 'string|required',
            'director' => 'string|required',
            'duration' => 'integer|required|min:1|max:500',
            'releaseDate' => 'date|required',
            'imageUrl' => 'required|url',
            'genre' => 'required|string|in:' . implode(',', $this->genres),
        ];
    }
}

    
      
  