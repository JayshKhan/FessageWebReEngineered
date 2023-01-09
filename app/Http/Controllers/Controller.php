<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard()
    {
        $user = auth()->user();
        $files = $user->files->count();
        $shared = $user->shared == null ? 0 : $user->shared->count();
        $received = $user->received == null ? 0 : $user->received->count();

        if ($user->space_limit == null) {
            $user->space_limit = 524288000;
            $user->save();
        }

        $used_space = $user->used_space == null ? 1 : $user->used_space;
        $total_space = $user->space_limit == null ? 1 : $user->space_limit;

        $percentage = round($used_space / $total_space * 100);

        $used_space = $this->formatSizeUnits($used_space);
        $total_space = $this->formatSizeUnits($total_space);

        return view('dashboard', compact('files', 'shared', 'received', 'used_space', 'total_space', 'percentage'));
    }

    private function formatSizeUnits(int $used_space)
    {
        if ($used_space >= 1073741824) {
            $used_space = number_format($used_space / 1073741824, 2) . ' GB';
        } elseif ($used_space >= 1048576) {
            $used_space = number_format($used_space / 1048576, 2) . ' MB';
        } elseif ($used_space >= 1024) {
            $used_space = number_format($used_space / 1024, 2) . ' KB';
        } elseif ($used_space > 1) {
            $used_space = $used_space . ' bytes';
        } elseif ($used_space == 1) {
            $used_space = $used_space . ' byte';
        } else {
            $used_space = '0 bytes';
        }

        return $used_space;
    }
}
