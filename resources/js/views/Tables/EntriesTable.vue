<template>
  <div class="card shadow" :class="type === 'dark' ? 'bg-default' : ''">
    <div
      class="card-header border-0"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-1" :class="type === 'dark' ? 'text-white' : ''">
            {{ title }}
          </h3>

        </div>
        <div class="col">
        </div>
      </div>


      <div class="row align-items-center">
        <div class="col">

          <base-input v-model="search" class="mb-1" placeholder="search"></base-input>

        </div>
        <div class="col">

          <base-button @click.prevent="handleClick" class="mb-1" type="primary" icon="ni ni-chat-round"h>Search</base-button>

        </div>
      </div>


    </div>

    <div class="table-responsive">
      <base-table
        class="table align-items-center table-flush"
        :class="type === 'dark' ? 'table-dark' : ''"
        :thead-classes="type === 'dark' ? 'thead-dark' : 'thead-light'"
        tbody-classes="list"
        :data="items"
      >
        <template slot="columns">
          <th v-for="column in columns">{{ column }}</th>
        </template>

        <template slot-scope="{ row }">
          <td class="budget">
            {{ row.code }}
          </td>
          <td class="budget">
            {{ row.bsc_name }}
          </td>
          <td class="budget">
            {{ row.name }}
          </td>

          <td class="budget">
            {{ row.sharingSite }}
          </td>

          <td class="budget">
            {{ row.sharing_site_code }}
          </td>
          <td class="budget">
            {{ row.category }}
          </td>
          <td class="budget">
            {{ row.no_of_cells }}
          </td>
          <td class="budget">
            {{ row.pm_execution }}
          </td>
          
          <td class="budget">
            {{ row.pm_executed }}
          </td>

          <td class="budget">
            {{ row.report_status }}
          </td>

          <td class="budget">
            {{ row.team }}
          </td>

          <td class="budget">
            {{ row.success_status }}
          </td>

          <td class="budget">
            {{ row.comments }}
          </td>

          <td class="budget">
            {{ row.vendor }}
          </td>

          <td class="budget">
            {{ row.city }}
          </td>

          <td class="budget">
            {{ row.siteType }}
          </td>

          <td class="budget">
            {{ row.type }}
          </td>

          <td class="budget">
            {{ row.region }}
          </td>

          <td class="budget">
            {{ row.mbu }}
          </td>

          <td class="budget">
            {{ row.latitute }}
          </td>

          <td class="budget">
            {{ row.longitude }}
          </td>

          <td class="budget">
            {{ row.networkType }}
          </td>

          <td class="budget">
            {{ row.type_of_node }}
          </td>

          <td class="budget">
            {{ row.pfu_quantity }}
          </td>
          <td class="budget">
            {{ row.npu_type }}
          </td>
          <td class="budget">
            {{ row.tn_fan_unit }}
          </td>
          <td class="budget">
            {{ row.mmu_card_type }}
          </td>
          <td class="budget">
            {{ row.weathering_status }}
          </td>
          <td class="budget">
            {{ row.npu_redundancy }}
          </td>
          <td class="budget">
            {{ row.dummy_status }}
          </td>
          <td class="budget">
            {{ row.grounding_separate }}
          </td>
          <td class="budget">
            {{ row.transmission_equipment }}
          </td>
          <td class="budget">
            {{ row.rack_heat_status }}
          </td>
          <td class="budget">
            {{ row.extra_material }}
          </td>
          <td class="budget">
            {{ row.bts_grounding }}
          </td>
          <td class="budget">
            {{ row.bbu_grounding }}
          </td>
          <td class="budget">
            {{ row.tmr_door_status }}
          </td>
          <td class="budget">
            {{ row.transmission_grounding }}
          </td>
          <td class="budget">
            {{ row.rru_weather_profiling_status }}
          </td>
          <td class="budget">
            {{ row.anteena_weather_profiling_status }}
          </td>
          <td class="budget">
            {{ row.rru_cap_status }}
          </td>
          <td class="budget">
            {{ row.rru_grounding_status }}
          </td>
          <td class="budget">
            {{ row.odu_grounding_status }}
          </td>
          <td class="budget">
            {{ row.bts_fan_status }}
          </td>
          <td class="budget">
            {{ row.uflp_card_status }}
          </td>
          <td class="budget">
            {{ row.upeu }}
          </td>
          <td class="budget">
            {{ row.ueiu }}
          </td>
          <td class="budget">
            {{ row.umpt }}
          </td>
          <td class="budget">
            {{ row.ubbp_wbbp }}
          </td>
          <td class="budget">
            {{ row.gtmu }}
          </td>
          <td class="budget">
            {{ row.ubri }}
          </td>
          <td class="budget">
            {{ row.ubbp_lbbp }}
          </td>
          <td class="budget">
            {{ row.genset_in_operation }}
          </td>
          <td class="budget">
            {{ row.ac_main_failure }}
          </td>
          <td class="budget">
            {{ row.rectifier_door_open }}
          </td>
          <td class="budget">
            {{ row.batteries_high_temp }}
          </td>
          <td class="budget">
            {{ row.room_high_temp }}
          </td>
          <td class="budget">
            {{ row.low_voltage }}
          </td>
          <td class="budget">
            {{ row.intruder_alarm }}
          </td>
          <td class="budget">
            {{ row.system_on_batteries }}
          </td>
          <td class="budget">
            {{ row.lvl_lvbd_status }}
          </td>
          <td class="budget">
            {{ row.action }}
          </td>
          <td class="budget">
            {{ row.issue }}
          </td>
          <td class="budget">
            {{ row.lb_designed_rsl }}
          </td>
          <td class="budget">
            {{ row.current_rsl }}
          </td>
          <td class="budget">
            {{ row.lb_design_tx }}
          </td>
          <td class="budget">
            {{ row.current_tx }}
          </td>
          <td class="budget">
            {{ row.lb_design_frequency }}
          </td>
          <td class="budget">
            {{ row.current_frequency }}
          </td>
          <td class="budget">
            {{ row.link_protected_unprotected }}
          </td>
        </template>
      </base-table>
    </div>

    <div
      class="card-footer d-flex justify-content-end"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <base-pagination
        :pageCount="pagination.to"
        :value="pagination.current"
        @input="changePage"
      ></base-pagination>
    </div>
  </div>
