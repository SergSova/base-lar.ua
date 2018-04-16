<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return TRUE;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

		$rules = [
			'title_ru'    => 'bail|required|max:255',
			'category_id' => 'required',
			'mainImage'   => 'required',
		];

		return $rules;
	}


	public function messages() {
		return [
			'title_ru.required'    => 'Заголовок обязателен для статьи',
			'title_ru.unique'      => 'Такой заголовок уже есть у другой статьи',
			'title_ru.max'         => 'Заголовок не должен привышать :max символов',
			'category_id.required' => 'Нужно выбрать категорию статьи',
			'mainImage.required'   => 'Выберите главную фотографию',
		];
	}
}
