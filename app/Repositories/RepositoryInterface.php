<?php
/**
 * Created by PhpStorm.
 * User: Barney
 * Date: 6/17/2017
 * Time: 8:04 PM
 */
namespace App\Repositories;

Interface RepositoryInterface{

    public function getAll();
    public function create(array $attributes);
    public function find($id);
    public function delete($id);
    public function update($id, array $attributes);

}