<template>
  <div class="product-list">
    <div class="data">
      <table class="ui celled table">
        <thead>
          <tr>
            <th style="width: 50px; text-align: center;">#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th style="width: 148px;">Action</th>
          </tr>
        </thead>

        <tbody>
          <Product
            v-for="product in products"
            :key="product.id"
            :product="product"
            @onDelete="onDelete"
            @onEdit="onEdit"
          />
        </tbody>
      </table>
    </div>
  </div>
  <!-- <grid :cols="cols" :rows="products"></grid> -->
</template>

<script>
// import { Grid } from "gridjs-vue";
import Product from "./Product.vue";
export default {
  name: "ProductList",
  components: {
    // Grid,
    Product,
  },
  props: {
    products: {
      type: Array,
    },
  },
  methods: {
    onDelete(id) {
      this.$emit("onDelete", id);
    },
    onEdit(data) {
      this.$emit("onEdit", data);
    },
  },
  data() {
    return {
      cols: ["title", "image", "price", "description"],
    };
  },
};
</script>

<style scoped></style>
