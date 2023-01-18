<?php

namespace App\Imports;

//use App\Factory\ProjectDynamicFactory;
//use App\Factory\ProjectFactory;
use App\Factory\MetalFactory;
use App\Models\FailedRow;
use App\Models\Metal;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class MetalImport implements ToCollection, WithHeadingRow
{
//    private Task $task;

    /**
     * @param $task
     */
//    public function __construct($task)
//    {
//        $this->task = $task;
//    }


    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $projectsMap = $this->getProjectsMap(Project::all());

        foreach ($collection as $row) {

            if (!isset($row['nomer'])) continue;

            $metalFactory = MetalFactory::make($projectsMap, $row);

            Metal::updateOrCreate(
                [
                    'number' => $metalFactory->getValues()['number'],
                    'project_id' => $metalFactory->getValues()['project_id'],
                    'title' => $metalFactory->getValues()['title'],
                    'measure_unit_project' => $metalFactory->getValues()['measure_unit_project'],
                    'quantity_project' => $metalFactory->getValues()['quantity_project'],
                ],

                $metalFactory->getValues());
        }
    }

    private function getProjectsMap($projects): array
    {
        $map = [];
        foreach ($projects as $project) {
            $map[$project->title] = $project->id;
        }

        return $map;
    }

//    private function attributesMap()
//    {
//        return [

//        ];

//    public function rules(): array
//    {
//
//        return [
//            'nomer' => 'required|integer',
//            'poziciia' => 'required|string',
//            'sn' => 'nullable|string',
//            'naimenovanie_i_texniceskaia_xarakteristika' => 'required|string',
//            'tip_marka_oboznacenie_dokumenta_oprosnogo_lista' => 'nullable|string',
//            'kod_oborudovaniia_izdeliia_materiala' => 'nullable|string',
//            'zakupka' => 'nullable|string',
//            'edinica_izmereniia_proekt' => 'required|string',
//            'kolicestvo_proekt' => 'required|numeric',
//            'edinica_izmereniia_proekt_izm_ot_091122' => 'nullable|string',
//            'kolicestvo_proekt_izm_ot_091122' => 'nullable|numeric',
//            'edinica_izmereniia_zakupka' => 'nullable|string',
//            'kolicestvo_zakupka' => 'nullable|numeric',
//            'edinica_izmereniia_postavleno' => 'nullable|string',
//            'kolicestvo_postavleno' => 'nullable|string',
//            'cena_tender_rub_s_nds' => 'nullable|numeric',
//            'summa_tender_rub_s_nds' => 'nullable|numeric',
//            'cena_zakupki_rub_s_nds' => 'nullable|numeric',
//            'summa_zakupki_rub_s_nds' => 'nullable|string',
//            'dogovor' => 'nullable|string',
//            'specifikaciia' => 'nullable|string',
//            'postavshhik' => 'nullable|string',
//            'proizvoditel' => 'nullable|string',
//            'scet' => 'nullable|string',
//            'data_sceta' => 'nullable|integer',
//            'srok_postavki_maks' => 'nullable|integer',
//            'data_razmeshheniia' => 'nullable|integer',
//            'planovaia_data_gotovnosti_oborudovaniia_k_otgruzke_so_sklada_postavshhika' => 'nullable|integer',
//            'srok_v_puti' => 'nullable|integer',
//            'fakticeskaia_data_otgruzki' => 'nullable|integer',
//            'planovaia_data_postavki_na_obieekt' => 'nullable|integer',
//            'fakticeskaia_data_postavki_na_obieekt' => 'nullable|integer',
//            'data_po_kontraktu' => 'nullable|integer',
//            'zapas_dnei_bez_uceta_dostavki' => 'nullable|integer',
//            'primecanie' => 'nullable|string',
//            'bazis_postavki' => 'nullable|string',
//            'scet_faktura' => 'nullable|string',
//            'tovarnaia_nakladnaia' => 'nullable|string',
//            'data_torg_12' => 'nullable|integer',
//            'marka_kraski' => 'nullable|string',
//            'kolicestvo_kraski' => 'nullable|numeric',
//        ];
//    }



//    public function onFailure(Failure ...$failures)
//    {
//        $map = [];
//
//        foreach ($failures as $failure) {
//            if ($failure->values()["nomer"] === null) continue;
//            foreach ($failure->errors() as $error) {
//                $map[] = [
//                    'key' => $failure->attribute(),
//                    'row' => $failure->row(),
//                    'message' => $error,
////                    'task_id' => '',
//                ];
//            }
//        }
//        dd($map);
//    }

//    public function customValidationMessages(): array
//    {
//        return [
//            'nomer.required' => 'Ячейка обязательна к заполнению',
//            'summa_tender_rub_s_nds.numeric' => 'Сумма должна быть числом',
//            'scet_faktura' => 'Ячейка должна быть строкой',
//        ];
//    }
}
