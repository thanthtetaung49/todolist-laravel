<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // location to admin page
    public function adminPage()
    {
        $posts = Admin::when(request('key'), function ($query) {
            $key = request('key');
            $query
                ->orWhere('title', 'like', '%' . $key . '%')
                ->orWhere('description', 'like', '%' . $key . '%')
                ->orWhere('category', 'like', '%' . $key . '%')
                ->orWhere('rating', 'like', '%' . $key . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('adminPage', compact('posts'));
    }

    // create posts
    public function moviePostCreate(Request $request)
    {
        $data = $this->movieData($request);
        $this->validationCheck($request);

        if ($request->hasFile('movieImage')) {
            $fileName = uniqid() . '_' . $request->file('movieImage')->getClientOriginalName();
            $request->file('movieImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        Admin::create($data);
        return redirect()
            ->route('adminPage#page')
            ->with(['create' => 'create post successfully.']);
    }

    // delete posts
    public function moviePostDelete($id)
    {
        Admin::where('id', $id)->delete();
        return redirect()
            ->route('adminPage#page')
            ->with(['delete' => 'Delete post successfully.']);
    }

    // location to movie post delete
    public function moviePostEdit($id)
    {
        $data = Admin::where('id', $id)->first();

        return view('editPage', compact('data'));
    }

    // final edit posts
    public function finalEdit(Request $request, $id)
    {
        $data = $this->movieData($request);
        $this->validationCheck($request);

        if ($request->hasFile('movieImage')) {
            $oldImageName = Admin::where('id', $id)->first();
            $oldImageName = $oldImageName->image;

            Storage::delete('public/' . $oldImageName);

            $fileName = uniqid() . '_' . $request->file('movieImage')->getClientOriginalName();
            $request->file('movieImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        Admin::where('id', $id)->update($data);
        return redirect()
            ->route('adminPage#page')
            ->with(['update' => 'Update post successfully.']);
    }

    // movie home
    public function homePage(Request $request)
    {
        $data = Admin::when(request('key'), function ($query) {
            $key = request('key');
            $query
                ->orWhere('title', 'like', '%' . $key . '%')
                ->orWhere('description', 'like', '%' . $key . '%')
                ->orWhere('category', 'like', '%' . $key . '%')
                ->orWhere('rating', 'like', '%' . $key . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $lastData = Admin::get()->last();

        return view('homePage', compact('data', 'lastData'));
    }

    // location to home view page
    public function homeViewPage($id)
    {
        $data = Admin::where('id', $id)->first();
        return view('homeViewPage', compact('data'));
    }

    // location to tv show page
    public function tvshowPage()
    {
        $data = Admin::when(request('key'), function ($query) {
            $key = request('key');
            $query
                ->orWhere('title', 'like', '%' . $key . '%')
                ->orWhere('description', 'like', '%' . $key . '%')
                ->orWhere('category', 'like', '%' . $key . '%')
                ->orWhere('rating', 'like', '%' . $key . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        return view('tvShowPage', compact('data'));
    }

    // location to movie show page
    public function movieShowPage()
    {
        $data = Admin::when(request('key'), function ($query) {
            $key = request('key');
            $query
                ->orWhere('title', 'like', '%' . $key . '%')
                ->orWhere('description', 'like', '%' . $key . '%')
                ->orWhere('category', 'like', '%' . $key . '%')
                ->orWhere('rating', 'like', '%' . $key . '%');
        })

            ->orderBy('created_at', 'desc')
            ->paginate(30);

        return view('movieShowPage', compact('data'));
    }

    // location to upcoming movie page
    public function upcomingMovie()
    {
        $data = Admin::when(request('key'), function ($query) {
            $key = request('key');
            $query
                ->orWhere('title', 'like', '%' . $key . '%')
                ->orWhere('description', 'like', '%' . $key . '%')
                ->orWhere('description', 'like', '%' . $key . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        return view('upcomingMoviePage', compact('data'));
    }

    // data
    private function movieData($request)
    {
        $data = [
            'title' => $request->movieTitle,
            'additional_title' => $request->aTitle,
            'description' => $request->movieDescription,
            'category' => $request->movieCategory,
            'rating' => $request->movieRating,
            'types' => $request->movieTypes,
            'links' => $request->downloadLinks
        ];

        return $data;
    }

    // validation check
    private function validationCheck($request)
    {
        $rule = [
            'movieTitle' => 'required|min:5|',
            'movieDescription' => 'required',
            'movieImage' => 'mimes:jpg,png,jpeg,.webp',
            'movieCategory' => 'required',
            'movieRating' => 'required',
            'movieTypes' => 'required',
            'downloadLinks' => 'required'
        ];

        $message = [
            'movieTitle.required' => "Please fill movie's title.",
            'movieDescription.required' => "Please fill movie's description.",
            'movieCategory.required' => "Please fill movie's category",
            'movieRating.required' => "Please fill movie's rating.",
            'movieTypes.required' => "Please fill movie's types.",
            'downloadLinks.required' => "Please fill download link."
        ];

        Validator::make($request->all(), $rule, $message)->validate();
    }
}
