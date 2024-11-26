<script>
export default {
  props: ['auth'],
  data() {
    return {
      posts: {},
      err_message: "",
      loading: true
    }
  },
  mounted() {
    this.loadPosts();
  },
  methods: {
    loadPosts() {
      axios.get('/api/posts/all')
          .then(response => {
            this.posts = response.data.data;
          })
          .catch(error => console.log(error)
          );
      this.loading = false;
    },
    deletePost(id) {
      axios.delete('/api/posts/' + id)
          .then(response => {
            this.posts = response.data.data;
            this.loadPosts();
          })
          .catch(error => console.log(error)
          );
      this.loading = false;
    }
  }
}
</script>

<template>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row shadow my-2">
        <div class="col-md-6">
          <h1 class="h3 mb-2 text-gray-800">Hello {{ auth.name }}!</h1>
          <div class="createProduct border-2 my-4">
            <a class="btn btn-primary" href=/dashboard/posts/create>Create New Post</a>
          </div>
        </div>
        <div class="col-md-6">
          <img class="float-right" src="/img/png/isometric-icons-web-development-min-uai-828x828.png" alt=""
               width="200">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="card">
            <div class="card-header">
              Posts</div>
            <div class="card-body">
              <table id="dataTable" class="table table-striped table-bordered" style="width: 100%;">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Content</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <tr class="odd" v-for="(post, index) in posts" :key="index">
                  <td>{{ post.title }}</td>
                  <td>
                                        <span v-for="(author, index) in post.author" :key="index">
                                            {{author.name}}
                                        </span>
                  </td>
                  <td>{{post.metaDesc }}</td>
                  <td>{{ post.postedAt }}</td>
                  <td>
                                      <span class="draft">
                                          {{post.isPublished}}
                                      </span>
                  </td>

                  <td>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkPosts" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false" aria-label="Posts action button">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                           aria-labelledby="dropdownMenuLinkPosts">
                        <div class="dropdown-header">Actions:</div>
                        <a :href="'/dashboard/posts/edit/' + post.id " class="btn dropdown-item">Edit</a>
                        <div class="dropdown-divider"></div>
                        <form @submit.prevent="deletePost(post.id)">
                          <button class="btn dropdown-item text-danger">Delete</button>
                        </form>
                      </div>

                    </div>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Content</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </tfoot>
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