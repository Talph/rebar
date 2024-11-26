<script>
export default {
  props: ['auth'],
  data(){
    return {
      form: {
        'user_id': '',
        'title': '',
        'subtitle': '',
        'meta_desc': '',
        'seo_keywords': '',
        'content': '',
        'posted_at': '',
        'is_published': '',
        'category_id': []
      },
      messages : '',
      categories: {},
      savingDone: false,
    }
  },
  mounted() {
    this.form.user_id = this.auth.id
    this.loadCategories();
  },
  methods: {
    loadCategories() {
      axios.get('/api/categories')
          .then(response => {
            this.categories = response.data.data;
          })
          .catch(error => console.log(error)
          );
    },
    async submit() {
      await axios.post('/api/projects',this.form).then(response => {
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
      <h1 class="h3 mb-2 text-gray-800">Written Projects </h1>
      <div class="createProduct my-4">
        <a class="btn btn-primary" href=/dashboard/projects>View Projects</a>
      </div>
      <form @submit.prevent="submit" id="postCreate" enctype="multipart/form-data" method="POST">
        <div class="row">
          <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
            <div class="card card-collapsable">
              <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                 aria-expanded="true" aria-controls="collapseCardExample">
                Create Post
              </a>
              <div class="collapse show" id="collapseCardExample">
                <div class="card-body px-5">
                  <div class="form-group row">
                    <label>Title</label>
                    <input class="form-control" type="text" id="J_name" placeholder="Title"
                           v-model="form.title" required autofocus>
                  </div>
                  <div class="form-group row">
                    <label>Subtitle</label>
                    <input class="form-control" type="text" placeholder="Subtitle"
                           v-model="form.subtitle" required autofocus>
                  </div>

                  <div class="form-group row">
                    <label>Content</label>
                    <textarea class="form-control" id="summernote" v-model="form.content" rows="9"
                              required> </textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mt-4 card-collapsable">
              <a class="card-header" href="#collapseCardMeta" data-toggle="collapse" role="button"
                 aria-expanded="true" aria-controls="collapseCardMeta">
                Meta description
              </a>
              <div class="collapse show" id="collapseCardMeta">

                <div class="card-body px-5">
                  <div class="form-group row">
                                    <textarea class="form-control" id="textarea-meta_desc" v-model="form.meta_desc" rows="4"
                                              placeholder="Meta description.."
                                              required></textarea>
                    <small>A maximum of 160 characters are recommended</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mt-4 card-collapsable">
              <a class="card-header" href="#collapseCardKeyword" data-toggle="collapse" role="button"
                 aria-expanded="true" aria-controls="collapseCardKeyword">
                Keywords
              </a>
              <div class="collapse show" id="collapseCardKeyword">
                <div class="card-body px-5">
                  <div class="form-group row">
                    <input type="text" hidden class="hidden" :name="form.user_id" :value="auth.id">
                    <input type="text" class="form-control" v-model="form.seo_keywords"
                           placeholder="Target keywords..." required/>
                    <small>Separate keywords with a comma eg 'Best shop, Shoes'</small>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
            <div class="card card-collapsable">
              <a class="card-header" href="#collapseCardPublish" data-toggle="collapse" role="button"
                 aria-expanded="true" aria-controls="collapseCardPublish">
                Publish
              </a>
              <div class="collapse show" id="collapseCardPublish">

                <div class="card-body px-5">
                  <div class="form-group">
                    <label>Post status</label>
                    <select class="form-control" v-model="form.is_published">
                      <option selected value="0">Draft</option>
                      <option value="1">Publish</option>
                      <option value="2">Send for approval</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <label>Publish date</label>
                    <input type="date" class="form-control" v-model="form.posted_at"/>
                  </div>
                  <button v-if="!savingDone" class="btn btn-block btn-primary" type="submit">Save</button>
                  <span v-if="savingDone" class="btn btn-success" disabled="">{{messages}}</span>
                  <a href="/dashboard/projects"
                     class="btn btn-block btn-secondary">Return</a>
                </div>
              </div>
            </div>

            <div class="card mt-4 card-collapsable">
              <a class="card-header" href="#collapseCardCategory" data-toggle="collapse" role="button"
                 aria-expanded="true" aria-controls="collapseCardCategory">
                Category
              </a>
              <div class="collapse show" id="collapseCardCategory">
                <div class="card-body px-5">
                  <div class="form-group">
                    <label for="category">Category</label>
                    <br/>
                    <span v-if="categories">
                                            <span v-for="(category, index) in categories" :key="index">
                                                <label>
                                             <input  type="checkbox" v-model="form.category_id" :value="category.id">
                                                 {{category.name }} </label><br/>
                                            </span>
                                        </span>
                    <span v-else>
                                        <label for="category">No categories</label><br/>
                                        <a href="#" data-toggle="modal" data-target="#createModal">Create category</a>
                                        </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Create Category Modal-->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <!--                    <form @submit.prevent="submit" method="POST" id="categoryCreate" onclick="this.createPost()">-->
          <!--                        <label>Category Name</label>-->
          <!--                        <input class="form-control" type="text" id="J_name" placeholder="Category Name"-->
          <!--                               v-model="category_name" required autofocus>-->
          <!--                        <small>The name is how it appears on your site.</small>-->
          <!--                        <br/>-->
          <!--                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>-->
          <!--                        <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Create</a>-->
          <!--                    </form>-->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>