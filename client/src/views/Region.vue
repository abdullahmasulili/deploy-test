<template>
  <v-row
    class="fill-height flex-column light-blue lighten-3 justify-center align-center"
  >
    <v-card width="1500" class="pa-5" rounded="xl">
      <v-card-title>
        <v-btn depressed color="accent" class="mr-5">
          <v-icon left>mdi-arrow-left</v-icon>
          back
        </v-btn>
        <v-divider vertical></v-divider>
        <v-text-field
          class="ml-5"
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
        ></v-text-field>
      </v-card-title>
      <v-card
        flat
        class="my-3 blue-grey lighten-5"
        rounded="xl"
        v-for="item in member"
        :key="item.username"
      >
        <v-row class="pa-3 my-3 mx-0 border">
          <v-col cols="12" md="3">
            <p>Nama</p>
            <p>{{ item.nama }}</p>
          </v-col>
          <v-col cols="12" md="3">
            <p>Alamat</p>
            <p>{{ item.alamat }}</p>
          </v-col>
          <v-col cols="12" md="3">
            <p>Kota</p>
            <p>{{ item.kota }}</p>
          </v-col>
          <v-col cols="12" md="3">
            <p>Link Website</p>
            <a :href="item.username">
              <p>
                {{ item.username }}
              </p>
            </a>
          </v-col>
        </v-row>
      </v-card>
    </v-card>
  </v-row>
</template>

<style>
.border {
  border-left: 4px solid #64ffda;
}
</style>

<script>
import axios from "axios";
export default {
  data() {
    return {
      search: "",
      headers: [
        {
          text: "Nama Member",
          align: "start",
          sortable: false,
          value: "nama",
        },
        { text: "Alamat", value: "alamat" },
        { text: "Kota", value: "kota" },
        { text: "Link Website", value: "username" },
      ],
      member: [],
    };
  },
  methods: {
    async getAllMember() {
      await axios
        .get("http://192.168.137.1:8000/api/reseller")
        .then((response) => {
          this.member = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
        for(let i = 0; i < this.member.length; i++){
            this.member[i].username = `http://192.168.0.130:8082/member?username=${this.member[i].username}`
        }
    },
  },
  created() {
    this.getAllMember();
  },
};
</script>