<?php

namespace App\Http\Controllers;

use App\Books;
use App\Request as BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Google_Client;
use Google_Service_Books;

class BooksController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    private function addRequests(\Illuminate\View\View $view)
    {
        $myRequests = DB::table('requests')->where('requesterid', '=', Auth::user()->id)->get();
        $otherRequests = DB::table('requests')->where('ownerid', '=', Auth::user()->id)->get();
        $myOpenRequests = $myRequests->filter(function ($value, $key) {
            return !$value->approved;
        });
        $myApprovedRequests = $myRequests->filter(function ($value, $key) {
            return $value->approved;
        });
        $otherOpenRequests = $otherRequests->filter(function ($value, $key) {
            return !$value->approved;
        });
        $otherApprovedRequests = $otherRequests->filter(function ($value, $key) {
            return $value->approved;
        });
        return $view->with('myOpenRequests', $myOpenRequests)
                    ->with('myApprovedRequests', $myApprovedRequests)
                    ->with('otherOpenRequests', $otherOpenRequests)
                    ->with('otherApprovedRequests', $otherApprovedRequests);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all(); // got this from database model

        return $this->addRequests(view('books'))->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Db::table('books')->where('owner', '=', Auth::user()->id)->get();
        // load the create form (app/views/nerds/create.blade.php)
        return $this->addRequests(view('createbook'))->with('books', $books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'book'       => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('createbook')
				->withErrors($validator)
				->withInput();
		} else {
            $client = new Google_Client();
            $client->setApplicationName("bookjump");
            $client->setDeveloperKey("AIzaSyCp6TeBmn43CwAoM-_E8judP6-LuUoiAuo");

            $service = new Google_Service_Books($client);
            $results = $service->volumes->listVolumes(Input::get('book'));

            foreach ($results as $item) {
                //echo $item['volumeInfo']['title'], "<br /> \n";

                // store
                $book = Books::firstOrNew(array('title' => $item['volumeInfo']['title']));;
                $book->owner       = Auth::user()->id;
                $book->cover = $item['volumeInfo']['imageLinks'] === NULL ?   '' : $item['volumeInfo']['imageLinks']['thumbnail'];
                $book->requested = false;
                $book->save();
                break;
            }
			// redirect
			Session::flash('message', 'Successfully created book!');
			return back();
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $book = Books::findOrFail($id);
        $book->delete();
        Session::flash('flash_message', 'Book successfully deleted!');
        return back();
    }
}
