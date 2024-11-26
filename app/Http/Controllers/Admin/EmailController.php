<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailFormRequest;
use App\Models\Email;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function index(): Factory|View|Application
    {
        $emails = Email::query()->paginate(15);

        return view('backend.dashboard.modules.emails.index',[
            'emails' => $emails
        ]);
    }

    public function create(): Factory|View|Application
    {

        return view('backend.dashboard.modules.emails.create');
    }

    public function store(EmailFormRequest $request) {

        
    }

    public function show(Email $email): Factory|View|Application
    {

        return view('backend.dashboard.modules.emails.show', [
            'email' => $email
        ]);
    }

    public function edit(Email $email): Factory|View|Application
    {
        return view('backend.dashboard.modules.forms.edit', [
            'email' => $email
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Email $email
     * @return RedirectResponse
     */
    public function destroy(Email $email): RedirectResponse
    {
        $email->delete();
        return redirect()->route('emails.index', ['message' =>'Successfully deleted']);
    }
}
