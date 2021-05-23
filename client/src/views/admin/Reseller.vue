<template>
  <v-row class="flex-column pa-10">
    <v-card class="pa-10" rounded="xl">
      <v-card-title>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="resellers"
        :search="search"
        @click:row="openDialog"
      >
        <template v-slot:item.status="{ item }">
          <v-chip :color="getColor(item.status)" dark small>
            {{ item.status }}
          </v-chip>
        </template>
      </v-data-table>
    </v-card>
    <v-dialog v-model="dialog" persistent max-width="800px">
      <v-card>
        <v-card-title>
          <span class="headline">Reseller Detail</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" class="d-flex justify-center">
                <v-card-subtitle class="blue--text"
                  >Biodata Reseller</v-card-subtitle
                >
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field
                  v-model="val.username"
                  label="Username"
                  required
                  disabled
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field
                  v-model="val.nama"
                  label="Nama*"
                  required
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field
                  label="Alamat*"
                  v-model="val.alamat"
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-autocomplete
                  :items="sel_item"
                  item-text="kota"
                  item-value="kota"
                  return-object
                  label="Kota*"
                  v-model="val.kota"
                  required
                ></v-autocomplete>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field
                  label="Telepon*"
                  v-model="val.telepon"
                  required
                ></v-text-field>
              </v-col>
              <v-col cols="6">
                <v-select
                  :items="sel_status"
                  v-model="val.status"
                  label="Status*"
                  required
                ></v-select>
              </v-col>
              <v-col cols="12" class="d-flex justify-center">
                <v-card-subtitle class="blue--text"
                  >Link Reseller</v-card-subtitle
                >
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="val.url_tokopedia"
                  label="Link Tokopedia"
                  clearable
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="val.url_bukalapak"
                  label="Link Bukalapak"
                  clearable
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="val.url_lazada"
                  label="Link Lazada"
                  clearable
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="val.url_shopee"
                  label="Link Shopee"
                  clearable
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="val.url_facebook"
                  label="Link Facebook"
                  clearable
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="val.url_instagram"
                  label="Link Instagram"
                  clearable
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="val.url_tokopedia"
                  label="Link Tokopedia"
                  clearable
                ></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <small>*Wajib Diisi</small>
        </v-card-text>
        <v-card-actions>
          <v-col cols="4">
            <v-btn
              color="blue-grey darken-1"
              block
              rounded
              dark
              @click="closeDialog"
            >
              Close
              <v-icon right> mdi-close </v-icon>
            </v-btn>
          </v-col>
          <v-col cols="4">
            <v-btn
              color="deep-orange darken-1"
              block
              rounded
              dark
              @click="deleteData"
            >
              Delete
              <v-icon right> mdi-trash-can </v-icon>
            </v-btn>
          </v-col>
          <v-col cols="4">
            <v-btn
              color="light-blue lighten-3"
              block
              rounded
              @click="updateData"
            >
              Save <v-icon right> mdi-content-save </v-icon>
            </v-btn>
          </v-col>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
import axios from "axios";
export default {
  name: "reseller",
  data() {
    return {
      snackbar_txt: "",
      dialog: false,
      search: "",
      headers: [
        {
          text: "Nama",
          align: "start",
          filterable: false,
          value: "nama",
        },
        { text: "Kota", value: "kota" },
        { text: "Telepon", value: "telepon" },
        { text: "Alamat", value: "alamat" },
        { text: "Status", value: "status" },
      ],
      resellers: [],
      val: {
        id: "",
        username: "",
        nama: "",
        alamat: "",
        kota: "",
        telepon: "",
        status: "",
        url_tokopedia: "",
        url_bukalapak: "",
        url_lazada: "",
        url_shopee: "",
        url_facebook: "",
        url_instagram: "",
        url_tiktok: "",
      },
      sel_item: [],
      sel_status: ["Aktif", "Tidak Aktif"],
    };
  },
  methods: {
    getColor(status) {
      for (let i = 0; i <= this.resellers.length; i++) {
        if (status == "Aktif") {
          return "green accent-4";
        }
        return "red";
      }
    },
    async getCities() {
      await axios
        .get("http://192.168.137.1:8000/api/kota")
        .then((response) => {
          this.sel_item = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    async getAllMember() {
      await axios
        .get("http://192.168.137.1:8000/api/reseller")
        .then((response) => {
          this.resellers = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    async updateData() {
      await axios
        .put(`http://192.168.137.1:8000/api/reseller/${this.val.id}`, {
          nama: this.val.nama,
          alamat: this.val.alamat,
          kota: this.val.kota,
          telepon: this.val.telepon,
          status: this.val.status,
          url_tokopedia: this.val.url_tokopedia,
          url_bukalapak: this.val.url_bukalapak,
          url_lazada: this.val.url_lazada,
          url_shopee: this.val.url_shopee,
          url_facebook: this.val.url_facebook,
          url_instagram: this.val.url_instagram,
          url_tiktok: this.val.url_tiktok,
        })
        .then((response) => {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
      this.dialog = false;
      console.log("Data Has Been Updated");
      location.reload();
    },
    async deleteData() {
      await axios
        .delete(`http://192.168.137.1:8000/api/reseller/${this.val.id}`)
        .then((response) => {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
      this.dialog = false;
      location.reload();
    },
    openDialog(value) {
      this.val.id = value.id;
      this.val.username = value.username;
      this.val.nama = value.nama;
      this.val.alamat = value.alamat;
      this.val.kota = value.kota;
      this.val.telepon = value.telepon;
      this.val.status = value.status;
      this.val.url_tokopedia = value.url_tokopedia;
      this.val.url_bukalapak = value.url_bukalapak;
      this.val.url_lazada = value.url_lazada;
      this.val.url_shopee = value.url_shopee;
      this.val.url_facebook = value.url_facebook;
      this.val.url_instagram = value.url_instagram;
      this.val.url_tiktok = value.url_tiktok;
      this.dialog = true;
      console.log("Dialog Opened");
      console.log(this.val);
    },
    closeDialog() {
      let data = this.val;
      console.log(data);
      this.dialog = false;
    },
  },
  created: function () {
    this.getAllMember();
    this.getCities();
  },
};
</script>