<?php

namespace FabianGO\Factories;

use FabianGO\Models\Blog;

class BlogFactory extends BaseFactory
{
    /**
     * Retrieves one blog using its slug
     *
     * @param string $slug
     *
     * @return Blog|null
     */
    public function bySlug(string $slug)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `blogs` WHERE `slug` = :slug LIMIT 1");
        $stmt->bindParam('slug', $slug);

        $found = $stmt->execute();

        if ($found) {
            return new Blog($stmt->fetch());
        }

        return null;
    }

    /**
     * return descending array of blogs
     *
     * @param int $max The maximum amount of blogs to retrieve
     *
     * @return Blog[]
     */
    public function getLatestBlogs(int $max)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `blogs` ORDER BY `date` DESC LIMIT :limit");
        $stmt->bindParam('limit', $max, \PDO::PARAM_INT);

        $stmt->execute();

        $blogs = [];
        while ($row = $stmt->fetch()) {
            $blogs[] = new Blog($row);
        }

        return $blogs;
    }

    /**
     * Retrieve all blogs in database ordered by id (descending)
     *
     * @return Blog[]
     */
    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `blogs` ORDER BY `id` DESC");
        $stmt->execute();

        $blogs = [];
        while ($row = $stmt->fetch()) {
            $blogs[] = new Blog($row);
        }

        return $blogs;
    }
}