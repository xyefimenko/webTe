<?php


class UserAction
{
    private int $id;
    private string $timestamp;
    private string $type;



    private string $name;
    private $action;
    private int $lecture_id;
    private $joined_time;
    private $left_time;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getJoinedTime()
    {
        return $this->joined_time;
    }

    /**
     * @param mixed $joined_time
     */
    public function setJoinedTime($joined_time): void
    {
        $this->joined_time = $joined_time;
    }

    /**
     * @return mixed
     */
    public function getLeftTime()
    {
        return $this->left_time;
    }

    /**
     * @param mixed $left_time
     */
    public function setLeftTime($left_time): void
    {
        $this->left_time = $left_time;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getLectureId(): int
    {
        return $this->lecture_id;
    }

    /**
     * @param int $lecture_id
     */
    public function setLectureId(int $lecture_id): void
    {
        $this->lecture_id = $lecture_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp): void
    {
        $this->timestamp = $timestamp;
    }


}
