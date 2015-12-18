<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\App;
get('/bridge', function () {
    $pusher = App::make('pusher');
    $pusher->trigger('test-channel',
                     'test-event',
                     array('text' => 'all your base are belong to us - bridge'));
    return view('welcome');
});

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class TestEvent implements ShouldBroadcast {
    public $text;
    
    public function __construct($text) {
        $this->text = $text;
    }
    
    public function broadcastOn() {
        return ['test-channel'];
    }
}
get('/broadcast', function () {
   event(new TestEvent('all your base are belong to us - broadcast'));
   return view('welcome');
});

Route::controller('notifications', 'NotificationController');