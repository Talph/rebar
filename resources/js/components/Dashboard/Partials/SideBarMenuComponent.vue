<script>
export default {
  props: ['app', 'auth'],
  data() {
    return {

    }
  },
  mounted() {

  },
  methods: {}
}
</script>

<template>
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard/home">
      {{app}} </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="/dashboard/home">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="feather feather-activity">
          <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
        </svg>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>
    <!-- Nav Item - Posts -->
    <li class="nav-item">

      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost"
         aria-expanded="true"
         aria-controls="collapsePost">
        <i class="fas fa-fw fa-sticky-note"></i>
        <span>Posts</span></a>
      <div id="collapsePost" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Select what you want :</h6>
          <a class="collapse-item" href="/dashboard/posts">All Posts</a>
          <a class="collapse-item" href="/dashboard/posts/create">Create New Post</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages -->
    <li class="nav-item">

      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
         aria-expanded="true"
         aria-controls="collapsePage">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Categories</span></a>
      <div id="collapsePage" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Select what you want :</h6>
          <a class="collapse-item" href="/dashboard/categories">All categories</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggle (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" aria-label="Toggle Side bar" id="sidebarToggle"></button>
    </div>

  </ul>
</template>

<style scoped>

</style>