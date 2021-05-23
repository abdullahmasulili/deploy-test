<template>
  <v-row class="pa-10">
    <v-col md="6">
      <v-card class="pa-5" rounded="xl">
        <v-card-title>Form Biodata Reseller</v-card-title>
        <v-form v-model="valid">
          <v-container class="pa-4">
            <v-row>
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  v-model="reseller.username"
                  label="Username"
                  required
                  clearable
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-text-field
                  outlined
                  v-model="reseller.nama"
                  label="Nama"
                  :rules="nameRules"
                  required
                  clearable
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-text-field
                  outlined
                  v-model="reseller.alamat"
                  :rules="addressRules"
                  label="Alamat"
                  required
                  clearable
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-autocomplete
                  outlined
                  v-model="reseller.kota"
                  :items="kota"
                  item-text="kota"
                  label="Kota/Kabupaten"
                  required
                ></v-autocomplete>
              </v-col>

              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  v-model="reseller.telepon"
                  label="Telepon"
                  :counter="12"
                  required
                  clearable
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <v-select
                  outlined
                  :items="status"
                  v-model="reseller.status"
                  label="Status"
                  required
                ></v-select>
              </v-col>
            </v-row>
          </v-container>
        </v-form>
      </v-card>
    </v-col>

    <!-- form link online shop reseller -->
    <v-col md="6">
      <v-card class="pa-5" rounded="xl">
        <v-card-title>Form Link Reseller</v-card-title>
        <v-form v-model="valid">
          <v-container class="pa-4">
            <v-row>
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  v-model="reseller.url_tokopedia"
                  label="Link Tokopedia"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  v-model="reseller.url_bukalapak"
                  label="Link Bukalapak"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  v-model="reseller.url_lazada"
                  label="Link Lazada"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  v-model="reseller.url_shopee"
                  label="Link Shopee"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  v-model="reseller.url_facebook"
                  label="Link Facebook"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  v-model="reseller.url_instagram"
                  label="Link Instagram"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  v-model="reseller.url_tiktok"
                  label="Link TikTok"
                ></v-text-field>
              </v-col>
            </v-row>
          </v-container>
        </v-form>
      </v-card>
      <v-card class="mt-10 pa-5" rounded="xl">
        <v-card-title class="justify-center">Actions</v-card-title>
        <v-form>
          <v-card-actions>
            <v-col>
              <v-btn rounded block color="primary" @click="postData"
                >simpan
                <v-icon right>mdi-content-save</v-icon>
              </v-btn>
              <v-btn
                rounded
                block
                class="mt-5"
                color="green accent-1"
                @click="resetForm"
                >Reset <v-icon right>mdi-reload</v-icon></v-btn
              >
            </v-col>
          </v-card-actions>
        </v-form>
      </v-card>
    </v-col>
    <v-snackbar v-model="snackbar" timeout="2000"
      absolute
      color="light-green darken-3"
      dark
      shaped
      centered>
      {{ text }}

      <template v-slot:action="{ attrs }">
        <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">
          Close
        </v-btn>
      </template>
    </v-snackbar>
  </v-row>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      text: "",
      snackbar: false,
      valid: false,
      status: ["Aktif", "Tidak Aktif"],
      kota: [],
      reseller: {
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
      nameRules: [
        (v) => !!v || "Nama diperlukan",
        (v) => v.length >= 5 || "Nama harus memiliki setidaknya 5 karakter",
      ],
      addressRules: [
        (v) => !!v || "Alamat diperlukan",
        (v) => v.length >= 5 || "Alamat harus memiliki setidaknya 5 karakter",
      ],
      phoneRules: [
        (v) => !!v || "Nomor Telepon diperlukan",
        (v) =>
          v.length <= 12 || "Nomor telepon tidak boleh lebih dari 12 karakter",
      ],
    };
  },
  methods: {
    async getCities() {
      await axios
        .get("http://192.168.137.1:8000/api/kota")
        .then((response) => {
          this.kota = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    postData() {
      var self = this;
      axios
        .post("http://192.168.137.1:8000/api/reseller", {
          username: this.reseller.username,
          nama: this.reseller.nama,
          alamat: this.reseller.alamat,
          kota: this.reseller.kota,
          telepon: this.reseller.telepon,
          status: this.reseller.status,
          url_tokopedia: this.reseller.url_tokopedia,
          url_bukalapak: this.reseller.url_bukalapak,
          url_lazada: this.reseller.url_lazada,
          url_shopee: this.reseller.url_shopee,
          url_facebook: this.reseller.url_facebook,
          url_instagram: this.reseller.url_instagram,
          url_tiktok: this.reseller.url_tiktok,
        })
        .then((response) => {
          self.text = `Successfully added data, HTTP request code ${response.status}`;
          console.log(response);
        })
        .catch(function (error) {
          if (error.response) {
            self.text = `Failed. ${error.response.data.message}`;
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
          }
        });
      this.snackbar = true;
    },
    resetForm() {
      this.reseller.usernmae = "";
      this.reseller.nama = "";
      this.reseller.alamat = "";
      this.reseller.kota = "";
      this.reseller.telepon = "";
      this.reseller.status = "";
      this.reseller.url_tokopedia = "";
      this.reseller.url_bukalapak = "";
      this.reseller.url_lazada = "";
      this.reseller.url_shopee = "";
      this.reseller.url_facebook = "";
      this.reseller.url_instagram = "";
      this.reseller.url_tiktok = "";
    },
  },
  created() {
    this.getCities();
  },
};
</script>