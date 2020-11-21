<template>
  <div class="card shadow" :class="type === 'dark' ? 'bg-default' : ''">
    <div class="card-header" :class="type === 'dark' ? 'bg-transparent' : ''">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-1" :class="type === 'dark' ? 'text-white' : ''">
            Search
          </h3>
        </div>
        <div class="col"></div>
      </div>

      <div class="row align-items-center">
        <div class="col">
          <base-input
            v-model="search"
            class="mb-1"
            placeholder="Enter site code"
          ></base-input>
        </div>
        <div class="col">
          <base-button
            @click.prevent="getList"
            class="mb-1"
            type="primary"
            icon="ni ni-chat-round"
            h
            >Search</base-button
          >
        </div>
      </div>
    </div>

    <div class="card-header" :class="type === 'dark' ? 'bg-transparent' : ''">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-1" :class="type === 'dark' ? 'text-white' : ''">
            Log Entry
          </h3>
        </div>
        <div class="col"></div>
      </div>
    </div>

    <div class="table-responsive">
      <div
        class="card-header border-0"
        :class="type === 'dark' ? 'bg-transparent' : ''"
      >
        <div class="align-items-center">
          <div>
            <div class="row">
              <center>
                <base-alert v-if="noRecordFound" type="secondary">
                  <strong>404!</strong> No record found! Try another code
                </base-alert>
              </center>

              <div class="row" v-for="(row, index) in items">
                <div class="col-md-6">
                  <base-input
                    :label="columns[0].code"
                    v-model="row.code"
                    :disabled="columns[0].disabled"
                  ></base-input>
                </div>

                <!--                 <div class="col-md-6">
                  <base-input
                    :label="columns[1].bsc_name"
                    v-model="row.bsc_name"
                    :disabled="columns[1].disabled"
                  ></base-input>
                </div>
 -->
                <div class="col-md-6">
                  <base-input
                    :label="columns[2].name"
                    v-model="row.name"
                    :disabled="columns[2].disabled"
                  ></base-input>
                </div>

                <!--                 <div class="col-md-6">
                  <base-input
                    :label="columns[3].sharingSite"
                    v-model="row.sharingSite"
                    :disabled="columns[3].disabled"
                  ></base-input>
                </div>
 -->
                <div class="col-md-6">
                  <base-input
                    :label="columns[4].sharing_site_code"
                    v-model="row.sharing_site_code"
                    :disabled="columns[4].disabled"
                  ></base-input>
                </div>

                <!--                 <div class="col-md-6">
                  <base-input
                    :label="columns[5].category"
                    v-model="row.category"
                    :disabled="columns[5].disabled"
                  ></base-input>
                </div>
 -->
                <!--                 <div class="col-md-6">
                  <base-input
                    :label="columns[6].no_of_cells"
                    v-model="row.no_of_cells"
                    :disabled="columns[6].disabled"
                  ></base-input>
                </div>
 -->

                <div class="col-md-6">
                  <base-input
                    :label="columns[7].pm_execution"
                    v-model="row.pm_execution"
                    :disabled="columns[7].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[8].pm_executed"
                    v-model="row.pm_executed"
                    :disabled="columns[8].disabled"
                  ></base-input>
                </div>

                <!--                 <div class="col-md-6">
                  <base-input
                    :label="columns[9].report_status"
                    v-model="row.report_status"
                    :disabled="columns[9].disabled"
                  ></base-input>
                </div>
 -->
                <div class="col-md-6">
                  <base-input
                    :label="columns[10].team"
                    v-model="row.team"
                    :disabled="columns[10].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{
                    columns[11].success_status
                  }}</label>
                  <select
                    v-model="row.success_status"
                    class="form-control"
                    id="exampleFormControlSelect1"
                  >
                    <option value="successful">Successful</option>
                    <option value="unsuccessful">Unsuccessful</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[12].comments"
                    v-model="row.comments"
                    :disabled="columns[12].disabled"
                  ></base-input>
                </div>

                <!--                 <div class="col-md-6">
                  <base-input
                    :label="columns[13].vendor"
                    v-model="row.vendor"
                    :disabled="columns[13].disabled"
                  ></base-input>
                </div>
 -->
                <div class="col-md-6">
                  <base-input
                    :label="columns[14].city"
                    v-model="row.city"
                    :disabled="columns[14].disabled"
                  ></base-input>
                </div>

                <!--                 <div class="col-md-6">
                  <base-input
                    :label="columns[15].siteType"
                    v-model="row.siteType"
                    :disabled="columns[15].disabled"
                  ></base-input>
                </div>
                <div class="col-md-6">
                  <base-input
                    :label="columns[16].type"
                    v-model="row.type"
                    :disabled="columns[16].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[17].region"
                    v-model="row.region"
                    :disabled="columns[17].disabled"
                  ></base-input>
                </div>
 -->

                <div class="col-md-6">
                  <base-input
                    :label="columns[18].mbu"
                    v-model="row.mbu"
                    :disabled="columns[18].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[19].latitute"
                    v-model="row.latitute"
                    :disabled="columns[19].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[20].longitude"
                    v-model="row.longitude"
                    :disabled="columns[20].disabled"
                  ></base-input>
                </div>

                <!--                 <div class="col-md-6">
                  <base-input
                    :label="columns[21].networkType"
                    v-model="row.networkType"
                    :disabled="columns[21].disabled"
                  ></base-input>
                </div>
 -->

                <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{
                    columns[22].type_of_node
                  }}</label>
                  <select
                    v-model="row.type_of_node"
                    class="form-control"
                    id="exampleFormControlSelect1"
                  >
                    <option value="AMM2P">AMM2P</option>
                    <option value="AMM6P">AMM6P</option>
                    <option value="AMM20P">AMM20P</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[23].pfu_quantity}}</label>
                  <select v-model="row.pfu_quantity" class="form-control" id="exampleFormControlSelect1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="N/A">N/A</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[24].npu_type}}</label>
                  <select v-model="row.npu_type" class="form-control" id="exampleFormControlSelect1">
                    <option value="NPU1C">NPU1C</option>
                    <option value="NPU1D">NPU1D</option>
                    <option value="NPU3D">NPU3D</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[25].tn_fan_unit}}</label>
                  <select v-model="row.tn_fan_unit" class="form-control" id="exampleFormControlSelect1">
                    <option value="FAU1">FAU1</option>
                    <option value="FAU2">FAU2</option>
                    <option value="FAU4">FAU4</option>
                  </select>
                </div>


                <div class="col-md-6">
                  <base-input
                    :label="columns[26].mmu_card_type"
                    v-model="row.mmu_card_type"
                    :disabled="columns[26].disabled"
                  ></base-input>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[27].weathering_status}}</label>
                  <select v-model="row.weathering_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[28].npu_redundancy}}</label>
                  <select v-model="row.npu_redundancy" class="form-control" id="exampleFormControlSelect1">
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                </div>



              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[29].dummy_status}}</label>
                  <select v-model="row.dummy_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[30].grounding_separate}}</label>
                  <select v-model="row.grounding_separate" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[31].transmission_equipment}}</label>
                  <select v-model="row.transmission_equipment" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[32].rack_heat_status}}</label>
                  <select v-model="row.rack_heat_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


                <div class="col-md-6">
                  <base-input
                    :label="columns[33].extra_material"
                    v-model="row.extra_material"
                    :disabled="columns[33].disabled"
                  ></base-input>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[34].bts_grounding}}</label>
                  <select v-model="row.bts_grounding" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>



              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[35].bbu_grounding}}</label>
                  <select v-model="row.bbu_grounding" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>




              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[36].tmr_door_status}}</label>
                  <select v-model="row.tmr_door_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[37].transmission_grounding}}</label>
                  <select v-model="row.transmission_grounding" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[38].rru_weather_profiling_status}}</label>
                  <select v-model="row.rru_weather_profiling_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[39].anteena_weather_profiling_status}}</label>
                  <select v-model="row.anteena_weather_profiling_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[40].rru_cap_status}}</label>
                  <select v-model="row.rru_cap_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="CLOSE">CLOSE</option>
                    <option value="OPEN">OPEN</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[41].rru_grounding_status}}</label>
                  <select v-model="row.rru_grounding_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[42].odu_grounding_status}}</label>
                  <select v-model="row.odu_grounding_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[43].bts_fan_status}}</label>
                  <select v-model="row.bts_fan_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[44].uflp_card_status}}</label>
                  <select v-model="row.uflp_card_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[45].upeu}}</label>
                  <select v-model="row.upeu" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[46].ueiu}}</label>
                  <select v-model="row.ueiu" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[47].umpt}}</label>
                  <select v-model="row.umpt" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>



              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[48].ubbp_wbbp}}</label>
                  <select v-model="row.ubbp_wbbp" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>



              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[49].gtmu}}</label>
                  <select v-model="row.gtmu" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[50].ubri}}</label>
                  <select v-model="row.ubri" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[51].ubbp_lbbp}}</label>
                  <select v-model="row.ubbp_lbbp" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[52].genset_in_operation}}</label>
                  <select v-model="row.genset_in_operation" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>



              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[53].ac_main_failure}}</label>
                  <select v-model="row.ac_main_failure" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[54].rectifier_door_open}}</label>
                  <select v-model="row.rectifier_door_open" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[55].batteries_high_temp}}</label>
                  <select v-model="row.batteries_high_temp" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[56].room_high_temp}}</label>
                  <select v-model="row.room_high_temp" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>



              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[57].low_voltage}}</label>
                  <select v-model="row.low_voltage" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[58].intruder_alarm}}</label>
                  <select v-model="row.intruder_alarm" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[59].system_on_batteries}}</label>
                  <select v-model="row.system_on_batteries" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>

              <div class="col-md-6 form-group">
                  <label for="exampleFormControlSelect1">{{columns[60].lvl_lvbd_status}}</label>
                  <select v-model="row.lvl_lvbd_status" class="form-control" id="exampleFormControlSelect1">
                    <option value="OK">OK</option>
                    <option value="NOT_OK">NOT OK</option>
                  </select>
                </div>


                <div class="col-md-6">
                  <base-input
                    :label="columns[61].action"
                    v-model="row.action"
                    :disabled="columns[61].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  

                  <label>{{columns[62].issue}}</label>

                   <textarea v-model="row.issue" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write a large text here ..."></textarea>

                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[63].lb_designed_rsl"
                    v-model="row.lb_designed_rsl"
                    :disabled="columns[63].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[64].current_rsl"
                    v-model="row.current_rsl"
                    :disabled="columns[64].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[65].lb_design_tx"
                    v-model="row.lb_design_tx"
                    :disabled="columns[65].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[66].current_tx"
                    v-model="row.current_tx"
                    :disabled="columns[66].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[67].lb_design_frequency"
                    v-model="row.lb_design_frequency"
                    :disabled="columns[67].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[68].current_frequency"
                    v-model="row.current_frequency"
                    :disabled="columns[68].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-input
                    :label="columns[69].link_protected_unprotected"
                    v-model="row.link_protected_unprotected"
                    :disabled="columns[69].disabled"
                  ></base-input>
                </div>

                <div class="col-md-6">
                  <base-button v-if="!row.entry_added" @click.prevent="handleSubmit" type="success"
                    >Submit</base-button
                  >

                  <img v-if="loading" height="65" src="Spinner.gif" />

                  <base-alert type="success">
                      <strong>Log entry has been updated!</strong>
                  </base-alert>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Resource from "@/api/resource";
