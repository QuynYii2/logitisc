<?php

namespace App\Interfaces;

interface AbstractInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * @param $status
     * @return mixed
     */
    public function getData ($status);

    /**
     * Get one
     * @param $id
     * @return mixed
     */

    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
