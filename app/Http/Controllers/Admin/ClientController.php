<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientFormRequest;
use App\Http\Services\AttachModelService;
use App\Http\Services\ClientService;
use App\Http\Services\Media\MediaFileService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Client;
use App\Models\Solution;
use App\Models\Industry;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $clients = Client::with('relatedUser')->orderBy('id', 'desc')->paginate(10);
        return view('backend.dashboard.modules.clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $solutions = Solution::all();
        $industries = Industry::all();
        return view('backend.dashboard.modules.clients.create', ['solutions' => $solutions, 'industries' => $industries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientFormRequest $request
     * @param ClientService $clientService
     * @param MediaFileService $mediaFileService
     * @param AttachModelService $attachModelService
     * @return RedirectResponse
     */
    public function store(
        ClientFormRequest $request,
        ClientService $clientService,
        MediaFileService $mediaFileService,
        AttachModelService $attachModelService
    ): RedirectResponse
    {
        try{
            $client = $clientService->storeClient(new Client, $request);

            $mediaFileService->fileUpload($client, $request->file('client_logo'),'logos'); // Upload company logo
            $mediaFileService->fileUpload($client, $request->file('example_one'),'project-images'); //Upload example one
            $mediaFileService->fileUpload($client, $request->file('example_two'),'project-images'); //Upload example two
            $mediaFileService->fileUpload($client, $request->file('example_three'),'project-images'); //Upload example three

            $attachModelService->attachModel($client, ['industry' => $request->get('industry_id')], 'industries');
            $attachModelService->attachModel($client, ['solution' => $request->get('solution_id')], 'solutions');
        }
        catch (Exception $e){
            return redirect()->back()->with('err_message', $e->getMessage());
        }

        return redirect()->back()->with('message', 'Successfully created client');
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function show(Client $client): View|Factory|Application
    {
         return view('backend.dashboard.modules.clients.show', [
             'client' => $client->with('relatedUser')->first()
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function edit(Client $client): View|Factory|Application
    {
        $solutions = Solution::query()->get(['id','solution_name']);
        $industries = Industry::query()->get(['id','industry_name']);

        return view('backend.dashboard.modules.clients.edit', [
            'solutions' => $solutions,
            'client' => $client,
            'industries'=> $industries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientFormRequest $request
     * @param ClientService $clientService
     * @param MediaFileService $mediaFileService
     * @param AttachModelService $attachModelService
     * @param Client $client
     * @return RedirectResponse
     */
    public function update(ClientFormRequest $request,ClientService $clientService, MediaFileService $mediaFileService, AttachModelService $attachModelService, Client $client): RedirectResponse
    {
        try {
            $client = $clientService->storeClient($client, $request);
            // Upload company logo
            $mediaFileService->fileUpload($client, $request->file('client_logo'), 'logos');
            $attachModelService->attachModel($client, ['industry' => $request->get('industry_id')], 'industries');
            $attachModelService->attachModel($client, ['solution' => $request->get('solution_id')], 'solutions');
        } catch (Exception $e) {
            return redirect()->back()->with('err_message', $e->getMessage());
        }

        return redirect()->back()->with('message', 'Successfully updated client');
    }

    public function uploadLogo (MediaFileService $mediaFileService, Client $client, Request $request): RedirectResponse
    {
        // Upload company logo
        $mediaFileService->fileUpload(
            $client,
            $request->file('client_logo'),
            'logos'
        );

        return redirect()->back()->with('message', 'Successfully update image');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return RedirectResponse
     */
    public function destroy(Client $client): RedirectResponse
    {
        try{
            $client->delete();
            $client->relatedSolutions()->detach();
            $client->relatedIndustries()->detach();
        }
        catch (Exception $e){
            return redirect()->route('clients.index')->with('err_message', $e->getMessage());
        }
        return redirect()->route('clients.index')->with('message', 'Successfully deleted');
    }
    
}
