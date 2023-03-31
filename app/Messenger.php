<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Chat;

class Messenger extends Model
{
  protected $table = "messenger";
  protected $appends = ["Lastmsg","Allmsg"];
  protected $fillable = [
      "id",
      "sender_name",
      "receiver_name",
      "chat_type",
      "status",
      "last_msg_id",
      "_from",
      "_to",
      "time",
  ];
    public function to()
    {
        return $this->belongsTo("App\User","_to","id");
    }
    public function from()
    {
        return $this->belongsTo("App\User","_from","id");
    }
    public function msg()
    {
        return $this->belongsTo("App\Chat","messenger_id","id");
    }
    public function getLastmsgAttribute()
    {
        return Chat::find($this->last_msg_id);
    }
    public function getAllmsgAttribute()
    {
        return Chat::where("messenger_id","=",$this->id)->with(["to_user","from_user"])->get();
    }

}
