import Vue from "vue";
import Router from "vue-router";
import AppHeader from "./layout/AppHeader";
import AppFooter from "./layout/AppFooter";
import Components from "./views/Components.vue";
import DashboardLayout from "@/layout/DashboardLayout";
import Login from "./views/Login.vue";
import Profile from "./views/Profile.vue";
import Dashboard from "./views/Dashboard.vue";

import Sites from "./views/Sites.vue";
import Entries from "./views/Entries.vue";
import Users from "./views/Users.vue";
import CommonView from "./views/CommonView.vue";

Vue.use(Router);

export default new Router({
  mode: "history",
  linkExactActiveClass: "active",
  routes: [
    {
      path: "/",
      redirect: "dashboard",
      component: DashboardLayout,
      meta : {
        requiresAuth : true
      },
      children: [
        {
          path: "/",
          name: "components",
          components: {
            header: AppHeader,
            default: Entries,
            footer: AppFooter,
          },
        },
        {
          path: "/entries",
          name: "components",
          components: {
            header: AppHeader,
            default: Entries,
            footer: AppFooter,
          },
        },
        {
          path: "/users",
          name: "components",
          components: {
            header: AppHeader,
            default: Users,
            footer: AppFooter,
          },
        },
        {
          path: "/sites",
          name: "components",
          components: {
            header: AppHeader,
            default: Sites,
            footer: AppFooter,
          },
        },
        {
          path: "/categories",
          name: "components",
          meta: {
            apiRoute: 'api/city',
            title: 'Categories'
          },
          components: {
            header: AppHeader,
            default: CommonView,
            footer: AppFooter,
          },
        },
        {
          path: "/cities",
          name: "components",
          meta: {
            apiRoute: 'api/city',
            title: 'Cities'
          },
          components: {
            header: AppHeader,
            default: CommonView,
            footer: AppFooter,
          },
        },
        {
          path: "/mbu",
          name: "components",
          meta: {
            apiRoute: 'api/mbu',
            title: 'MBUs'
          },
          components: {
            header: AppHeader,
            default: CommonView,
            footer: AppFooter,
          },
        },
        {
          path: "/network-types",
          name: "components",
          meta: {
            apiRoute: 'api/network-type',
            title: 'Network Types'
          },
          components: {
            header: AppHeader,
            default: CommonView,
            footer: AppFooter,
          },
        },
        {
          path: "/regions",
          name: "components",
          meta: {
            apiRoute: 'api/region',
            title: 'Regions'
          },
          components: {
            header: AppHeader,
            default: CommonView,
            footer: AppFooter,
          },
        },
        {
          path: "/sharing-sites",
          name: "components",
          meta: {
            apiRoute: 'api/sharing-site',
            title: 'Sharing Sites'
          },
          components: {
            header: AppHeader,
            default: CommonView,
            footer: AppFooter,
          },
        },
        {
          path: "/site-types",
          name: "components",
          meta: {
            apiRoute: 'api/site-type',
            title: 'Site Types'
          },
          components: {
            header: AppHeader,
            default: CommonView,
            footer: AppFooter,
          },
        },
        {
          path: "/types",
          name: "components",
          meta: {
            apiRoute: 'api/type',
            title: 'Types'
          },
          components: {
            header: AppHeader,
            default: CommonView,
            footer: AppFooter,
          },
        },
        {
          path: "/profile",
          name: "profile",
          component: () =>
            import(/* webpackChunkName: "demo" */ "./views/UserProfile.vue"),
        },
        {
          path: "/maps",
          name: "maps",
          component: () =>
            import(/* webpackChunkName: "demo" */ "./views/Maps.vue"),
        },
        {
          path: "/tables",
          name: "tables",
          component: () =>
            import(/* webpackChunkName: "demo" */ "./views/Tables.vue"),
        },
      ],
    },

    {
      path: "/login",
      name: "login",
      components: {
        default: Login,
        footer: AppFooter,
      },
    },
    {
      path: "/profile",
      name: "profile",
      components: {
        header: AppHeader,
        default: Profile,
        footer: AppFooter,
      },
    },
  ],
  scrollBehavior: (to) => {
    if (to.hash) {
      return { selector: to.hash };
    } else {
      return { x: 0, y: 0 };
    }
  },
});
