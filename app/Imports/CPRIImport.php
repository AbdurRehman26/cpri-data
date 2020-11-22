<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class CPRIImport implements OnEachRow, WithStartRow, WithChunkReading
{

        /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function onRow(Row $row)
    {
        $value = $row->toArray();
        dd($value);
        /*
        * Adding up the product in its table and ignoring if it
        * already exists, Also caching it for further use
        */
        $sitesData = [
          'code' => str_replace(' ', '', $value[0]),
    			'bsc_name' => str_replace(' ', '', $value[1]),
    			'name' => str_replace(' ', '', $value[2]),
    			'no_of_cells' => str_replace(' ', '', $value[3]),
          'vendor' => str_replace(' ', '', $value[4]),
          'city' => str_replace(' ', '', $value[5]),
          'omc' => str_replace(' ', '', $value[6]),
          'site_type' => str_replace(' ', '', $value[7]),
          'priority' => str_replace(' ', '', $value[8]),
          'type' => str_replace(' ', '', $value[9]),
          'region' => str_replace(' ', '', $value[10]),
    			'sub_region' => str_replace(' ', '', $value[11]),
    			'comm_region' => str_replace(' ', '', $value[12]),
    			'osv' => str_replace(' ', '', $value[13]),
    			'proposed_region' => str_replace(' ', '', $value[14]),
    			'zone' => str_replace(' ', '', $value[15]),
    			'mbu' => str_replace(' ', '', $value[16]),
    			'rbu' => str_replace(' ', '', $value[17]),
          'latitude' => str_replace(' ', '', $value[18]),
          'longitude' => str_replace(' ', '', $value[19]),
    			'network_type' => str_replace(' ', '', $value[20]),
    			'prime_no_prime' => str_replace(' ', '', $value[21]),
    			'indoor_outdoor' => str_replace(' ', '', $value[22]),
    			'genset_status' => str_replace(' ', '', $value[23]),
    			'omo_colocation' => str_replace(' ', '', $value[24]),
    			'omo_id' => str_replace(' ', '', $value[25]),
    			'collocated_status' => str_replace(' ', '', $value[26]),
    			'moran_site' => str_replace(' ', '', $value[27]),
    			'site_power_profile' => str_replace(' ', '', $value[28]),
    			'deodar_shared' => str_replace(' ', '', $value[29]),
    			'lac' => str_replace(' ', '', $value[30]),
    			'vlan' => str_replace(' ', '', $value[31])
        ];

        app("SiteRepository")->create($sitesData);


    }

    /**
    * @return int
    */
    public function chunkSize(): int
    {
        /*
        * By breaking it in chunks we are speeding up the process
        * speeding up will also be depended upon the process
        * that we configure in our supervisor or horizon
        */

        return 5000;
    }


	/**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

}
