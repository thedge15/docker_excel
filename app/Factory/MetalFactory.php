<?php

namespace App\Factory;

use App\Models\Project;
use Illuminate\Support\Str;

class MetalFactory
{
    private $number;
    private $projectId;
    private $quantityPerUnit;
    private $title;
    private $type;
    private $equipmentCode;
    private $titlePurchase;
    private $measureUnitProject;
    private $quantityProject;
    private $measureUnitChangeInTheProject;
    private $quantityChangeInTheProject;
    private $measureUnitPurchase;
    private $quantityPurchase;
    private $measureUnitDelivered;
    private $quantityDelivered;
    private $tenderPriceWithVAT;
    private $tenderSumWithVAT;
    private $purchasePriceWithVAT;
    private $purchaseSumWithVAT;
    private $contract;
    private $specification;
    private $supplier;
    private $producer;
    private $bill;
    private $billDate;
    private $deliveryTime;
    private $orderDate;
    private $plannedDateOfShipment;
    private $timeOnTheWay;
    private $realDateOfShipment;
    private $plannedDeliveryDate;
    private $realDeliveryDate;
    private $contractDeliveryDate;
    private $reserveWithoutDelivery;
    private $note;
    private $deliveryAddress;
    private $invoice;
    private $consignmentNote;
    private $consignmentNoteDate;
    private $typeOfPaint;
    private $amountOfPaint;

    /**
     * @param $number
     * @param $projectId
     * @param $quantityPerUnit
     * @param $title
     * @param $type
     * @param $equipmentCode
     * @param $titlePurchase
     * @param $measureUnitProject
     * @param $quantityProject
     * @param $measureUnitChangeInTheProject
     * @param $quantityChangeInTheProject
     * @param $measureUnitPurchase
     * @param $quantityPurchase
     * @param $measureUnitDelivered
     * @param $quantityDelivered
     * @param $tenderPriceWithVAT
     * @param $tenderSumWithVAT
     * @param $purchasePriceWithVAT
     * @param $purchaseSumWithVAT
     * @param $contract
     * @param $specification
     * @param $supplier
     * @param $producer
     * @param $bill
     * @param $billDate
     * @param $deliveryTime
     * @param $orderDate
     * @param $plannedDateOfShipment
     * @param $timeOnTheWay
     * @param $realDateOfShipment
     * @param $plannedDeliveryDate
     * @param $realDeliveryDate
     * @param $contractDeliveryDate
     * @param $reserveWithoutDelivery
     * @param $note
     * @param $deliveryAddress
     * @param $invoice
     * @param $consignmentNote
     * @param $consignmentNoteDate
     * @param $typeOfPaint
     * @param $amountOfPaint
     */

    public function __construct($number, $projectId, $quantityPerUnit, $title, $type, $equipmentCode, $titlePurchase,
                                $measureUnitProject, $quantityProject, $measureUnitChangeInTheProject, $quantityChangeInTheProject,
                                $measureUnitPurchase, $quantityPurchase, $measureUnitDelivered, $quantityDelivered,
                                $tenderPriceWithVAT, $tenderSumWithVAT, $purchasePriceWithVAT,
                                $purchaseSumWithVAT, $contract, $specification, $supplier, $producer, $bill, $billDate,
                                $deliveryTime, $orderDate, $plannedDateOfShipment, $timeOnTheWay, $realDateOfShipment,
                                $plannedDeliveryDate, $realDeliveryDate, $contractDeliveryDate, $reserveWithoutDelivery, $note,
                                $deliveryAddress, $invoice, $consignmentNote, $consignmentNoteDate, $typeOfPaint, $amountOfPaint)
    {
        $this->number = $number;
        $this->projectId = $projectId;
        $this->quantityPerUnit = $quantityPerUnit;
        $this->title = $title;
        $this->type = $type;
        $this->equipmentCode = $equipmentCode;
        $this->titlePurchase = $titlePurchase;
        $this->measureUnitProject = $measureUnitProject;
        $this->quantityProject = $quantityProject;
        $this->measureUnitChangeInTheProject = $measureUnitChangeInTheProject;
        $this->quantityChangeInTheProject = $quantityChangeInTheProject;
        $this->measureUnitPurchase = $measureUnitPurchase;
        $this->quantityPurchase = $quantityPurchase;
        $this->measureUnitDelivered = $measureUnitDelivered;
        $this->quantityDelivered = $quantityDelivered;
        $this->tenderPriceWithVAT = $tenderPriceWithVAT;
        $this->tenderSumWithVAT = $tenderSumWithVAT;
        $this->purchasePriceWithVAT = $purchasePriceWithVAT;
        $this->purchaseSumWithVAT = $purchaseSumWithVAT;
        $this->contract = $contract;
        $this->specification = $specification;
        $this->supplier = $supplier;
        $this->producer = $producer;
        $this->bill = $bill;
        $this->billDate = $billDate;
        $this->deliveryTime = $deliveryTime;
        $this->orderDate = $orderDate;
        $this->plannedDateOfShipment = $plannedDateOfShipment;
        $this->timeOnTheWay = $timeOnTheWay;
        $this->realDateOfShipment = $realDateOfShipment;
        $this->plannedDeliveryDate = $plannedDeliveryDate;
        $this->realDeliveryDate = $realDeliveryDate;
        $this->contractDeliveryDate = $contractDeliveryDate;
        $this->reserveWithoutDelivery = $reserveWithoutDelivery;
        $this->note = $note;
        $this->deliveryAddress = $deliveryAddress;
        $this->invoice = $invoice;
        $this->consignmentNote = $consignmentNote;
        $this->consignmentNoteDate = $consignmentNoteDate;
        $this->typeOfPaint = $typeOfPaint;
        $this->amountOfPaint = $amountOfPaint;
    }

