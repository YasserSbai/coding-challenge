<template>
  <tr>
    <td>{{ product.id }}</td>
    <td><img :src="product.image" width="25" alt="Product Image" /></td>
    <td>{{ product.name }}</td>
    <td>{{ product.price }}</td>
    <td>{{ product.description }}</td>
    <td>
      <button class="mini ui red button" @click="onDelete">Delete</button>
    </td>
  </tr>
</template>

<script>
export default {
  name: "Product",
  props: {
    product: {
      type: Object,
    },
  },
  methods: {
    onDelete() {
      this.$emit("onDelete", this.product.id);
    },
  },
};
</script>

<style scoped></style>
