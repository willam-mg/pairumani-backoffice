<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Habitacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Contact form.
     * Send a email from contact form.
     * 
     * @group Home
     * @bodyParam name string
     * @bodyParam email email
     * @bodyParam subject srtring
     * @bodyParam message string
     * @response scenario=success 
     * {
     *     "success": "true",
     *     "message": "Gracias por contactarnos, nos contactaremos con usted en breve."
     * }
     * 
     */
    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        return response()->json(['success' => 'true', 'message' => 'Gracias por contactarnos, nos contactaremos con usted en breve.'], 200);
    }
}