const entryResource = new Resource("api/entry");

export default {
  name: "projects-table",
  props: {
    type: {
      type: String,
    },
    title: String,
  },

  mounted() {},

  methods: {
    changePage(page) {
      this.getList({ pagination: true, page: page });
    },

    async handleSubmit() {
      this.loading = true;
      var itemId = this.items[0].id;

      var Items = this.items[0];

      const response = await entryResource.update(itemId, Items);

      this.getList({ pagination: true, page: 1, code: this.search });
    },

    async getList(query) {
      this.items = [];

      if (!this.search) {
        return false;
      }

      this.loading = true;

      const response = await entryResource.list({
        pagination: true,
        page: query.page ? query.page : 1,
        code: this.search,
      });

      this.noRecordFound = !response.pagination.total;
      this.items = response.data;
      this.pagination = response.pagination;

      this.loading = false;
    },
  },
  data() {
    return {
      noRecordFound: false,
      search: "",
      pagination: {},
      loading: false,
      items: [],
      columns: [
        {
          disabled: true,
          code: "SITE Code",
        },

        {
          disabled: true,
          bsc_name: "BSCName",
        },

        {
          disabled: true,
          name: "SiteName",
        },

        {
          disabled: true,
          sharingSite: "Sharing Site ",
        },

        {
          disabled: true,
          sharing_site_code: "Sharing Site ID",
        },

        {
          disabled: true,
          category: "Category",
        },

        {
          disabled: true,
          no_of_cells: "NoofCells",
        },

        {
          disabled: false,
          pm_execution: "PM Executed",
        },

        {
          disabled: false,
          pm_executed: "PM Execution",
        },

        {
          disabled: false,
          report_status: "Report Status",
        },

        {
          disabled: true,
          team: "Team",
        },

        {
          disabled: false,
          success_status: "successful/unsuccessful",
        },

        {
          disabled: false,
          comments: "Current/Previous Comments",
        },

        {
          disabled: true,
          vendor: "Vendor",
        },

        {
          disabled: true,
          city: "cityname",
        },

        {
          disabled: true,
          siteType: "SiteType",
        },

        {
          disabled: true,
          type: "Type",
        },

        {
          disabled: true,
          region: "Region ",
        },

        {
          disabled: true,
          mbu: "MBU",
        },

        {
          disabled: true,
          latitute: "Latitute",
        },

        {
          disabled: true,
          longitude: "Longitude",
        },

        {
          disabled: true,
          networkType: "(2G/3G)",
        },

        {
          disabled: false,
          type_of_node: "Type of node 2p,6p, 20p",
        },

        {
          disabled: false,
          pfu_quantity: "PFU Quantity (1,2,NA) ",
        },

        {
          disabled: false,
          npu_type: "Npu type(NPU1C,NPU3C,NPU3D)",
        },

        {
          disabled: false,
          tn_fan_unit: "TN fan unit avalible (FAU1, FAU2, FAU4)",
        },

        {
          disabled: false,
          mmu_card_type: "MMU Card type/quantity",
        },

        {
          disabled: false,
          weathering_status: "if weathering status",
        },

        {
          disabled: false,
          npu_redundancy: "NPU1C Redundency (Yes or NO)",
        },

        {
          disabled: false,
          dummy_status: "Dummy status (Yes or No) ",
        },

        {
          disabled: false,
          grounding_separate:
            "Dc grounding separate from AC grounding (OK/NOK)",
        },

        {
          disabled: false,
          transmission_equipment:
            "Transmission Equipment installed in power qube (OK/NOK)",
        },

        {
          disabled: false,
          rack_heat_status: "TRM Rack/Heat Exchange status working (OK/NoK)",
        },

        {
          disabled: false,
          extra_material:
            "Extra Material At  site ( CPRI,Antenna,RRU,Radio,TN,MMU,IF cable RF Cable",
        },

        {
          disabled: false,
          bts_grounding: "BTS GROUNDING (OK/NoK)",
        },

        {
          disabled: false,
          bbu_grounding: "BBU GROUNDING (OK/NOK)",
        },

        {
          disabled: false,
          tmr_door_status: "TMR DOOR Status (OK/NOK)",
        },

        {
          disabled: false,
          transmission_grounding: "Transmission Grounding(OK/NoK)",
        },

        {
          disabled: false,
          rru_weather_profiling_status: "RRU weather Profing Status (OK/NoK)",
        },

        {
          disabled: false,
          anteena_weather_profiling_status:
            "Anteena Weather Profing Status(OK/NoK)",
        },

        {
          disabled: false,
          rru_cap_status: "RRU Cap Status (Open/Close) ",
        },

        {
          disabled: false,
          rru_grounding_status: "RRU Grounding Status (OK/NOK)",
        },

        {
          disabled: false,
          odu_grounding_status: "ODU Grounding Status (OK/NoK)",
        },

        {
          disabled: false,
          bts_fan_status: "BTS Indoor & Outdoor Fan Status (Ok/NOK)",
        },

        {
          disabled: false,
          uflp_card_status: "UFLP Card Status (Ok/NOK)",
        },

        {
          disabled: false,
          upeu: "UPEU ",
        },

        {
          disabled: false,
          ueiu: "UEIU (Alarm) (OK/NOK)",
        },

        {
          disabled: false,
          umpt: "UMPT OK/NOK",
        },

        {
          disabled: false,
          ubbp_wbbp: "UBBP D2/ WBBP F2/D2 (OK/NOK)",
        },

        {
          disabled: false,
          gtmu: "GTMU (OK/NOK)",
        },

        {
          disabled: false,
          ubri: "UBRI (OK/NOK)",
        },

        {
          disabled: false,
          ubbp_lbbp: "UBBP-D5/ LBBP-D5 (OK/NOK)",
        },

        {
          disabled: false,
          genset_in_operation: "Genset in operation (Gen On)   OK/NOK",
        },

        {
          disabled: false,
          ac_main_failure: "AC Main Failure  OK/NOK",
        },

        {
          disabled: false,
          rectifier_door_open: "Rectifier Door open (DO) (OK/NOK)",
        },

        {
          disabled: false,
          batteries_high_temp: "Batteries High Temperatrue(outdoor) (OK/NOK)",
        },

        {
          disabled: false,
          room_high_temp: "Room High Temperature (Indoor)",
        },

        {
          disabled: false,
          low_voltage: "Low Voltage (LV) (OK/NOK)",
        },

        {
          disabled: false,
          intruder_alarm: "Intruder Alarm (OK/NOK)",
        },

        {
          disabled: false,
          system_on_batteries: "System On Batteries (SOB) (OK/NOK)",
        },

        {
          disabled: false,
          lvl_lvbd_status: "LVLD and LVBD status (OK/NOK)",
        },

        {
          disabled: false,
          action: "Action",
        },

        {
          disabled: false,
          issue: "Issue",
        },

        {
          disabled: false,
          lb_designed_rsl: "LB / Designed RSL",
        },

        {
          disabled: false,
          current_rsl: "Current RSL",
        },

        {
          disabled: false,
          lb_design_tx: "LB/ Design TX power",
        },

        {
          disabled: false,
          current_tx: "Currnet TX power",
        },

        {
          disabled: false,
          lb_design_frequency: "LB/Design Frequency",
        },

        {
          disabled: false,
          current_frequency: "Current Frequency",
        },

        {
          disabled: false,
          link_protected_unprotected:
            "Link 2+2XPIC / 1+1 Protected/ 1+0 Unprotected",
        },
      ],
    };
  },
};
</script>
<style></style>
