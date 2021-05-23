<template>
  <v-app>
    <v-main class="first-section">
      <v-container>
        <header>
          <v-col class="my-10">
            <v-row class="justify-center">
              <v-avatar size="240">
                <v-img
                  src="../assets/logo_kedas.png"
                  placeholder="profil image"
                ></v-img>
              </v-avatar>
            </v-row>
          </v-col>
        </header>
        <section>
          <v-col v-for="member in data_member" :key="member.nama">
            <v-row class="justify-center">
              <h1
                id="member-name"
                class="text-shadow text-center font-weight-bold white--text"
              >
                {{ member.nama }}
              </h1>
            </v-row>
            <v-row class="justify-center">
              <p
                id="member-name"
                class="text-shadow text-center font-weight-bold white--text text-uppercase"
              >
                Reseller Kedas Beauty {{ member.kota }}
              </p>
            </v-row>
            <v-row class="justify-center">
              <p
                id="member-address"
                class="text-shadow text-center font-weight-bold white--text text-uppercase"
              >
                {{ member.alamat }}
              </p>
            </v-row>
          </v-col>
        </section>
        <br />
        <br />
        <section>
          <v-col>
            <v-row class="justify-center">
              <p id="member-address" class="text-shadow white--text">
                Order Geser Kebawah
              </p>
            </v-row>
            <v-row>
              <v-col
                cols="6"
                xl="3"
                sm="6"
                xs="12"
                v-for="p in produk"
                :key="p.id"
              >
                <v-card rounded="xl" class="p-card pt-10" dark>
                  <v-row>
                    <v-col cols="7" lg="5" xl="5">
                      <v-card
                        color="yellow accent-3"
                        light
                        class="rounded-tr-xl"
                      >
                        <v-row justify="center">
                          <v-card-title id="sold-count" class="font-weight-bold"
                            >Terjual 10K</v-card-title
                          >
                        </v-row>
                      </v-card>
                    </v-col>
                  </v-row>
                  <v-img
                    :src="p.foto_produk"
                    contain
                    min-height="50"
                    max-height="175"
                    class="mt-10"
                  ></v-img>
                  <v-card-title>
                    <v-row class="justify-center">
                      <v-card-title
                        class="text-body-1 text-center text-md-h4 text-xl-h5"
                      >
                        {{ p.nama_produk }}
                      </v-card-title>
                    </v-row>
                  </v-card-title>
                  <v-card-subtitle class="text-center text-lg-h5 text-xl-h5">{{
                    p.deskripsi_produk
                  }}</v-card-subtitle>
                </v-card>
              </v-col>
            </v-row>
          </v-col>
        </section>

        <!-- section for ordering -->
        <section class="flex mt-10">
          <v-row justify="center">
            <p id="member-address">Order Produk Kedas Beauty</p>
          </v-row>
          <v-row justify="center mb-5">
            <p id="member-address">Hubungi:</p>
          </v-row>
          <!-- container for links -->
          <v-container>
            <v-row class="justify-center">
              <v-col cols="12" sm="12" md="12" lg="10" xl="10" v-for="link in links" :key="link.i">
                <v-row>
                  <!-- whatsapp link -->
                  <v-col
                    class=""
                    align="center"
                    cols="6"
                    sm="4"
                    md="4"
                    lg="4"
                    xl="4"
                  >
                    <a :href="link.whatsapp">
                      <v-img
                        src="../assets/links/whatsapp.svg"
                        width="200"
                      ></v-img>
                    </a>
                  </v-col>
                  <!-- bukalapak link -->
                  <v-col
                    class=""
                    align="center"
                    cols="6"
                    sm="4"
                    md="4"
                    lg="4"
                    xl="4"
                  >
                    <a :href="link.bukalapak">
                      <v-img
                        src="../assets/links/bukalapak.svg"
                        width="200"
                      ></v-img>
                    </a>
                  </v-col>
                  <!-- facebook link -->
                  <v-col
                    class=""
                    align="center"
                    cols="6"
                    sm="4"
                    md="4"
                    lg="4"
                    xl="4"
                  >
                    <a :href="link.facebook">
                      <v-img
                        src="../assets/links/facebook.svg"
                        width="200"
                      ></v-img>
                    </a>
                  </v-col>
                  <!-- shopee link -->
                  <v-col
                    class=""
                    align="center"
                    cols="6"
                    sm="4"
                    md="4"
                    lg="4"
                    xl="4"
                  >
                    <a :href="link.shopee">
                      <v-img
                        src="../assets/links/shopee.svg"
                        width="200"
                      ></v-img>
                    </a>
                  </v-col>
                  <!-- lazada link -->
                  <v-col
                    class=""
                    align="center"
                    cols="6"
                    sm="4"
                    md="4"
                    lg="4"
                    xl="4"
                  >
                    <a :href="link.lazada">
                      <v-img
                        src="../assets/links/lazada.svg"
                        width="200"
                      ></v-img>
                    </a>
                  </v-col>
                  <!-- tiktok link -->
                  <v-col
                    class=""
                    align="center"
                    cols="6"
                    sm="4"
                    md="4"
                    lg="4"
                    xl="4"
                  >
                    <a :href="link.tiktok">
                      <v-img
                        src="../assets/links/tiktok.svg"
                        width="200"
                      ></v-img>
                    </a>
                  </v-col>
                  <v-col
                    class=""
                    align="center"
                    cols="6"
                    sm="4"
                    md="4"
                    lg="4"
                    xl="4"
                  >
                    <a :href="link.tokopedia">
                      <v-img
                        src="../assets/links/tokopedia.svg"
                        width="200"
                      ></v-img>
                    </a>
                  </v-col>
                  <v-col
                    class=""
                    align="center"
                    cols="6"
                    sm="4"
                    md="4"
                    lg="4"
                    xl="4"
                  >
                    <a :href="link.instagram">
                      <v-img
                        src="../assets/links/instagram.svg"
                        width="200"
                      ></v-img>
                    </a>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-container>
        </section>
      </v-container>
    </v-main>
    <section class="page-footer">
      <v-row class="flex justify-end">
        <v-col cols="6" lg="4" xl="4">
          <v-img
            src="../assets/logo_bpom_halal.svg"
            placeholder="bpom_halal"
          ></v-img>
        </v-col>
      </v-row>
    </section>
    <!-- last section -->
    <v-footer padless dark style="background-color: #0a294d">
      <v-col class="text-center" cols="12">
        {{ new Date().getFullYear() }} —
        <strong>PT. MAHAPURNA MANDIRI UTAMA</strong>
      </v-col>
    </v-footer>
  </v-app>
