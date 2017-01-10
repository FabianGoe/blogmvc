<?php

namespace FabianGO\Factories;

use FabianGO\Models\Blog;

class BlogFactory extends BaseFactory
{
    /**
     * Inserts a blog into the database
     *
     * @param array $params
     *
     * @return Blog
     */
    public function create(array $params)
    {
        if (isset($params['id'])) {
            throw new \InvalidArgumentException('Cannot create blog with id supplied');
        }

        $blog = new Blog($params);
        $blog->validate();

        $stmt = $this->pdo->prepare("INSERT INTO `blogs` (
                                          `title`,
                                          `slug`,
                                          `introduction`,
                                          `content`,
                                          `date`) 
                                      values(
                                          :title, 
                                          :slug,
                                          :introduction,
                                          :content,
                                          :date_stamp);");

        $pdoParams = [
            'title' => $blog->getTitle(),
            'slug' => $blog->getSlug(),
            'introduction' => $blog->getIntroduction(),
            'content' => $blog->getContent(),
            'date_stamp' => ($blog->getDate() !== null) ? $blog->getDate()->getTimestamp() : null
        ];

        $stmt->execute($pdoParams);

        $id = $this->pdo->lastInsertId();

        $blog->setId((int)$id);

        return $blog;
    }

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