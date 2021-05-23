<template>
  <nav>
    <v-app-bar flat color="white">
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>
        <span>Kedas Beauty</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn text class="mx-1" color="deep-orange darken-2">
          logout
        <v-icon right>mdi-logout</v-icon>
      </v-btn>
    </v-app-bar>
    <v-navigation-drawer v-model="drawer" app>
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="text-center"
            >Authenticated User</v-list-item-title
          >
        </v-list-item-content>
      </v-list-item>
      <v-divider></v-divider>
      <v-list rounded dense class="mt-5">
        <v-list-item-group v-model="selectedItem">
            <v-list-item v-for="(link, i) in links" :key="i" router :to="link.route" active-class="light-blue darken-2 white--text">
                <v-list-item-icon>
                    <v-icon v-text="link.icon"></v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title v-text="link.title"></v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      selectedItem: 1,
      drawer: true,
      links: [
        {
          title: "Dashboard",
          icon: "mdi-view-dashboard",
          route: "/dashboard/main",
        },
        {
          title: "Daftar Reseller",
          icon: "mdi-view-list",
          route: "/dashboard/reseller-list",
        },
        {
          title: "Tambah Data Reseller",
          icon: "mdi-database-plus",
          route: "/dashboard/add-reseller",
        },
      ],
    };
  },
};
</script>