</template>
<script>
import Resource from "@/api/resource";
const siteResource = new Resource("api/entry");

export default {
  name: "projects-table",
  props: {
    type: {
      type: String,
    },
    title: String,
  },

  mounted() {
    this.getList({ pagination: true });
  },

  methods: {
    changePage(page) {
      this.getList({ pagination: true, page: page });
    },

    async getList(query) {
      this.items = [];

      this.loading = true;
      const response = await siteResource.list(query);
      this.loading = false;

      this.items = response.data;
      this.pagination = response.pagination;

      this.isLoading = false;
    },
  },
  data() {
    return {
      search: '',
      pagination: {},
      items: [],
      columns: [
        "SITE Code",
        "BSCName",
        "SiteName",
        "Sharing Site ",
        "Sharing Site ID",
        "Category",
        "NoofCells",
        "PM Executed",
        "PM Execution",
        "Report Status",
        "Team",
        "successful/unsuccessful",
        "Current/Previous Comments",
        "Vendor",
        "cityname",
        "SiteType",
        "Type",
        "Region ",
        "MBU",
        "Latitute",
        "Longitude",
        "(2G/3G)",
        "Type of node 2p,6p, 20p",
        "PFU Quantity (1,2,NA) ",
        "Npu type(NPU1C,NPU3C,NPU3D)",
        "TN fan unit avalible (FAU1, FAU2, FAU4)",
        "MMU Card type/quantity",
        "if weathering status",
        "NPU1C Redundency (Yes or NO)",
        "Dummy status (Yes or No) ",
        "Dc grounding separate from AC grounding (OK/NOK)",
        "Transmission Equipment installed in power qube (OK/NOK)",
        "TRM Rack/Heat Exchange status working (OK/NoK)",
        "Extra Material At  site ( CPRI,Antenna,RRU,Radio,TN,MMU,IF cable RF Cable",
        "BTS GROUNDING (OK/NoK)",
        "BBU GROUNDING (OK/NOK)",
        "TMR DOOR Status (OK/NOK)",
        "Transmission Grounding(OK/NoK)",
        "RRU weather Profing Status (OK/NoK)",
        "Anteena Weather Profing Status(OK/NoK)",
        "RRU Cap Status (Open/Close) ",
        "RRU Grounding Status (OK/NOK)",
        "ODU Grounding Status (OK/NoK)",
        "BTS Indoor & Outdoor Fan Status (Ok/NOK)",
        "UFLP Card Status (Ok/NOK)",
        "UPEU ",
        "UEIU (Alarm) (OK/NOK)",
        "UMPT OK/NOK",
        "UBBP D2/ WBBP F2/D2 (OK/NOK)",
        "GTMU (OK/NOK)",
        "UBRI (OK/NOK)",
        "UBBP-D5/ LBBP-D5 (OK/NOK)",
        "Genset in operation (Gen On)   OK/NOK",
        "AC Main Failure  OK/NOK",
        "Rectifier Door open (DO) (OK/NOK)",
        "Batteries High Temperatrue(outdoor) (OK/NOK)",
        "Room High Temperature (Indoor)",
        "Low Voltage (LV) (OK/NOK)",
        "Intruder Alarm (OK/NOK)",
        "System On Batteries (SOB) (OK/NOK)",
        "LVLD and LVBD status (OK/NOK)",
        "Action",
        "Issue",
        "LB / Designed RSL",
        "Current RSL",
        "LB/ Design TX power",
        "Currnet TX power",
        "LB/Design Frequency",
        "Current Frequency",
        "Link 2+2XPIC / 1+1 Protected/ 1+0 Unprotected",
      ],
    };
  },
};
</script>
<style></style>
