<template>
  <div class="edit container">
    <Alert v-if="alert" v-bind:message="alert" class="mt-2"/>
    <div class="card mt-2">
      <div class="card-header bg-light">Edit Customer</div>
      <div class="card-body">
        <form v-on:submit="updateCustomer">
          <div class="well">
            <h4>Customer Info</h4>
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input
                type="text"
                class="form-control"
                id="firstName"
                placeholder="Enter the first name"
                v-model="customer.name"
              >
            </div>
            <div class="form-group">
              <label for="lastName">Last name</label>
              <input
                type="text"
                class="form-control"
                id="lastName"
                placeholder="Enter the Last Name"
                v-model="customer.surname"
              >
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input
                type="text"
                class="form-control"
                id="address"
                placeholder="Enter the address"
                v-model="customer.address"
              >
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input
                type="text"
                class="form-control"
                id="city"
                placeholder="Enter the City"
                v-model="customer.city"
              >
            </div>
            <div class="form-group">
              <label for="province">Province</label>
              <input
                type="text"
                class="form-control"
                id="province"
                placeholder="Enter the Province"
                v-model="customer.province"
              >
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input
                type="text"
                class="form-control"
                id="phone"
                placeholder="Enter the Phone Number"
                v-model="customer.phone"
              >
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Enter the Email"
                v-model="customer.email"
              >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Alert from "./Alert";
export default {
  name: "edit",
  data() {
    return {
      customer: {},
      alert: ""
    };
  },
  methods: {
    fetchCustomer(id) {
      this.$http
        .get(
          "http://localhost/HTML-CSS-JavaScript/CustomerApp/public/index.php/api/customer/" +
            id
        )
        .then(function(response) {
          this.customer = JSON.parse(JSON.stringify(response.body));
        });
    },
    updateCustomer(e) {
      if (
        !this.customer.name ||
        !this.customer.surname ||
        !this.customer.email
      ) {
        this.alert = "Please, fill in all required fields!";
      } else {
        let updateCustomer = {
          name: this.customer.name,
          surname: this.customer.surname,
          address: this.customer.address,
          phone: this.customer.phone,
          email: this.customer.email,
          probince: this.customer.province,
          city: this.customer.city
        };

        this.$http
          .put(
            "http://localhost/HTML-CSS-JavaScript/CustomerApp/public/index.php/api/customer/update/" +
              this.$route.params.id,
            updateCustomer
          )
          .then(function(response) {
            this.$router.push({
              path: "/",
              query: { alert: "Customer Updated" }
            });
          });
        e.preventDefault();
      }
      e.preventDefault();
    }
  },
  created: function() {
    this.fetchCustomer(this.$route.params.id);
  },
  components: {
    Alert
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
