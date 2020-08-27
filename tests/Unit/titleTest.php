<?php declare(strict_types=1);

namespace Tests\Unit;

use Formularium\Datatype;
use Formularium\Factory\DatatypeFactory;
use FormulariumTests\Datatype\DatatypeBaseTestCase;

class titleTest extends DatatypeBaseTestCase
{

    /**
     * @return DataType
     */
    public function getDataType(): Datatype
    {
        return DatatypeFactory::factory('title');
    }

    /**
     * @return array
     */
    public function getValidValues()
    {
        return [
            [
                'value' => 'Some title',
                'expected' => 'Some title',
            ]
        ];
    }

    /**
     * @return array
     */
    public function getInvalidValues()
    {
        return [
            [
                'value' => 't', // too short
            ],
            [
                'value' => 'tasdfasdfjasiodfjaiosdfjaoisdfjaos faosidf aiosdfjoasdf joajsd foajsdf oiajisdf ioasdf ', // too long
            ]
        ];
    }
}
