                <div class="form-group">
                    <label>Client Name</label>
                    <select class="form-control" name="client_id">
                        <option value="">Select client</option>
                        @forelse($clients as $client)
                            <option value="{{ $client->id }}" @if($project){{str_contains($client->client_name, $project->getRelatedClients()->client_name) ? 'selected' : ''}}@endif>{{$client->client_name}}</option>
                        @empty
                            <label for="client">No clients</label><br />
                        @endforelse
                        <a href="btn" data-toggle="modal" data-target="#createModal">Create client</a>
                    </select>
                </div>
