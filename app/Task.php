<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'type',
        'name',
        'detail',
        'status',
    ];

    protected $types = [
        '',
        'Maintenance',
        'Support',
        'RFID',
        'Activity',
        'Other Job',
    ];

    public function getTypeName(){
        return $this->types[$this->type];
    // 	switch($this->type){
    // 		case 1 :
    // 			return "Maintenance";
    // 			break;
    // 		case 2 :
    // 			return "Support";
    // 			break;
    // 		case 3 :
    // 			return "RFID";
    // 			break;
    // 		case 4 :
    // 			return "Activity";
    // 			break;
    // 		default :
    // 			return "Unknown";
    // 			break;
    // 	}
    }

    public function getTypes() {
        return $this->types;
    }
}
