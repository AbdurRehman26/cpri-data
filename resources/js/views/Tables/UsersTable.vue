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
            {{ row.name }}
          </td>

          <td class="budget">
            {{ row.email }}
          </td>


        </template>
      </base-table>
    </div>

    <div
      class="card-footer d-flex justify-content-end"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <!-- <base-pagination :pageCount="pagination.to" :value="pagination.current" @input="changePage"></base-pagination> -->
    </div>


  </div>
</template>
<script>


import Resource from "@/api/resource";  
const siteResource = new Resource("api/users");



export default {
  name: "projects-table",
  props: {
    type: {
      type: String,
    },
    title: String,
  },

  mounted() {
    this.getList({ pagination: false });
  },

  methods: {
    changePage(page){

      this.getList({ pagination: false, page: page});

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
        "Site Name",
        "Email",
      ],

    };
  },
};
</script>
<style></style>
