<template>
  <div class="customers container">
    <Alert v-if="alert" v-bind:message="alert" class="mt-2"/>
    <div class="card mt-2">
      <div class="card-header bg-light">
        <i class="fas fa-edit"></i> Manage Customers
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Surname</th>
              <th>Email</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="customer in customers" v-bind:key="customer.ID">
              <td>{{customer.name}}</td>
              <td>{{customer.surname}}</td>
              <td>{{customer.email}}</td>
              <td>
                <router-link v-bind:to="'/Customer/'+customer.ID">
                  <button type="button" class="btn btn-secondary">
                    <i class="far fa-eye">&nbsp;</i>View
                  </button>
                </router-link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import Alert from "./Alert";
export default {
  name: "customers",
  data() {
    return {
      customers: [],
      alert: ""
    };
  },
  methods: {
    fetchCustomers() {
      this.$http
        .get(
          "http://localhost/HTML-CSS-JavaScript/CustomerApp/public/index.php/api/customers"
        )
        .then(function(response) {
          this.customers = JSON.parse(JSON.stringify(response.body));
        });
    }
  },
  created: function() {
    if (this.$route.query.alert) {
      this.alert = this.$route.query.alert;
    }
    this.fetchCustomers();
  },
  updated: function() {
    this.fetchCustomers();
  },
  components: {
    Alert
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
