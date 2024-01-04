<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sitesetting = SiteSetting::first();
        $sitesetting->address       =   json_decode($sitesetting->address);
        $sitesetting->socialLinks   =   $sitesetting->socialLinks;

        return view("admin.sitesettings.edit",compact('sitesetting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormEntry  $formEntry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormEntry  $formEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(FormEntry $formEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormEntry  $formEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $sitesetting = SiteSetting::findOrFail($id);

            $request['logo']        =  uploadFile($request, 'site_logo', 'site');
            $request['fav_icon']    =  uploadFile($request, 'site_fav_icon', 'site');
      
        $request->validate([
            'site_name'=>'required'
        ]);

        $update_array = $request->all();

        $sitesetting->update($update_array);

        return redirect()->route('admin::sitesettings.index')->with('success','Site Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormEntry  $formEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}