<?php

namespace FabianGO\Models;


class Blog extends BaseModel
{
    /** @var null|int */
    private $db_id = null;

    /** @var null|string */
    private $db_title = null;

    /** @var null|string */
    private $db_slug = null;

    /** @var null|string */
    private $db_introduction = null;

    /** @var null|string */
    private $db_content = null;

    /** @var null|\DateTime */
    private $db_date = null;

    public function __construct(array $params = [])
    {
        if ($params) {
            $this->initialize($params);
        }
    }

    /**
     * @inheritdoc
     */
    public function initialize(array $params)
    {
        if (isset($params['id'])) {
            $this->setId((int)$params['id']);
        }

        if (isset($params['title'])) {
            $this->setTitle($params['title']);
        }

        if (isset($params['slug'])) {
            $this->setSlug($params['slug']);
        }

        if (isset($params['introduction'])) {
            $this->setIntroduction($params['introduction']);
        }

        if (isset($params['content'])) {
            $this->setContent($params['content']);
        }

        if (isset($params['date'])) {
            $this->setDate(\DateTime::createFromFormat('Y-m-d H:i:s', $params['date']));
        }
    }

    /**
     * @inheritdoc
     */
    public function toArray()
    {
        // TODO: Implement toArray() method.
    }

    /**
     * @param int $id
     *
     * @throws \InvalidArgumentException
     */
    public function setId($id)
    {
        if (is_int($id)) {
            $this->db_id = $id;
        } else {
            throw new \InvalidArgumentException('Blog id needs to be int');
        }
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->db_id;
    }

    /**
     * @param string $title
     *
     * @throws \InvalidArgumentException
     */
    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->db_title = $title;
        } else {
            throw new \InvalidArgumentException('Blog title needs to be string');
        }
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->db_title;
    }

    /**
     * @param string $slug
     *
     * @throws \InvalidArgumentException
     */
    public function setSlug($slug)
    {
        if (is_string($slug)) {
            $this->db_slug = $slug;
        } else {
            throw new \InvalidArgumentException('Blog slug needs to be string');
        }
    }

    /**
     * @return null|string
     */
    public function getSlug()
    {
        return $this->db_slug;
    }

    /**
     * @param string $introduction
     *
     * @throws \InvalidArgumentException
     */
    public function setIntroduction($introduction)
    {
        if (is_string($introduction)) {
            $this->db_introduction = $introduction;
        } else {
            throw new \InvalidArgumentException('Blog introduction needs to be string');
        }
    }

    /**
     * @return null|string
     */
    public function getIntroduction()
    {
        return $this->db_introduction;
    }

    /**
     * @param string $content
     *
     * @throws \InvalidArgumentException
     */
    public function setContent($content)
    {
        if (is_string($content)) {
            $this->db_content = $content;
        } else {
            throw new \InvalidArgumentException('Blog content needs to be string');
        }
    }

    /**
     * @return null|string
     */
    public function getContent()
    {
        return $this->db_content;
    }

    /**
     * @param $date
     *
     * @throws \InvalidArgumentException
     */
    public function setDate($date)
    {
        if (is_string($date)) {
            $this->db_date = \DateTime::createFromFormat('Y-m-d H:i:s', $date);
        } elseif ($date instanceof \DateTime) {
            $this->db_date = $date;
        } else {
            throw new \InvalidArgumentException('Blog date needs to be UTC string or DateTime object');
        }
    }

    /**
     * @return \DateTime|null
     */
    public function getDate()
    {
        return $this->db_date;
    }
}