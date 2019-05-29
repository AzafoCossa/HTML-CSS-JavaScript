<template>
  <div class="customers container">
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
            <tr v-for="customer in customers" v-bind:key="customer.id">
              <td>{{customer.name}}</td>
              <td>{{customer.surname}}</td>
              <td>{{customer.email}}</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "customers",
  data() {
    return {
      customers: []
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
    this.fetchCustomers();
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