</template>

<style>
.first-section {
  background-image: url("../assets/top_bg.png");
  background-repeat: no-repeat;
  background-size: cover;
}

.p-card {
  background-image: linear-gradient(#70d8f1, #ae97e2);
}

a {
  text-decoration: none;
}

.page-footer {
  background-image: url("../assets/footer.png");
  background-repeat: no-repeat;
  background-size: cover;
}

.text-shadow {
  text-shadow: 0px 2px 10px rgba(0, 0, 0, 0.54);
}

#member-name {
  font-size: 25px;
}
#member-address {
  font-size: 15px;
}
#sold-count {
  font-size: 13px;
}

@media screen and (min-width: 320px) {
  #member-name {
    font-size: calc(25px + 5 * ((100vw - 320px) / 680));
  }

  #member-address {
    font-size: calc(15px + 5 * ((100vw - 320px) / 680));
  }

  #sold-count {
    font-size: calc(13px + 0.5 * ((100vw - 320px) / 680));
  }
}
@media screen and (min-width: 1000px) {
  #member-name {
    font-size: 50px;
  }
  #member-address {
    font-size: 24px;
  }
  #sold-count {
    font-size: 25px;
  }
}
</style>

<script>
import axios from "axios";
export default {
  name: "",
  data() {
    return {
      param: "",
      data_member: [],
      produk: [
        {
          id: 1,
          nama_produk: "Body Serum",
          deskripsi_produk: "Memutikan Kulit Badan",
          foto_produk: require("@/assets/body_serum.svg"),
          best_seller: false,
        },
        {
          id: 2,
          nama_produk: "Brightening Soap",
          deskripsi_produk: "Sabun Pemutih Wajah + Badan",
          foto_produk: require("@/assets/brightening_soap.svg"),
          best_seller: false,
        },
        {
          id: 3,
          nama_produk: "Body Serum",
          deskripsi_produk: "Memutikan Kulit Badan",
          foto_produk: require("@/assets/gold_jelly.svg"),
          best_seller: false,
        },
        {
          id: 4,
          nama_produk: "Body Serum",
          deskripsi_produk: "Memutikan Kulit Badan",
          foto_produk: require("@/assets/exfoliating_gel.svg"),
          best_seller: false,
        },
      ],
      links: [
        {
          tokopedia: '',
          bukalapak: '',
          lazada: '',
          shopee: '',
          facebook: '',
          whatsapp: '',
          instagram: '',
          tiktok: '',
      }
      ], 
    };
  },
  computed: {},
  methods: {
    getMemberData() {
      axios
        .get(`http://192.168.137.1:8000/api/reseller/search/${this.param}`)
        .then((response) => {
          this.data_member = response.data;
          this.links[0].tokopedia = `https://${response.data[0].url_tokopedia}`
          this.links[0].bukalapak = `https://${response.data[0].url_bukalapak}`
          this.links[0].lazada = `https://${response.data[0].url_lazada}`
          this.links[0].shopee = `https://${response.data[0].url_shopee}`
          this.links[0].facebook = `https://${response.data[0].url_facebook}`
          this.links[0].whatsapp = `https://wa.me/${response.data[0].telepon}`
          this.links[0].instagram = `https://${response.data[0].url_instagram}`
          this.links[0].tiktok = `https://${response.data[0].url_tiktok}`
        });
          console.log(this.data_member);
    }
  },
  mounted() {},
  created: function () {
    this.param = this.$route.query.username;
    //console.log(this.param);
    this.getMemberData();
    
  },
};
</script>