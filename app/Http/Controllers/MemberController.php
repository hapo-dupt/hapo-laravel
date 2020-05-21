<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Project as Project;
use App\Models\Task;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MemberController extends Controller
{

    /**
     * Dashboard Member.
     */
    public function dashboard()
    {
        return view('members.dashboard');
    }

    /**
     * Get ID members.
     */
    public function idMember()
    {
        return Auth::guard('member')->user()->id;
    }

    /**
     * Data projects.
     */
    public function dataProjects()
    {
        return auth()->guard('member')->user()->projects;
    }

    /**
     * Pending Project.
     */
    public function projects()
    {
        $data = $this->dataProjects();
        return view('members.projects.projects', ['projects' => $data]);
    }

    /**
     * Detail Projects.
     */
    public function detailProjects($id)
    {
        $all_task = Task::all()->where('project_id', '=', $id)->count();
        $task_finished = Task::all()->where('project_id', '=', $id)
                                                 ->where('status', '=',(new Member())->status_close)
                                                 ->count();
        $projects = Member::all()
                ->where('project_id', '=', $id);
        $data = Project::all()->where('id', '=', $id);
        $customer = Project::find($id)->customers;
        $member = Project::find($id)->members;
        //dd($member);
        if ($all_task != null && $task_finished != null) {
            $process = number_format(($task_finished / $all_task) * 100, 1, '.', ',');
        } else {
            $process = 0;
        }
        return view(
            'members.projects.details',
            [
                'process' => $process,
                'projects' => $projects,
                'data' => $data,
                'customer' => $customer,
                'member' => $member
            ]
        );
    }

    /**
     * Select Projects to preview tasks.
     */
    public function tasks()
    {
        $data = $this->dataProjects();
        return view('members.tasks.index', ['projects' => $data]);
    }

    /**
     * Manage tasks list with project.
     * @param $project_id
     * @return Factory|View
     */
    public function manageTasks($project_id)
    {
        $data = Task::all()->where('project_id', $project_id)->where('member_id', $this->idMember());
        return view('members.tasks.tasks', ['data' => $data, 'project_id' => $project_id]);
    }

    /**
     * Completed Tasks.
     * @param Request $request
     * @return RedirectResponse
     */
    public function completedTasks(Request $request)
    {
        Task::where('id', $request->TaskId)->update(['status' => (new Member())->status_close]);
        return redirect()->back()->with('success', 'You are registered completed tasks successfully!');
    }
}
