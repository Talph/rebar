<script>
export default {
  props: ['category'],
  data() {
    return {
      categories: {},
      err_message: "",
      loading: true
    }
  },
  mounted() {
    this.loadCategories()
  },
  methods: {
    async loadCategories() {
      axios.get('/api/categories')
          .then(response => {
            this.categories = response.data.data;
          })
          .catch(error => console.log(error)
          );
      this.loading = false;
    }
  }
}
</script>

<template>
  <div class="container">
    <h1>Category: {{ category.name }}</h1>
    <div class="row justify-content-center">
      <div v-if="category.posts.length !== 0" class="col-md-10">
        <div class="row">
          <div v-for="(post, index) in category.posts" :key="index" class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <div class="card mt-4">
              <div class="card-header">
                <img src="/img/png/graduate.webp" class="w-100" alt="Blog">
              </div>
              <div class="card-body">
                <h3><a :href="'/posts/' + post.slug">{{ post.title }}</a></h3>
                {{ post.meta_desc }}
              </div>
              <a class="btn btn-primary" :href="'/posts/' + post.slug">Read more →</a>
            </div>
          </div>
        </div>
      </div>
      <div v-if="category.posts.length === 0" class="col-md-10">
        <h2 class="text-dark">There are no blog posts in this category at the moment please check again later.</h2>
      </div>
      <div class="col-md-2">
        <h2>Categories</h2>
        <ul class="list-group mt-5">
          <a :href="category.slug" v-for="category in this.categories"
             class="list-group-item">{{ category.name }}</a>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>