<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Validator;
use App\Campus;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public $successStatus = 200;

    public function __construct() {
        $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where("id", "<>", 5)->get();
        $campus = Campus::all();

        return view('users.index')->with('roles', $roles)->with('campus', $campus);
    }

    public function getRecords(Request $request) {

        $query = DB::table("users")
            ->select("users.id", "users.picture", "users.name", "users.email", "roles.name as role")
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('users.deleted_at',null)
            ->where('roles.deleted_at',null)
            ->where('model_has_roles.role_id', '<>', 5);

        if ($request["searchPhrase"] != "") {
            $query->where('users.name', 'LIKE', "%{$request['searchPhrase']}%")
                ->orWhere('users.email', 'LIKE', "%{$request['searchPhrase']}%");
        }

        if (isset($request["role"])) {
            if($request["role"] != "") {
                $query->where('model_has_roles.role_id', '=', $request["role"]);
            }
        }

        if($request["sort"] != "") {
            $query->orderBy(array_keys($request["sort"])[0], $request["sort"][array_keys($request["sort"])[0]]);
        }

        $records["current"] = $request["current"];
        $records["rowCount"] = $request["rowCount"];
        $records["total"] = count($query->get());

        if ($request["current"] == "1") {
            $rowCount = 0;
        } else {
            $rowCount = (intval($request["current"]) * intval($request["rowCount"])) - intval($request["rowCount"]);
        }

        if ($request["rowCount"] == "-1") {
            $records["rows"] = $query->get();
        } else {
            $records["rows"] = $query->take($request["rowCount"])->skip($rowCount)->get();
        }

        return response()->json($records, $this->successStatus);
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
        $validator = Validator::make($request->all(),
            [
                'role'=>'required',
                'name'=>'required',
                'campus'=>'required',
                'email'=>'required|unique:users'
            ],
            [
                'role.required' => __('The role is required'),
                'name.required' => __('The name is required'),
                'campus.required' => __('The campus is required'),
                'email.required' => __('Mail is required'),
                'email.unique' => __('The email I entered has already been used')
            ]
        );

        if ($validator->fails()) {

            $data = array(
                'success' => false,
                'errors' => $validator->errors(),
            );

            return response()->json($data, $this->successStatus);
        }

        $newPassword = Str::random(8);
        $userData = new User();
        $userData['name'] = $request['name'];
        $userData['email'] = $request['email'];
        $userData['password'] = bcrypt($newPassword);
        $userData['change_password'] = 1;
        $userData->save();

        $userData['password'] = $newPassword;

        $role_r = Role::where('id', '=', $request["role"])->firstOrFail();
        $userData->assignRole($role_r);

        Mail::to($userData['email'])->send(new VerifyUser($userData, true));

        $data = array(
            'success' => true,
            'message' => __('Your user registered correctly')
        );

        return response()->json($data, $this->successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DB::table("users")
            ->select("users.id", "users.name", "users.email", "roles.id as role")
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('users.deleted_at',null)
            ->where('roles.deleted_at',null)
            ->where('users.id',$id)->first();

        return response()->json($item, $this->successStatus);
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
        //
    }
}
