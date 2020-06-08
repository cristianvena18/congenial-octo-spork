<?php


namespace Presentation\Http\Validations\Schemas;


class StoreProductSchema
{
    public function getRules(): array {
        return [
            'name' => 'bail|required|max:255',
            'description' => 'bail|required',
            'price' => 'bail|required|numeric|min:0',
            'stock' => 'bail|required|integer|min:0'
        ];
    }
}
