<?php


namespace App\Helpers;
use Illuminate\Support\Facades\Request;
use App\Models\History;

 
class LogActivity
{
    public static function addToLog($subject, $username, $time)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['username'] = $username;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = $time;
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	History::create($log);
    }

    public static function logActivityLists()
    {
    	return History::latest()->get();
    }
}