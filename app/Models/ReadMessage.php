<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadMessage extends Model
{
    use HasFactory;
    protected $fillable = [
      'contact_id',
 ];
 public function contact()
 {
     return $this->belongsto(Contact::class);
 }
}
