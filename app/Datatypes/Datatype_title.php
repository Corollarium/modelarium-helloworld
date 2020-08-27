<?php declare(strict_types=1);

namespace App\Datatypes;

use Formularium\Model;
use Illuminate\Support\Str;

class Datatype_title extends \Formularium\Datatype\Datatype_string
{
    public function __construct(string $typename = 'title', string $basetype = 'string')
    {
        parent::__construct($typename, $basetype);
        $this->MAX_STRING_LENGTH = 30;
        $this->MIN_STRING_LENGTH = 5;
    }

    public function getRandom(array $params = [])
    {
        return mb_substr(static::faker()->words(4, true), 0, $this->MAX_STRING_LENGTH);
    }

    /**
     * Checks if $value is a valid value for this datatype considering the validators.
     *
     * @param mixed $value The value you are checking.
     * @param Model $model The entire model, if your field depends on other things of the model. may be null.
     * @throws Exception If invalid, with the message.
     * @return mixed The validated value.
     */
    public function validate($value, Model $model = null)
    {
        // in this case parent does all the checking, but here is where you'd implement your validation
        // logic, probably calling a Validator class.
        return Str::studly(parent::validate($value, $model));
    }
}
