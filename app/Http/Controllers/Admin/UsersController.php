<?php

namespace App\Http\Controllers\Admin;

use App\Models\Roles;
use App\Models\Users;
use App\Models\Pictures;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use Carbon\Carbon;

class UsersController extends BackendController
{
    public function __construct()
    {
        parent::construct('admin.pages.users',"Users management", "Manage your webiste's users", "users.create", "users.index");
        $this->model = new Users();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = $this->model->all();
        return view($this->getView(), $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['form'] = 'insert';
        $roleModel = new Roles();
        $this->data['roles'] = $roleModel->all();
        return view($this->getView(), $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Definisanje pravila za validaciju
        $rules = [
            'first_name' => 'required|alpha|min:2|max:20',
            'last_name' => 'required|alpha|min:2|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'profilePicture' => 'mimes:jpg,jpeg,png,JPG,gif',
            'role_id' => 'required'
        ];

        //Kastomizacija poruka
        $messages = [
            'role_id.required' => 'User role must be selected.'
        ];

        //Primena validacije, ukoliko je ima grešaka vrši se redirekcija requesta- na prethodnu stranu sa sve greškama
        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        //Ukoliko je validacija uspesna, korisnik se upisuje u bazu

        $userModel = new Users();
        $userModel->first_name = $request->get('first_name');
        $userModel->last_name = $request->get("last_name");
        $userModel->email = $request->get('email');
        $userModel->created_at = Carbon::now();
        $userModel->password = $request->get("password");
        $userModel->username = $request->get("username");
        $userModel->role_id = $request->get("role_id");

        $slika = $request->file('profilePicture');

        $tmp_putanja = $slika->getPathName(); // tmp putanja
        $ekstenzija = $slika->getClientOriginalExtension(); // vraca: jpg, png - bez .
        $ime_fajla = time().'.'.$ekstenzija;
        $putanja = 'images/'.$ime_fajla;

        $putanja_server = public_path($putanja);

        try {
            File::move($tmp_putanja, $putanja_server);


            $pictures = new Pictures();
            $pictures->path = $putanja;
            $id = $pictures->savePicture();

            $userModel->picture_id = $id;
            $userModel->save();
            return redirect(route('crud_route', ['controller'=> 'users', 'action'=>'index']))->with("success", "User successfully added!");
        } catch(\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->model->user_id = $id;
        $this->data['user'] = $this->model->selectOne();
        $this->data['form'] = 'edit';

        $roleModel = new Roles();
        $this->data['roles'] = $roleModel->all();
        return view($this->getView(), $this->data);
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
        //Definisanje pravila za validaciju
        $rules = [
            'first_name' => 'required|alpha|min:2|max:20',
            'last_name' => 'required|alpha|min:2|max:20',
            'email' => 'required|email',
            'password' => 'required',
            'profilePicture' => 'mimes:jpg,jpeg,png,JPG,gif',
            'role_id' => 'required'
        ];

        //Kastomizacija poruka
        $messages = [
            'role_id.required' => 'User role must be selected.'
        ];

        //Primena validacije, ukoliko je ima grešaka vrši se redirekcija requesta- na prethodnu stranu sa sve greškama
        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        //Ukoliko je validacija uspesna, korisnik se upisuje u bazu

        $userModel = new Users();
        $userModel->first_name = $request->get('first_name');
        $userModel->last_name = $request->get("last_name");
        $userModel->email = $request->get('email');
        $userModel->updated_at = Carbon::now();
        $userModel->password = $request->get("password");
        $userModel->username = $request->get("username");
        $userModel->role_id = $request->get("role_id");


        $oldPictureId = null;
        try {

            if ($request->hasFile("profilePicture")) 
            {
                $pictures = new Pictures();
                $pictures->user_id = $id;
                $oldPictureId = $pictures->selectPicture()->picture_id;

                $slika = $request->file('profilePicture');

                $tmp_putanja = $slika->getPathName(); // tmp putanja
                $ekstenzija = $slika->getClientOriginalExtension(); // vraca: jpg, png - bez .
                $ime_fajla = time().'.'.$ekstenzija;
                $putanja = 'images/'.$ime_fajla;
                $putanja_server = public_path($putanja); 

                File::move($tmp_putanja, $putanja_server);

                $pictures->path = $putanja;
                $pictures->alt = "New User";

                $userModel->picture_id = $pictures->savePicture();
            }
            $userModel->user_id = $id;
            $userModel->update();

            try {
                if($oldPictureId) 
                {
                    $pictureM = new Pictures();
                    $pictureM->picture_id = $oldPictureId;
                    @unlink($pictureM->selectOne()->path);

                    $pictureM->picture_id = $oldPictureId;
                    $pictureM->deletePicture();
                }
            } 
            catch (\Exception $e) {
                \Log::error("Greska pri brisanju slike navigacije: " . $e->getMessage());
            }

            return redirect(route('crud_route', ['controller'=> 'users', 'action'=>'index']))->with("success", "User successfully updated!");
        } 
        catch (FileException $e) {
            \Log::error("An error occured while uploading gallery picture " . $e->getMessage());
        }
        catch (QueryException $e) {
            \Log::error("An error occured while inserting gallery picture into database " . $e->getMessage());
        }
        return redirect()->back()->with("error", "An error occured, please try again later");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->model->user_id = $id;
            $this->model->delete();
            return redirect(route('crud_route', ['controller'=> 'users', 'action'=>'index']))->with("success", "User successfully deleted!");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect(route('crud_route', ['controller'=> 'users', 'action'=>'index']))->with("success", "An error has occurred, please check log file.");
        }
    }
}
