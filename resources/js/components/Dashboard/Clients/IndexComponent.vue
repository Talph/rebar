<script>
export default {
  props: ['auth'],
  data() {
    return {
      form: {
        'name': '',
        'description': '',
      },
      categories: {},
      messages: '',
      savingDone: false,
      loading: true
    }
  },
  mounted() {
    this.loadClients();
  },
  methods: {
    loadClients() {
      axios.get('/api/clients')
          .then(response => {
            this.clients = response.data.data;
          })
          .catch(error => {
            console.log(error.message)
            this.messages = error.message
          });
      this.loading = false;
    },
    submit() {
      let self = this;
      axios.post('/api/clients', this.form)
          .then(response => {
            self.messages = response.data.data;
            this.loadClients();
          }).catch(error => {
        self.messages = error;
        console.log(error)
      });
    },
    deletePost(id) {
      let self = this;
      axios.delete('/api/clients/' + id)
          .then(response => {
            self.messages = response.data.data;
            this.loadClients();
          })
          .catch(error => self.messages = error
          );
      this.loading = false;
    },
  }
}
</script>

<template>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Clients </h1>
      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
          <form @submit.prevent="submit" method="POST">
            <div class="card">
              <div class="card-header">
                Create client
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label>Category Name</label>
                  <input class="form-control" type="text" id="J_name" placeholder="Category Name"
                         v-model="form.name" required autofocus>
                  <small>The name is how it appears on your site.</small>
                </div>
                <div class="form-group row">
                  <label>Description</label>
                  <textarea class="form-control" id="summernote" v-model="form.description" rows="9"
                            required> </textarea>
                  <small>The description is not prominent by default; however, some themes may show
                    it.</small>
                </div>
                <button class="btn btn-block btn-success" type="submit">Save Category</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
          <div class="card">
            <div class="card-header">
              Clients
            </div>
            <div class="card-body">
              <br>
              <table class="table table-responsive-sm table-bordered table-hover" id="dataTable"
                     width="100%"
                     cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Description</th>
                  <th>Post count</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(client, index) in clients" :key="index">
                  <td>{{ client.name }}</td>
                  <td>{{ client.description }}</td>
                  <td>
                    {{ client.numberOfPosts }}
                  </td>
                  <td>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button"
                         id="dropdownMenuLinkRevenue"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                         aria-label="Revenue action button">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                           aria-labelledby="dropdownMenuLinkRevenue">
                        <div class="dropdown-header">Actions:</div>
                        <a :href="'/dashboard/clients/edit/' + client.id"
                           class="btn dropdown-item">Edit</a>
                        <div class="dropdown-divider"></div>
                        <form @submit.prevent="deletePost(client.id)">
                          <button class="btn dropdown-item text-danger">Delete</button>
                        </form>
                      </div>
                    </div>

                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>