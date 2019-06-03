<template>
  <div class="details container">
    <router-link to="/">
      <button class="btn btn-primary mt-2">Go Back</button>
    </router-link>
    <div class="card mt-2">
      <div class="card-header bg-light">
        <i class="fas fa-info-circle">&nbsp;</i>Customer Details
        <router-link v-bind:to="'/customer/edit/'+customer.ID">
          <button class="btn btn-success btn-sm" style="margin-left:76%;">Edit</button>
        </router-link>
        <button class="btn btn-danger btn-sm" v-on:click="deleteCustomer(customer.ID)">Delete</button>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="card" style="width: 22rem;margin:0 10px">
            <div class="card-header">
              <i class="fas fa-user">&nbsp;</i>Person Details
            </div>
            <div class="card-body">
              <div class="m-2">
                <strong>Name:</strong>
                {{ customer.name }}
              </div>
              <hr>
              <div class="m-2">
                <strong>Last Name:</strong>
                {{ customer.surname }}
              </div>
            </div>
          </div>
          <div class="card" style="width: 22rem;">
            <div class="card-header">
              <i class="fas fa-address-book">&nbsp;</i>Contact Details
            </div>
            <div class="card-body">
              <div class="m-2">
                <strong>
                  <i class="fas fa-envelope">&nbsp;</i>Email:
                </strong>
                {{ customer.email }}
              </div>
              <hr>
              <div class="m-2">
                <strong>
                  <i class="fas fa-phone">&nbsp;</i>Phone:
                </strong>
                +258&nbsp;{{ customer.phone }}
              </div>
            </div>
          </div>
          <div class="card" style="width: 22rem; margin:0 10px">
            <div class="card-header">
              <i class="fas fa-map-marker-alt">&nbsp;</i>Location Details
            </div>
            <div class="card-body">
              <div class="m-2">
                <strong>
                  <i class="fas fa-city">&nbsp;</i>Province:
                </strong>
                {{ customer.province }}
              </div>
              <hr>
              <div class="m-2">
                <strong>
                  <i class="fas fa-city">&nbsp;</i>City:
                </strong>
                {{ customer.city }}
              </div>
              <hr>
              <div class="m-2">
                <strong>Block:</strong>
                {{ customer.address }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "customerdetails",
  data() {
    return {
      customer: ""
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
    deleteCustomer(id) {
      this.$http
        .delete(
          "http://localhost/HTML-CSS-JavaScript/CustomerApp/public/index.php/api/customer/delete/" +
            id
        )
        .then(function(response) {
          this.$router.push({
            path: "/",
            query: { alert: "Customer Deleted!" }
          });
        });
    }
  },
  created: function() {
    this.fetchCustomer(this.$route.params.id);
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
