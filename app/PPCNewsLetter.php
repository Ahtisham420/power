<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PPCNewsLetter extends Model
{
    //
    protected $table = "ppc_news";
    protected $fillable = ['id','mail_body'];


    public function generate_introduction($max_len = 500)
    {
        $base_text_to_use = $this->short_description;
        if (!trim($base_text_to_use)) {
            $base_text_to_use = $this->mail_body;
        }
        $base_text_to_use = strip_tags($base_text_to_use);

        $intro = str_limit($base_text_to_use, (int) $max_len);
        return nl2br(e($intro));
    }
}
