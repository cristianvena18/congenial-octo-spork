<?php


namespace Presentation\Http\Validations\Schemas;


class IndexProductSchema
{
    public function getRules(): array {
        return [
            'page' => 'bail|min:1|integer',
            'size' => 'bail|min:10|integer'
        ];
    }
}
