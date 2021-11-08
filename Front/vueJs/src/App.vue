<template>
  <div id="app">
    <div class="ui fixed inverted menu vue-color">
      <div class="ui container">
        <a href="#" class="header item">Coding Challenge </a>
      </div>
    </div>

    <div class="ui main container">
      <MyForm :form="form" @onFormSubmit="onFormSubmit" />
      <Loader v-if="loader" />
      <ProductList
        :products="products"
        :categories="categories"
        @onDelete="onDelete"
        @onEdit="onEdit"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import MyForm from "./components/MyForm";
import ProductList from "./components/ProductList";
import Loader from "./components/Loader";

export default {
  name: "App",
  components: {
    MyForm,
    ProductList,
    Loader,
  },
  data() {
    return {
      url: "https://fakestoreapi.com",
      products: [],
      form: { name: "", price: "", description: "", image: "" },
      loader: false,
    };
  },
  methods: {
    getProducts() {
      this.loader = true;

      axios.get(this.url + "/products").then((data) => {
        this.products = data.data;
        this.loader = false;
      });
    },
    deleteProduct(id) {
      this.loader = true;

      axios
        .delete(`${this.url}/${id}`)
        .then(() => {
          this.getProducts();
        })
        .catch((e) => {
          alert(e);
        });
    },
    createProduct(data) {
      this.loader = true;

      axios
        .post(this.url, {
          name: data.name,
          // image: data.image,
          price: data.price,
          description: data.description,
        })
        .then(() => {
          this.getProducts();
        })
        .catch((e) => {
          alert(e);
        });
    },
    onDelete(id) {
      this.deleteProduct(id);
    },
    onFormSubmit(data) {
      this.createProduct(data);
    },
  },
  created() {
    this.getProducts();
  },
};
</script>

<style>
.vue-color {
  background: #41b883 !important;
}

.main.container {
  margin-top: 60px;
}

.submit-button {
  margin-top: 24px !important;
  float: right;
}

.data {
  margin-top: 15px;
}

thead tr th {
  background: #e0e0e0 !important;
}

.ui.inverted.dimmer {
  background-color: rgba(255, 255, 255, 0) !important;
}
</style>
