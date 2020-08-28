<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    private $_site;

    public function __construct(Site $site)
    {
        $this->_site = $site;
    }

    public function index()
    {
        $site= Site::take(1)->first();
        return view('admin.legal_pages', compact('site'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'email'  => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        } else {

            $data = [
                'email'=> $request->email,
                'faq'=> $request->faq,
                'term_and_conditions'=> $request->term_and_conditions,
                'privacy_policy'=> $request->privacy_policy,
              ];

            if ($site = Site::first())
            {
                $this->_site->store($data, $site['id']);
                return response()->json(['success' => 'Information Update Successfully.']);
            } else {
                $this->_site->store($data);
                return response()->json(['success' => 'Information Save Successfully.']);
            }

        }
    }
}
