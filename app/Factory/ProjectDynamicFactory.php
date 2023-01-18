<?php

namespace App\Factory;

use App\Models\Type;
use Illuminate\Support\Str;

class ProjectDynamicFactory
{
    private $typeId;
    private $title;
    private $creationDate;
    private $signingTheContract;
    private $deadline;
    private $chainStores;
    private $hasOutsource;
    private $hasInvestors;
    private $deliveryOnTime;
    private $workerCount;
    private $serviceCount;
    private $comment;
    private $performanceIndicator;

    /**
     * @param $typeId
     * @param $title
     * @param $creationDate
     * @param $signingTheContract
     * @param $deadline
     * @param $chainStores
     * @param $hasOutsource
     * @param $hasInvestors
     * @param $deliveryOnTime
     * @param $workerCount
     * @param $serviceCount
     * @param $comment
     * @param $performanceIndicator
     */
    public function __construct($typeId, $title, $creationDate, $signingTheContract, $deadline, $chainStores,
                                $hasOutsource, $hasInvestors, $deliveryOnTime, $workerCount, $serviceCount, $comment,
                                $performanceIndicator)
    {
        $this->typeId = $typeId;
        $this->title = $title;
        $this->creationDate = $creationDate;
        $this->signingTheContract = $signingTheContract;
        $this->deadline = $deadline;
        $this->chainStores = $chainStores;
        $this->hasOutsource = $hasOutsource;
        $this->hasInvestors = $hasInvestors;
        $this->deliveryOnTime = $deliveryOnTime;
        $this->workerCount = $workerCount;
        $this->serviceCount = $serviceCount;
        $this->comment = $comment;
        $this->performanceIndicator = $performanceIndicator;
    }

    public static function make($map, $row)
    {
        return new self(
            self::getTypeId($map, $row[0]),
            $row[1],
            self::transformDate($row[2]),
            self::transformDate($row[9]),
            isset($row[7]) ? self::transformDate($row[7]) : null,
            self::formatBool($row[3]),
            self::formatBool($row[5]),
            self::formatBool($row[6]),
            isset($row[8]) ? self::formatBool($row[8]) : null,
            $row[4] ?? null,
            $row[10] ?? null,
            $row[11] ?? null,
            $row[12] ?? null,
        );
    }

    private static function getTypeId($map, $title)
    {
        return isset($map[$title]) ? $map[$title] : Type::create(['title' => $title])->id;
    }

    private static function formatBool($value)
    {
        return $value === 'Да';
    }

    private static function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function getValues()
    {
        $props = get_object_vars($this);
        $res = [];
        foreach ($props as $key => $prop) {
            $res[Str::snake($key)] = $prop;
        }
        return $res;
    }
}
