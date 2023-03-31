<?php

namespace App;
use App\Wanted;
use App\User_car;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = "chats";
    protected $fillable = [
        "id",
        "to",
        "from",
        "message",
        "read_status",
        "msg_time",
        "messenger_id",
        "car_type",
        "car_id",

    ];
    protected $appends = ['car_detail'];
    public function to_user()
    {
        return $this->belongsTo("App\User","to","id");
    }
    public function from_user()
    {
        return $this->belongsTo("App\User","from","id");
    }
    public function getCarDetailAttribute(){
        if($this->car_type="wanted"){
            return Wanted::find($this->car_id);
        }
        else{
             return User_car::find($this->car_id);
        }
    }


}
