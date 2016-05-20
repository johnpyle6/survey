<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponses extends Model
{
    protected $fillable = [];
	protected $table = 'survey_responses';
	protected $timestamps = true;
}
