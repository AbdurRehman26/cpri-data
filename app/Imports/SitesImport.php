<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class SitesImport implements OnEachRow, WithStartRow, WithChunkReading
{

        /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function onRow(Row $row)
    {
        $value = $row->toArray();

        /*
        * Adding up the product in its table and ignoring if it
        * already exists, Also caching it for further use
        */

        $vendorColumn = str_replace(" ", "", $value[18]);
        $cityColumn = str_replace(" ", "", $value[19]);
        $siteTypeColumn = str_replace(" ", "", $value[20]);
        $typeColumn = str_replace(" ", "", $value[21]);
        $regionColumn = str_replace(" ", "", $value[22]);
        $mbuColumn = str_replace(" ", "", $value[23]);
        $networkTypeColumn = str_replace(" ", "", $value[26]);
        $omcColumn = str_replace(" ", "", $value[26]);

        if($vendorColumn){

            $criteria = ['name' => $vendorColumn];
            $vendor = app('VendorRepository')->findOrCreate($criteria);

            $vendor_id = $vendor->id;

        }

        if($cityColumn){

            $criteria = ['name' => $cityColumn];
            $city = app('CityRepository')->findOrCreate($criteria);

            $city_id = $city->id;

        }

        if($siteTypeColumn){

            $criteria = ['name' => $siteTypeColumn];
            $siteType = app('SiteTypeRepository')->findOrCreate($criteria);

            $site_type_id = $siteType->id;

        }

        if($typeColumn){

            $criteria = ['name' => $typeColumn];
            $type = app('TypeRepository')->findOrCreate($criteria);

            $type_id = $type->id;

        }

        if($regionColumn){

            $criteria = ['name' => $regionColumn];
            $region = app('RegionRepository')->findOrCreate($criteria);

            $region_id = $region->id;

        }


        if($mbuColumn){

            $criteria = ['name' => $mbuColumn];
            $mbu = app('MBURepository')->findOrCreate($criteria);

            $mbu_id = $mbu->id;

        }


        if($networkTypeColumn){

            $criteria = ['name' => $networkTypeColumn];
            $networkType = app('NetworkTypeRepository')->findOrCreate($criteria);

            $network_type_id = $networkType->id;

        }



        $siteData = [
            'code' => str_replace(' ', '', $value[0]),
            'bsc_name' => str_replace(' ', '', $value[1]),
            'name' => str_replace(' ', '', $value[2]),
            'sharing_site_id' => $sharing_site_id,
            'sharing_site_code' => str_replace(' ', '', $value[4]),
            'category_id' => $category_id,
            'no_of_cells' => str_replace(' ', '', $value[6]),
            'vendor_id' => $vendor_id,
            'city_id' => $city_id,
            'site_type_id' => $site_type_id,
            'type_id' => $type_id,
            'region_id' => $region_id,
            'mbu_id' => $mbu_id,
            'latitude' => str_replace(' ', '', $value[24]),
            'longitude' => str_replace(' ', '', $value[25]),
            'network_type_id' => $network_type_id,

        ];

        $teamMembers = explode("/", $value[13]);

        foreach ($teamMembers as $key => $member) {
            $user = app('UserRepository')->findByAttribute('name', $member);

            if(!$user){

            }

        }

        app("SiteRepository")->create($siteData);


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
