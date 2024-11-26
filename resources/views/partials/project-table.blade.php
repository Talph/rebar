
    <div class="row mt-5">
        <div class="col-md-12">
    <div class="title text-left"><h3 class="h3">Completed projects</h3></div>
<table class="table" id="dataTable">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Project</th>
        <th scope="col">Client</th>
          <th scope="col">Location</th>
        <th scope="col">Project value</th>
        <th scope="col">Fees</th>
          <th scope="col">Year</th>
        <th scope="col">Role</th>

      </tr>
    </thead>
    <tbody>
      @foreach($projects as $project)
      <tr>
        <th scope="row">{{$project->id}}</th>

        <td>{{ucfirst(strtolower($project->project_name))}}</td>
        <td>{{$project->getRelatedClients()->client_name}}</td>
          <td>{{$project->location}}</td>
        <td>{{$project->project_value}}</td>
          <td>{{$project->fees}}</td>
          <td>{{$project->end_date}}</td>
        <td>{{ucfirst($project->role)}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

