<?php

namespace ZaLaravel\LaravelStaticPages\Requests;

use App\Http\Requests\Request;

class StaticPageRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        if ('POST' == $this->method()) {
            return [
                'title' => 'required',
                'slug' => 'required|regex:/^[\w\-]+$/|unique:static_pages'
            ];
        } elseif ('PATCH' == $this->method()) {
            return [
                'title' => 'required',
                'slug' => 'required|regex:/^[\w\-]+$/'
            ];
        }
	}

}