    public static function make($map, $row)
    {
        return new self(
            $row['nomer'],
            self::getProjectId($map, $row['poziciia']),
            $row['sn'] ?? null,
             $row['naimenovanie_i_texniceskaia_xarakteristika'],
            $row['tip_marka_oboznacenie_dokumenta_oprosnogo_lista'] ?? null,
            $row['kod_oborudovaniia_izdeliia_materiala'] ?? null,
            $row['zakupka'] ?? null,
            $row['edinica_izmereniia_proekt'] ?? null,
            $row['kolicestvo_proekt'] ?? null,
            $row['edinica_izmereniia_proekt_izm_ot_091122'] ?? null,
            $row['kolicestvo_proekt_izm_ot_091122'] ?? null,
            $row['edinica_izmereniia_zakupka'] ?? null,
            $row['kolicestvo_zakupka'] ?? null,
            $row['edinica_izmereniia_postavleno'] ?? null,
            $row['kolicestvo_postavleno'] ?? null,
            $row['cena_tender_rub_s_nds'] ?? null,
            self::totalPrice($row['kolicestvo_zakupka'], $row['cena_tender_rub_s_nds']) ?? null,
            $row['cena_zakupki_rub_s_nds'] ?? null,
             self::totalPrice($row['kolicestvo_zakupka'], $row['cena_zakupki_rub_s_nds']),
            $row['dogovor'] ?? null,
            $row['specifikaciia'] ?? null,
            $row['postavshhik'] ?? null,
            $row['proizvoditel'] ?? null,
            (string)$row['scet'] ?? null,
            isset($row['data_sceta']) ? self::transformDate($row['data_sceta']) : null,
            $row['srok_postavki_maks'] ?? null,
            isset($row['data_razmeshheniia']) ? self::transformDate($row['data_razmeshheniia']) : null,
            isset($row['planovaia_data_gotovnosti_oborudovaniia_k_otgruzke_so_sklada_postavshhika']) ?
                self::transformDate($row['planovaia_data_gotovnosti_oborudovaniia_k_otgruzke_so_sklada_postavshhika']) : null,
            $row['srok_v_puti'] ?? null,
            isset($row['fakticeskaia_data_otgruzki']) ? self::transformDate($row['fakticeskaia_data_otgruzki']) : null,
            isset($row['planovaia_data_postavki_na_obieekt']) ? self::transformDate($row['planovaia_data_postavki_na_obieekt']) : null,
            self::transformDate($row['fakticeskaia_data_postavki_na_obieekt']) ?? null,
            isset($row['data_po_kontraktu']) ? self::transformDate($row['data_po_kontraktu']) : null,
            $row['zapas_dnei_bez_uceta_dostavki'] ?? null,
            $row['primecanie'] ?? null,
            $row['bazis_postavki'] ?? null,
            (string)$row['scet_faktura'] ?? null,
            $row['tovarnaia_nakladnaia'] ?? null,
            isset($row['data_torg_12']) ? self::transformDate($row['data_torg_12']) : null,
            $row['marka_kraski'] ?? null,
            $row['kolicestvo_kraski'] ?? null,
        );
    }

    private static function getProjectId($map, $title)
    {
        return isset($map[$title]) ? $map[$title] : Project::updateOrCreate(['title' => $title])->id;
    }

    private static function transformDate($value, $format = 'Y - m - d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    private static function totalPrice($quantity, $price)
    {
        return $quantity * $price;
    }

    public function getValues(): array
    {
        $props = get_object_vars($this);
        $res = [];
        foreach ($props as $key => $prop) {
            $res[Str::snake($key)] = $prop;
        }
        return $res;
    }
}
