<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.group.index', [
            'groups' => Group::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.group.create', [
            'group' => [],
            'groups' => Group::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->parent_id !== 0) {
            $level = $this->getLevel($request);
        } else {
            $level = 1;
        }

        $group = Group::create(['name' => $request->name, 'parent_id' => $request->parent_id, 'active' => $request->active, 'position' => $level]);
        if($group) {
            return redirect()
                ->back()
                ->withSuccess('Group created successfully!');
        } else {
            return back()
                ->withErrors('Save error')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);

        return view('admin.group.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('admin.group.edit', [
            'group' => $group,
            'groups' => Group::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        if(empty($group)) {
            return back()->withErrors('Record not found')->withInput();
        }
        $data = $request->all();

        if($group->parent_id !== $request->parent_id) {
            if($request->parent_id !== 0) {
                $level = $this->getLevel($request);
                $data += ['position' => $level];
            } else {
                $data += ['position' => 1];
            }
        }

        $result = $group
            ->update($data);

        if($result) {
            return redirect()
                ->back()
                ->withSuccess('Group changed successfully!');
        } else {
            return back()
                ->withErrors('Save error')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::findOrFail($id)->delete();
        return redirect()->back()->withSuccess('Group deleted successfully!');
    }

    /**
     * Determine the position of the group
     *
     * @param  \App\Models\Group  $group
     * @return integer
     */
    public function getLevel($group) {
        $level=1;
        while($group->parent_id != 0) {
            $group = Group::findOrFail($group->parent_id);
            $level++;
            $this->getLevel($group);
        }

        return $level;
    }
}
