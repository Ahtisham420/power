<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermCondition extends Model
{
    protected $table = 'term_condition';
    protected $fillable = ['id','body','status'];
    public function generate_introduction($max_len = 500)
    {
        $base_text_to_use = $this->short_description;
        if (!trim($base_text_to_use)) {
            $base_text_to_use = $this->body;
        }
        $base_text_to_use = strip_tags($base_text_to_use);

        $intro = str_limit($base_text_to_use, (int) $max_len);
        return nl2br(e($intro));
    }
}
