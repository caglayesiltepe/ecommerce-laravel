<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    /**
     * @param ?string $language
     * @return mixed
     */
    public function getAllData(?string $language): mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function getFindById(int $id): mixed;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed;

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data): mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id): mixed;
}
