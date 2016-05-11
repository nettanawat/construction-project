<?php

namespace App\Http\Controllers;

use App\ImageGallery;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = ImageGallery::all();
        return view('image.images', ['images' => $images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach (Input::file('images') as $file) {

            $input = array(
                'upload' => $file,
                'date' => $request->get('date'),
                'project' => $request->get('project')
            );

            $validator = Validator::make($input, [
                    'upload' => 'image|required',
                    'date' => 'required',
                    'project' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $myDateTime = \DateTime::createFromFormat('j F, Y', $request->get('date'));
            $newDateString = $myDateTime->format('Y-m-d');

            $now = \DateTime::createFromFormat('U.u', microtime(true));
            $newFileName = $now->format("Ymd_Hisu").'.jpg';
            $file->move(base_path() . '/public/uploads/images/', $newFileName);
            $image = new ImageGallery();
            $image->path = $newFileName;
            $image->project = $request->get('project');
            $image->date = $newDateString;
            $image->save();
        }
        return redirect('/admin/images');
    }

    /**
     * @param $project
     * @param $date
     */
    public function show($project, $date)
    {
        $dateList = ImageGallery::where('project', '=', $project)->orderBy('date', 'asc')->lists('date');
        $allResults = array();
        foreach($dateList as $singleDate){
            $allResults[] = $singleDate;
        }
        $allDate = array_unique($allResults);


        if($date == 'all'){
            $images = ImageGallery::where('project', '=', $project)->orderBy('date', 'asc')->get();
            $dateList = ImageGallery::orderBy('date', 'asc')->lists('date');
            $results = array();
            foreach($dateList as $singleDate){
                $results[] = $singleDate;
            }
            $data = array_unique($results);
            return view('image.show-image', ['images' => $images, 'dates' => $data, 'allDates' =>$allDate, 'project' => $project]);

        } else {
            $images = ImageGallery::where('project', '=', $project)->where('date', '=', $date)->orderBy('date', 'asc')->get();
            $data = array();
            $data[] = $date;
            return view('image.show-image', ['images' => $images, 'dates' => $data, 'allDates' =>$allDate, 'project' => $project]);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = ImageGallery::findOrNew($id);
        $filename = base_path() . '/public/uploads/images/'.$image->path;
        if (File::exists($filename)) {
            File::delete($filename);
        }
        ImageGallery::destroy($id);
        return redirect()->back();
    }
}
