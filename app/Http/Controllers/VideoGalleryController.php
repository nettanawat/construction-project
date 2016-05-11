<?php

namespace App\Http\Controllers;

use App\VideoGallery;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = VideoGallery::all();
        return view('video.videos', ['videos' => $videos]);
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
        $validator = Validator::make($request->all(),[
            'path' => 'required',
            'date' => 'required',
            'name' => 'required',
            'project' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $myDateTime = \DateTime::createFromFormat('j F, Y', $request->get('date'));
        $newDateString = $myDateTime->format('Y-m-d');

        $video = new VideoGallery();
        $video->url = $request->get('path');
        $video->name = $request->get('name');
        $video->project = $request->get('project');
        $video->date = $newDateString;
        $video->save();
        return redirect('/admin/videos');
    }

    /**
     * @param $project
     * @param $date
     */
    public function show($project, $date)
    {
        $dateList = VideoGallery::orderBy('date', 'asc')->lists('date');
        $allResults = array();
        foreach($dateList as $singleDate){
            $allResults[] = $singleDate;
        }
        $allDate = array_unique($allResults);


        if($date == 'all'){
            $videos = VideoGallery::where('project', '=', $project)->orderBy('date', 'asc')->get();
            $dateList = VideoGallery::orderBy('date', 'asc')->lists('date');
            $results = array();
            foreach($dateList as $singleDate){
                $results[] = $singleDate;
            }
            $data = array_unique($results);
            return view('video.show-video', ['videos' => $videos, 'dates' => $data, 'allDates' =>$allDate, 'project' => $project]);

        } else {
            $videos = VideoGallery::where('project', '=', $project)->where('date', '=', $date)->orderBy('date', 'asc')->get();
            $data = array();
            $data[] = $date;
            return view('video.show-video', ['videos' => $videos, 'dates' => $data, 'allDates' =>$allDate, 'project' => $project]);

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = VideoGallery::findOrNew($id);
        return view('video.edit-video', ['video' => $video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'path' => 'required',
            'date' => 'required',
            'name' => 'required',
            'project' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $myDateTime = \DateTime::createFromFormat('j F, Y', $request->get('date'));
        $newDateString = $myDateTime->format('Y-m-d');

        $video = VideoGallery::findOrNew($id);
        $video->url = $request->get('path');
        $video->name = $request->get('name');
        $video->project = $request->get('project');
        $video->date = $newDateString;
        $video->update();
        return redirect('/admin/videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VideoGallery::destroy($id);
        return redirect()->back();
    }
}
