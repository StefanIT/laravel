<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pictures;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class GalleryController extends BackendController
{

    public function __construct()
    {
        parent::construct('admin.pages.gallery',"Gallery management", "Manage your webiste's gallery pictures", "gallery.create", "gallery.index");
        $this->model = new Pictures();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['galleries'] = $this->model->allOfThem();
        return view($this->getView(), $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        try {
            $this->model->picture_id = $id;
            $pictureId = $this->model->selectOne()->pic_id;
            $this->model->deletePicture();
            try {
                $pictureModel = new Pictures();
                $pictureModel->picture_id = $pictureId;

                $picture = $pictureModel->selectOne();
                unlink(public_path($picture->path));
                $this->model->picture_id = $pictureId;
                $pictureModel->deletePicture();
            } catch(\Exception $e) {
                \Log::error("Greska pri brisanju slike galerije " . $e->getMessage());
            }
            return redirect()->back()->with("success", "Picture successfully deleted!");
        } catch (QueryException $e) {
            return redirect()->back()->with("error", "An error occured, please try again later");
        }
    }
}
