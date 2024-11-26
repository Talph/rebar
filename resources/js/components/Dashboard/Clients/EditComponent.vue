<script>
export default {
  props: ['client'],
  data() {
    return {
      form:{
        'name': '',
        'description': '',
      },
      'messages': {},
      savingDone: false,
    }
  },
  mounted() {
    this.form.name = this.client.name;
    this.form.description = this.client.description;
  },
  methods: {
    async submit(){
      await axios.put('/api/clients/' + this.client.id,{
        id: this.client.id,
        name: this.form.name,
        description: this.form.description,
      }).then(response => {
        this.messages = response.data.data;
        this.savingDone = true;
      }).catch(error => {
        console.log(error)
      });
    }
  }
}
</script>

<template>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Edit client </h1>
      <div class="createProduct my-4">
        <a class="btn btn-primary" href=/dashboard/clients/create>Create New client</a>
      </div>
      <form @submit.prevent="submit" method="POST" id="clientEdit">
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="card">
              <p v-if="messages" v-for="message in messages">{{message}}</p>
              <div class="card-header">
                Edit : {{ client.name }}
              </div>
              <div class="card-body">

                <div class="form-group row">
                  <div class="col">
                    <label>client Name</label>
                    <input class="form-control" type="text"
                           placeholder="Name"
                           v-model="form.name" required
                           autofocus>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col">
                    <label>Description</label>
                    <textarea class="form-control" id="textarea-input" v-model="form.description"
                              rows="9" placeholder="Description..."
                              required> </textarea>
                  </div>
                </div>

                <button class="btn btn-block btn-success" type="submit">Update Client
                </button>

              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>

</style>