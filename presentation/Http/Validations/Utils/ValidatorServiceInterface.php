<?php


namespace Presentation\Http\Validations\Utils;


interface ValidatorServiceInterface
{
    public function make(array $data, array $rules, array $message = []);

    public function isValid(): bool;

    public function getErrors(): array;
}
