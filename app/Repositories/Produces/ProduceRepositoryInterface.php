<?php
/**
 * Created by PhpStorm.
 * User: Barney
 * Date: 6/17/2017
 * Time: 8:04 PM
 */
namespace App\Repositories\Produces;
Interface ProduceRepositoryInterface{
    public function getInputPostAndEdit($inputs,$id=0);
    public function getall();
}