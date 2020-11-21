<template>
  <div class="card shadow" :class="type === 'dark' ? 'bg-default' : ''">
    <div
      class="card-header border-0"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0" :class="type === 'dark' ? 'text-white' : ''">
            {{ title }}
          </h3>
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
            {{ row.latitude }}
          </td>

          <td class="budget">
            {{ row.longitude }}
          </td>

          <td class="budget">
            {{ row.networkType }}
          </td>


        </template>
      </base-table>
    </div>

    <div
      class="card-footer d-flex justify-content-end"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <base-pagination :pageCount="pagination.to" :value="pagination.current" @input="changePage"></base-pagination>
    </div>


  </div>
</template>
<script>


import Resource from "@/api/resource";  
const siteResource = new Resource("api/site");



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
    changePage(page){

      this.getList({ pagination: true, page: page});

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
      pagination: {},
      items: [],
      columns: [
        "Site Code",
        "BSC Name",
        "Site Name",
        "Sharing Site",
        "Sharing Site ID",
        "Category",
        "No. Of Cells",
        "Vendor",
        "City Name",
        "Site Type",
        "Type",
        "Region",
        "MBU",
        "Latitude",
        "Longitude",
        "2G/3G",
      ],

    };
  },
};
</script>
<style></style>
