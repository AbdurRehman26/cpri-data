<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <side-bar
      :background-color="sidebarBackground"
      short-title="Argon"
      title="Argon"
    >
      <template slot="links">

        <sidebar-item :link="{name: 'Log Entries', icon: 'ni ni-key-25 text-info', path: '/entries'}"/>

        <li class="nav-item"><a href="/export-entries" class="nav-link active router-link-active"><i class="ni ni ni-single-copy-04 text-red"></i> <span class="nav-link-text">Export</span></a></li>

        <sidebar-item v-if="showUsers" :link="{name: 'Users', icon: 'ni ni-single-02 text-success', path: '/users'}"/>

<!--          

        <sidebar-item :link="{name: 'Categories', icon: 'ni ni-archive-2 text-primary', path: '/categories'}"/>
        <sidebar-item :link="{name: 'Cities', icon: 'ni ni-world text-primary', path: '/cities'}"/>
        <sidebar-item :link="{name: 'MBU', icon: 'ni ni ni-fat-delete text-primary', path: '/mbu'}"/>
        <sidebar-item :link="{name: 'Network Types', icon: 'ni ni-mobile-button text-primary', path: '/network-types'}"/>
        <sidebar-item :link="{name: 'Regions', icon: 'ni ni-pin-3 text-primary', path: '/regions'}"/>
        <sidebar-item :link="{name: 'Sharing Sites', icon: 'ni ni-single-copy-04 text-primary', path: '/sharing-sites'}"/>
        <sidebar-item :link="{name: 'Site Types', icon: 'ni ni-ungroup text-primary', path: '/site-types'}"/>
        <sidebar-item :link="{name: 'Types', icon: 'ni ni-ui-04 text-primary', path: '/types'}"/>
 -->        
      </template>
    </side-bar>
    <div class="main-content" :data="sidebarBackground">
      <dashboard-navbar></dashboard-navbar>

      <div @click="toggleSidebar">
        <fade-transition :duration="200" origin="center top" mode="out-in">
          <!-- your content here -->
          <router-view></router-view>
        </fade-transition>
        <content-footer v-if="!$route.meta.hideFooter"></content-footer>
      </div>
    </div>
  </div>
</template>
<script>
  import DashboardNavbar from './DashboardNavbar.vue';
  import ContentFooter from './ContentFooter.vue';
  import { FadeTransition } from 'vue2-transitions';

  import {mapGetters} from 'vuex';

  export default {
    components: {
      DashboardNavbar,
      ContentFooter,
      FadeTransition
    },
    data() {
      return {
        sidebarBackground: 'vue' //vue|blue|orange|green|red|primary
      };
    },

    computed : {
      ...mapGetters(['user']),
    
      showUsers (){

        if(this.user && (this.user.email == 'sydabdrehman@gmail.com' || this.user.email == 'tanveer@gmail.com'))
        {return true;}

      }
    },


    methods: {
      toggleSidebar() {
        if (this.$sidebar.showSidebar) {
          this.$sidebar.displaySidebar(false);
        }
      }
    }
  };
</script>
<style lang="scss">
</style>
