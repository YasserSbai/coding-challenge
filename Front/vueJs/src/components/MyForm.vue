<template>
  <div class="my-form">
    <form class="ui form">
      <div class="fields">
        <div class="four wide field">
          <label>Product Name</label>
          <input
            type="text"
            name="name"
            placeholder="Product Name"
            @change="handleChange"
            :value="form.name"
          />
        </div>

        <div class="four wide field">
          <label>description</label>
          <textarea
            name="description"
            placeholder="Product Description"
            @change="handleChange"
            :value="form.description"
          />
        </div>

        <div class="six wide field">
          <label>Price</label>
          <input
            type="number"
            name="price"
            placeholder="0.00"
            @change="handleChange"
            :value="form.price"
          />
        </div>

        <div class="two wide field">
          <button :class="btnClass" @click="onFormSubmit">
            {{ btnName }}
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "MyForm",
  data() {
    return {
      btnName: "Save",
      btnClass: "ui primary button submit-button",
    };
  },
  props: {
    form: {
      type: Object,
    },
  },
  methods: {
    handleChange(event) {
      const { name, value } = event.target;
      let form = this.form;
      form[name] = value;
      const categories = [{ id: 1 }, { id: 2 }];
      form[categories] = categories;
      this.form = form;
    },
    onFormSubmit(event) {
      // prevent form submit
      event.preventDefault();

      // form validation
      if (this.formValidation()) {
        // window.console.log("ready to submit");
        this.$emit("onFormSubmit", this.form);

        // change the button to save
        this.btnName = "Save";
        this.btnClass = "ui primary button submit-button";

        // clear form fields
        this.clearFormFields();
      }
    },
    formValidation() {
      // // first name
      // if (document.getElementsByName("first_name")[0].value === "") {
      //   alert("Enter first name");
      //   return false;
      // }

      // // last name
      // if (document.getElementsByName("last_name")[0].value === "") {
      //   alert("Enter last name");
      //   return false;
      // }

      // // email
      // if (document.getElementsByName("email")[0].value === "") {
      //   alert("Enter email");
      //   return false;
      // }

      return true;
    },
    clearFormFields() {
      // clear form data
      this.form.name = "";
      this.form.description = "";
      this.form.price = "";
      // this.form.isEdit = false;

      // clear form fields
      document.querySelector(".form").reset();
    },
  },
};
</script>

<style scoped></style>
