<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailFormRequest;
use App\Http\Services\EmailService;
use App\Http\Services\Media\MediaFileService;
use App\Traits\EmailSpamFilterTrait;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    use EmailSpamFilterTrait;

    public function contact_us(EmailFormRequest $request, MediaFileService $mediaFileService, EmailService $emailService)
    {

        $this->filterSpamMails($request->get('__message'));
        try {

            $email = $emailService->storeEmail($request);

            $mediaFileService->fileUpload(
                $email,
                $request->file('__document'),
                'email'
            );

            $files = $request->hasFile('__document') ? $request->file('__documemt') : [];

            $emailService->sendEmail($email, $files); // Mail::send(new ContactUs($email, $files));

            return \redirect()->back()->with('message', 'Message sent successfully. One of our consultants will get back to you soon.');

        } catch (\Exception $e) {
            return \redirect()->back()->with('err_message', 'Something went wrong, we are busy looking into the issue - '.$e->getMessage()); //
        }

    }
}
