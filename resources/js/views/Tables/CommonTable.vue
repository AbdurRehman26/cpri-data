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



        </template>
      </base-table>
    </div>

    <div
      class="card-footer d-flex justify-content-end"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <base-pagination :pageCount="pagination.pages" :value="pagination.current" @input="changePage"></base-pagination>
    </div>


  </div>
</template>
<script>


import Resource from "@/api/resource";  


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

      const siteResource = new Resource(this.$route.meta.apiRoute);

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
      pagination: {
        to: 0,
        current: 0
      },
      items: [],
      columns: [
        "Name",
      ],

    };
  },

  watch: {
    $route(routeValue){

      this.getList({ pagination: true });

    }
  }
};
</script>
<style></style>
